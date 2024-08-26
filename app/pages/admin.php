<?php

    define('APP_FUNCTION', 'Admin');
    
	$username = $_SESSION['username'];
	$results = mysqli_query($db, "SELECT * FROM admins WHERE username = '$username' LIMIT 1");
	$row = mysqli_fetch_assoc($results);

    if(mysqli_num_rows($results) > 0){

    }else{
        redirect("login");
    }

    $request_uri = $_SERVER['REQUEST_URI'];
    $base_uri = '/accoladeautos/admin/';
    $requested_path = substr($request_uri, strlen($base_uri));

    if(empty($requested_path)){
        $section = 'dashboard';
        $url[1] = 'dashboard';
    }else{
        $section = $url[1];
    }

    $res = mysqli_query($db, "SELECT * FROM brands");
    $brands = mysqli_fetch_all($res);

    $category_res = mysqli_query($db, "SELECT * FROM part_types");
    $part_types = mysqli_fetch_all($category_res);

    $model_res = mysqli_query($db, "SELECT * FROM models");
    $models = mysqli_fetch_all($model_res);

    $part_res = mysqli_query($db, "SELECT * FROM parts");
    $parts = mysqli_fetch_all($part_res);

    if($url[1] === 'brands'){
        $table = $url[1];
    }elseif($url[1] === 'models'){
        $table = $url[1];
    }elseif($url[1] === 'admins'){
        $table = $url[1];
    }elseif($url[1] === 'parts'){
        $table = $url[1];
    }elseif($url[1] === 'part_types'){
        $table = $url[1];
    }

    if(!empty($table)){
        $table = preg_replace('/[^a-zA-Z0-9_]+/', '', $table);

        $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM $table");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];

        $limit = 10;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $total_pages = ceil($total_records / $limit);
    }
    
