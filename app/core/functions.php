<?php

    $errors = array();

	function redirect($page){
        header('location:' .$page);
        die;
    }

    function getParts($year_id, $brand_id, $model_id, $part_type) {
        global $db;
        $sql = "SELECT * FROM parts WHERE year_id = '$year_id' AND brand_id = '$brand_id' AND model_id = '$model_id' AND part_type_id = '$part_type'";
        $result = mysqli_query($db, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Function to add item to cart
    function addToCart($part_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $part_id;
    }

    function getBrandNameById($id){
        global $db, $brand_id;

        $sql = mysqli_query($db, "SELECT brand_name FROM brands WHERE id=$id");
        $name = mysqli_fetch_assoc($sql);
        
        return $name['brand_name'];
    }

    function getModelNameById($id){
        global $db, $model_id;

        $sql = mysqli_query($db, "SELECT model_name FROM models WHERE id=$id");
        $name = mysqli_fetch_assoc($sql);
        
        return $name['model_name'];
    }

    function getYearById($id){
        global $db, $year_id;

        $sql = mysqli_query($db, "SELECT year FROM years WHERE id=$id");
        $name = mysqli_fetch_assoc($sql);
        
        return $name['year'];
    }

    function getPartTypeById($id){
        global $db, $part_type_id;

        $sql = mysqli_query($db, "SELECT part_type_name FROM Part_types WHERE id=$id");
        $name = mysqli_fetch_assoc($sql);
        
        return $name['part_type_name'];
    }

    function str_to_url($url){
        $url = str_replace("'", "", $url);
        $url = urlencode($url);

        return $url;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['search-term'])){
		global $db;
		$term = mysqli_real_escape_string($db, $_POST['search-term']);
		$search_term = urlencode($term);
		header("location: /accoladeautos/search/$search_term");
		exit();
	}

    function searchPosts($term){
        global $db;

        $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM parts");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];

        $limit = 9;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $total_pages = ceil($total_records / $limit);
        
        // Prepare the search term for use in LIKE clauses
        $match = '%' . htmlentities($term) . '%';
        
        // SQL query with JOINs to search across parts, brands, years, and models
        $sql = "
        SELECT p.* 
        FROM parts p
        LEFT JOIN brands b ON p.brand_id = b.id
        LEFT JOIN years y ON p.year_id = y.id
        LEFT JOIN models m ON p.model_id = m.id
        WHERE p.part_name LIKE '$match'
        OR p.description LIKE '$match'
        OR b.brand_name LIKE '$match'
        OR y.year LIKE '$match'
        OR m.model_name LIKE '$match'
        ORDER BY p.id DESC LIMIT $start, $limit";
        
        // Execute the query and fetch the results
        $result = mysqli_query($db, $sql);
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $records;
    }

    if(isset($_POST['whatsapp'])) {
        $whatsapp_message = "I want to purchase:\n";
        $total_quantity = 0;
        $total_price = 0;
        
        foreach($_SESSION['cart'] as $part_id => $item) {
            // Query to get part details along with brand, model, and year
            $cart_query = mysqli_query($db, "
                SELECT 
                    parts.part_name,
                    parts.price,
                    brands.brand_name,
                    models.model_name,
                    years.year
                FROM parts
                JOIN brands ON parts.brand_id = brands.id
                JOIN models ON parts.model_id = models.id
                JOIN years ON parts.year_id = years.id
                WHERE parts.id = $part_id
            ");
    
            $carts = mysqli_fetch_all($cart_query, MYSQLI_ASSOC);
    
            foreach($carts as $cart) {
                $item_quantity = $item['quantity'];
                $item_total_price = $cart['price'] * $item_quantity;
                
                $whatsapp_message .= $cart['part_name'] . " (Brand: " . $cart['brand_name'] . ", Model: " . $cart['model_name'] . ", Year: " . $cart['year'] . ") - Quantity: " . $item_quantity . ", Total: $" . $item_total_price . "\n";
                $total_quantity += $item_quantity;
                $total_price += $item_total_price;
            }
        }
        
        $whatsapp_message .= "Total Quantity: " . $total_quantity . "\n";
        $whatsapp_message .= "Total Price: $" . $total_price;
        
        $phoneNumber = "2348103933747"; // Replace with your phone number
        $whatsappUrl = "https://api.whatsapp.com/send?phone=" . $phoneNumber . "&text=" . urlencode($whatsapp_message);
        $_SESSION['cart'] = array();
        
        redirect($whatsappUrl);
        exit;
    }

    function retain_value($key){
        if(!empty($_POST[$key])){
            return $_POST[$key];
        }else{
            return "";
        }
    }

    if (isset($_POST['create-brand'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $admin_id = mysqli_real_escape_string($db, $_POST['admin_id']);

        if(empty($name)){
            array_push($errors, "Brand name is required");
        }

        if(empty($description)){
            array_push($errors, "Brand description is required");
        }

        $brand_check_query = "SELECT * FROM brands WHERE brand_name='$name' LIMIT 1";
		$result = mysqli_query($db, $brand_check_query);
		$brand = mysqli_fetch_assoc($result);

        if ($brand) {
			if ($brand['brand_name'] === $name) {
			  array_push($errors, "Brand already exists");
			}
		}

        if(count($errors) == 0){
            $query = mysqli_query($db, "INSERT INTO brands (brand_name, description, admin_id) VALUES ('$name', '$description', '$admin_id')");
            $_SESSION['type'] = 'success';
            $_SESSION['message'] = "New Brand has been added";
            redirect("brands"); 
        }
    }

