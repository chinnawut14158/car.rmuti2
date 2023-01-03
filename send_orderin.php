<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])) {

	$datetimeTst = mysqli_real_escape_string($conn, $_POST['datetimeTst']);
	$datetimeTend = mysqli_real_escape_string($conn, $_POST['datetimeTend']);

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
	$passenger = mysqli_real_escape_string($conn, $_POST['passenger']);
    $request_for = mysqli_real_escape_string($conn, $_POST['request_for']);
	$date_from = mysqli_real_escape_string($conn, $_POST['date_from']);
	$date_to = mysqli_real_escape_string($conn, $_POST['date_to']);
    $time_from = mysqli_real_escape_string($conn, $_POST['time_from']);
	$time_to = mysqli_real_escape_string($conn, $_POST['time_to']);
	$license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);
    $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
	$driver_id = mysqli_real_escape_string($conn, $_POST['driver_id']);
    $manager_name = mysqli_real_escape_string($conn, $_POST['manager_name']);
	$name_request = mysqli_real_escape_string($conn, $_POST['name_request']);

	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['time_from'] = $time_from;
	$_SESSION['time_to'] = $time_to;
	$_SESSION['date_from'] = $date_from;
	$_SESSION['date_to'] = $date_to;
	$_SESSION['request_for'] = $request_for;
	$_SESSION['location'] = $location;
	$_SESSION['driver_id'] = $driver_id;
	$_SESSION['head'] = 'ภายในอำเภอเมือง';
	$_SESSION['timeST'] = $datetimeTst;
	$_SESSION['timeEND'] = $datetimeTend;
	$_SESSION['in_out'] = 'จองภายในอำเภอเมือง';

	$sqlemail = "SELECT * FROM user WHERE user_id = $driver_id";
	$resultemail = mysqli_query($conn, $sqlemail);
	 if (mysqli_num_rows($resultemail) == 1); {
		 $row = mysqli_fetch_array($resultemail);
	 $_SESSION['email'] = $row['email'];
	 }

	// เช็ครถ
    $checkcar = "SELECT * FROM events WHERE vehicle_id='$vehicle_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";
    // เช็ค คนขับ
    $checkdriver = "SELECT * FROM events WHERE driver_id='$driver_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";

    $result = mysqli_query($conn, $checkcar) or die("Error in sql : $checkcar".
    	mysqli_error($checkcar));
    $result2 = mysqli_query($conn, $checkdriver) or die("Error in sql : $checkdriver".
    	mysqli_error($checkdriver));
	
	if(mysqli_num_rows($result)==0){
        if(mysqli_num_rows($result2)==0){
		    // Insert into Database events
				$sql = "INSERT INTO events 
									(id ,in_out ,fname,lname,position,location,passenger,request_for,
									date_from,date_to,time_from,time_to,name_request,vehicle_id,driver_id,manager_name, manager_date, status , status_order, created) 
				        VALUES(NULL, 'ภายในอำเภอเมือง', '$fname', '$lname', '$position', '$location', '$passenger', '$request_for'
						, '$date_from','$date_to', '$time_from', '$time_to', '$name_request', '$license_plate,', '$driver_id', '$manager_name',NOW(), 'อนุมัติ','กำลังดำเนินการ', NOW())";	
				mysqli_query($conn, $sql);

			// Insert into Database	event_google
				$sql2 = "INSERT INTO event_google
									(id ,title ,description,location,date_from,date_to,time_from,time_to,datetimeTst,datetimeTend,created) 
				        VALUES(NULL, '$location', '$request_for', '$location', '$date_from', '$date_to', '$time_from', '$time_to'
						, '$datetimeTst','$datetimeTend',NOW())";	
				mysqli_query($conn, $sql2);

				echo "<script> alert('กำลังส่งข้อมูลไปยัง ปฏิทิน'); window.location = './quickstart.php';</script>";
			}else{
				echo "<script> alert('คนขับซ้ำ บันทึกไม่สำเร็จ'); window.location = './order_out.php';</script>";
				}
		} else {
			echo "<script> alert('รถซ้ำ บันทึกไม่สำเร็จ'); window.location = './order_out.php';</script>";
		}
	}