?>
<!DOCTYPE html>
<html>
<?php include("includes/admin/head.php"); ?>
<body class="font-s-md line-h-md text-grey-600 dark:text-grey-100 bg-slate-50 dark:bg-slate-900 w-full">

	<main class="w-full d-flex min-vh-100 align-items-center justify-content-center">
        <section class="sidebar d-flex justify-content-start m-0 p-0 w-two-tenth min-vh-100 position-fixed overflow-x-auto border-slate-100 dark:border-slate-800 border-solid border-wr-1 border-w-0 z-100 lg:w-quarter" style="left: 0; top: 0;">
            <?php include("includes/admin/sidebar.php") ; ?>
        </section>
                
        <section class="workspace d-flex flex-column w-full min-vh-100 h-auto p-two-tenth sm:p-0" style="padding-left: 20%;">
            <?php include('includes/admin/navbar.php'); ?>

            <!--home section-->
            <section class="d-flex w-full flex-column px-20 sm:px-16 position-relative min-vh-100">
                <div class="d-flex w-full">
                    <?php include('admin/includes/messages.php'); ?>
                </div>  
                <?php

                    $filename = "app/pages/admin/".$section.".php";
                    if(file_exists($filename)){
                        require_once $filename;
                    }else{
                        require_once "app/pages/error.php";
                    }
                
                ?>

            </section>
        </section>

        <div class="d-none align-items-center justify-content-center position-fixed w-full min-vh-100 z-100 box-shadow-2xl user-modal" style="backdrop-filter: blur(12px);">
            <div class="w-52 d-flex flex-column border-round-sxl bg-white dark:bg-slate-800 box-shadow-2xl">
                <div class="d-flex py-12 px-24 border-wb-1 border-w-0 border-slate-100 border-solid dark:border-slate-600">
                    <h4 class="font-s-xl font-w-medium">Delete User</h4>
                </div>
                <div class="d-flex flex-column pb-20 px-24">
                    <div class="w-full line-h-normal py-16">
                        <h4 class="font-s-lg py-12">Are you sure you want to delete?</h4>
                        <p class="font-w-medium text-capitalize"><span class="username"></span> From the database</p>
                    </div> 
                    <div class="d-flex w-full pt-12 px-8 gap-8 justify-content-start">
                        <button class="d-flex justify-content-center align-items-center px-24 py-8 m-0 h-max bg-transparent color-black dark:color-white border-w-1 border-solid border-slate-100 dark:border-slate-400 hover:bg-slate-100 active:bg-slate-300 dark:hover:bg-slate-400 dark:active:bg-slate-600 border-round-pill no-decoration-text closeuser-modal">Cancel</button>
            
                        <form class="delete-user-form" method="POST">
                            <input type="hidden" class="username" name="username">
                            <button type="submit" class="d-flex justify-content-center align-items-center px-24 py-8 bg-red-500 hover:bg-red-700 active:bg-red-400 border-round-pill no-decoration-text color-white" id="delete_user" name="delete-user">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none align-items-center justify-content-center position-fixed w-full min-vh-100 z-100 box-shadow-2xl category-modal" style="backdrop-filter: blur(12px);">
            <div class="w-52 d-flex flex-column border-round-sxl bg-white dark:bg-slate-800 box-shadow-2xl">
                <div class="d-flex py-12 px-24 border-wb-1 border-w-0 border-slate-100 border-solid dark:border-slate-600">
                    <h4 class="font-s-xl font-w-medium">Delete Category</h4>
                </div>
                <div class="d-flex flex-column pb-20 px-24">
                    <div class="w-full line-h-normal py-16">
                        <h4 class="font-s-lg py-12">Are you sure you want to delete?</h4>
                        <p class="font-w-medium text-capitalize"><span class="title"></span> From the database</p>
                    </div> 
                    <div class="d-flex w-full pt-12 px-8 gap-8 justify-content-start">
                        <button class="d-flex justify-content-center align-items-center px-24 py-8 m-0 h-max bg-transparent color-black dark:color-white border-w-1 border-solid border-slate-100 dark:border-slate-400 hover:bg-slate-100 active:bg-slate-300 dark:hover:bg-slate-400 dark:active:bg-slate-600 border-round-pill no-decoration-text closecat-modal">Cancel</button>
            
                        <form class="delete-category-form" method="POST">
                            <input type="hidden" class="category" name="title">
                            <button type="submit" class="d-flex justify-content-center align-items-center px-24 py-8 bg-red-500 hover:bg-red-700 active:bg-red-400 border-round-pill no-decoration-text color-white" id="delete_category" name="delete-category">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none align-items-center justify-content-center position-fixed w-full min-vh-100 z-100 box-shadow-2xl post-modal" style="backdrop-filter: blur(12px);">
            <div class="w-52 d-flex flex-column border-round-sxl bg-white dark:bg-slate-800 box-shadow-2xl">
                <div class="d-flex py-12 px-24 border-wb-1 border-w-0 border-slate-100 border-solid dark:border-slate-600">
                    <h4 class="font-s-xl font-w-medium">Delete Post</h4>
                </div>
                <div class="d-flex flex-column pb-20 px-24">
                    <div class="w-full line-h-normal py-16">
                        <h4 class="font-s-lg py-12">Are you sure you want to delete?</h4>
                        <p class="font-w-medium text-capitalize"><span class="header"></span> From the database</p>
                    </div> 
                    <div class="d-flex w-full pt-12 px-8 gap-8 justify-content-start">
                        <button class="d-flex justify-content-center align-items-center px-24 py-8 m-0 h-max bg-transparent color-black dark:color-white border-w-1 border-solid border-slate-100 dark:border-slate-400 hover:bg-slate-100 active:bg-slate-300 dark:hover:bg-slate-400 dark:active:bg-slate-600 border-round-pill no-decoration-text closepost-modal">Cancel</button>
            
                        <form class="delete-post-form" method="POST">
                            <input type="hidden" class="header" name="header">
                            <button type="submit" class="d-flex justify-content-center align-items-center px-24 py-8 bg-red-500 hover:bg-red-700 active:bg-red-400 border-round-pill no-decoration-text color-white" id="delete_category" name="delete-post">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none align-items-center justify-content-center position-fixed w-full min-vh-100 z-100 box-shadow-2xl course-modal" style="backdrop-filter: blur(12px);">
            <div class="w-52 d-flex flex-column border-round-sxl bg-white dark:bg-slate-800 box-shadow-2xl">
                <div class="d-flex py-12 px-24 border-wb-1 border-w-0 border-slate-100 border-solid dark:border-slate-600">
                    <h4 class="font-s-xl font-w-medium">Delete Course</h4>
                </div>
                <div class="d-flex flex-column pb-20 px-24">
                    <div class="w-full line-h-normal py-16">
                        <h4 class="font-s-lg py-12">Are you sure you want to delete?</h4>
                        <p class="font-w-medium text-capitalize"><span class="title"></span> From the database</p>
                    </div> 
                    <div class="d-flex w-full pt-12 px-8 gap-8 justify-content-start">
                        <button class="d-flex justify-content-center align-items-center px-24 py-8 m-0 h-max bg-transparent color-black dark:color-white border-w-1 border-solid border-slate-100 dark:border-slate-400 hover:bg-slate-100 active:bg-slate-300 dark:hover:bg-slate-400 dark:active:bg-slate-600 border-round-pill no-decoration-text closecourse-modal">Cancel</button>
            
                        <form class="delete-course-form" method="POST">
                            <input type="hidden" class="course" name="title">
                            <button type="submit" class="d-flex justify-content-center align-items-center px-24 py-8 bg-red-500 hover:bg-red-700 active:bg-red-400 border-round-pill no-decoration-text color-white" id="delete_category" name="delete-course">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</body>

</html>