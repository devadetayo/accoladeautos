<?php 
    include('../core/init.php');

	if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
		$brandId = (int)$_GET['brand_id'];

		// Query to get models for the provided brand_id
		$query = "SELECT * FROM models WHERE brand_id = $brandId";
		$result = mysqli_query($db, $query);

		$models = [];
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$models[] = $row;
			}
		}

		// Return models as JSON
		echo json_encode(['models' => $models]);
	} else {
		echo json_encode(['models' => []]);
	}