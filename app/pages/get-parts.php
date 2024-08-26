<?php 
    include('../core/init.php');

	if (isset($_GET['model_id']) && !empty($_GET['model_id'])) {
		$modelId = (int)$_GET['model_id'];

		// Query to get models for the provided brand_id
		$query = "SELECT * FROM part_types";
		$result = mysqli_query($db, $query);

		$parts = [];
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$parts[] = $row;
			}
		}

		// Return models as JSON
		echo json_encode(['parts' => $parts]);
	} else {
		echo json_encode(['parts' => []]);
	}