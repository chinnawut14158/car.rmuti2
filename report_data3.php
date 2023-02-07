<?php

include('connect.php');

if(isset($_POST["action"]))
{

	if($_POST["action"] == 'fetch3')
	{
		// $query3 = "SELECT * FROM vehicle AS Total3 GROUP BY vehicle_id";
		$query3 = "SELECT * FROM vehicle GROUP BY vehicle_id";
		
		// $query2 = "SELECT 
    	// user.fname,lname,
    	// (SELECT COUNT(*) FROM events WHERE events.driver_id = user.user_id) AS Total2
		// FROM user GROUP BY user_id";

		// $result = $conn->query($query);
		// $result2 = $conn->query($query2);
		$result3 = $conn->query($query3);
		$data3 = array();

		foreach($result3 as $row)
		{
			$data3[] = array(
				// 'language'		=>	$row["license_plate"],
				'language3'		=>	$row["license_plate"], 
				// 'language3'		=>	$row["fname"]. " " .$row["lname"],
				// 'total'			=>	$row["Total"],
				'total3'			=>	$row["mile"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data3);
	}
}
?>