<?php

include('connect.php');

if(isset($_POST["action"]))
{
	// if($_POST["action"] == 'insert')
	// {
	// 	$data = array(
	// 		':language2'		=>	$_POST["language2"]
	// 	);

	// 	$query = "
	// 	INSERT INTO survey_table 
	// 	(language2) VALUES (:language2)
	// 	";

	// 	$statement = $conn->prepare($query);

	// 	$statement->execute($data);

	// 	echo 'done';
	// }

	if($_POST["action"] == 'fetch')
	{

		$query = "SELECT 
    	vehicle.vehicle_name,license_plate,
    	(SELECT COUNT(*) FROM events WHERE events.vehicle_id = vehicle.vehicle_id) AS Total
		FROM vehicle GROUP BY vehicle_id";
		
		$query2 = "SELECT 
    	user.fname,lname,
    	(SELECT COUNT(*) FROM events WHERE events.driver_id = user.user_id) AS Total2
		FROM user GROUP BY user_id";

		$result = $conn->query($query);
		$result2 = $conn->query($query2);

		$data = array();
		$data2 = array();

		foreach($result as $row)
		{								
			$data2[] = array(
				'language'		=>	$row["vehicle_name"] . " " . $row["license_plate"],
				// 'language2'		=>	$row["fname"].$row["lname"],
				'total'			=>	$row["Total"],
				// 'total2'		=>	$row["Total2"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
		// foreach($result2 as $row)
		// {
		// 	$data2[] = array(
		// 		// 'language'		=>	$row["license_plate"],
		// 		'language2'		=>	$row["fname"].$row["lname"],
		// 		// 'total'			=>	$row["Total"],
		// 		'total2'			=>	$row["Total2"],
		// 		'color'			=>	'#' . rand(100000, 999999) . ''
		// 	);
		// }

		echo json_encode($data2);
	}
}
?>