<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])) {

    $datetimeTst = mysqli_real_escape_string($conn, $_POST['datetimeTst']);
	$datetimeTend = mysqli_real_escape_string($conn, $_POST['datetimeTend']);

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $request_for = mysqli_real_escape_string($conn, $_POST['request_for']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
	$passenger = mysqli_real_escape_string($conn, $_POST['passenger']);
    $teacher = mysqli_real_escape_string($conn, $_POST['teacher']);
    $student = mysqli_real_escape_string($conn, $_POST['student']);
	$date_from = mysqli_real_escape_string($conn, $_POST['date_from']);
    $time_from = mysqli_real_escape_string($conn, $_POST['time_from']);
    $date_to = mysqli_real_escape_string($conn, $_POST['date_to']);
    $time_to = mysqli_real_escape_string($conn, $_POST['time_to']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $caretaker = mysqli_real_escape_string($conn, $_POST['caretaker']);
    $name_request = mysqli_real_escape_string($conn, $_POST['name_request']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    // $type = mysqli_real_escape_string($conn, $_POST['country']);
    // $license_plate = mysqli_real_escape_string($conn, $_POST['state']);
	// $driver_id = mysqli_real_escape_string($conn, $_POST['driver_id']);
    $license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);
    $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
	$driver_id = mysqli_real_escape_string($conn, $_POST['driver_id']);

    $allowance = mysqli_real_escape_string($conn, $_POST['allowance']);
    $manager_name = mysqli_real_escape_string($conn, $_POST['manager_name']);
    $remark_mg2 = mysqli_real_escape_string($conn, $_POST['remark_mg2']);
    $manager_name2 = mysqli_real_escape_string($conn, $_POST['manager_name2']);
    $remark_mg3 = mysqli_real_escape_string($conn, $_POST['remark_mg3']);
    $manager_name3 = mysqli_real_escape_string($conn, $_POST['manager_name3']);

    $_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['time_from'] = $time_from;
	$_SESSION['time_to'] = $time_to;
	$_SESSION['date_from'] = $date_from;
	$_SESSION['date_to'] = $date_to;
	$_SESSION['request_for'] = $request_for;
	$_SESSION['location'] = $location;
	$_SESSION['driver_id'] = $driver_id;
	$_SESSION['head'] = 'นอกอำเภอเมือง';
	$_SESSION['timeST'] = $datetimeTst;
	$_SESSION['timeEND'] = $datetimeTend;
	$_SESSION['in_out'] = 'จองภายนอกอำเภอเมือง';

    $sqlemail = "SELECT * FROM user WHERE user_id = $driver_id";
	$resultemail = mysqli_query($conn, $sqlemail);
	 if (mysqli_num_rows($resultemail) == 1); {
		 $row = mysqli_fetch_array($resultemail);
	 $_SESSION['email'] = $row['email'];
	 }

    // เช็ครถ
    $checkcar = "SELECT * FROM events WHERE vehicle_id = '$vehicle_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";
    // เช็ค คนขับ
    $checkdriver = "SELECT * FROM events WHERE driver_id = '$driver_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";

    $result = mysqli_query($conn, $checkcar) or die("Error in sql : $checkcar".
        mysqli_error($checkcar));
    $result2 = mysqli_query($conn, $checkdriver) or die("Error in sql : $checkdriver".
        mysqli_error($checkdriver));
 
    if(mysqli_num_rows($result)==0){
        if(mysqli_num_rows($result2)==0){
		// Insert into Database				
            $sql ="INSERT INTO `events` (`id`, `in_out`, `fname`, `lname`, `position`, `level`, `request_for`, `location`, `passenger`,
                `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, `caretaker`, `name_request`, `status`,
                `remark`, `vehicle_id`, `driver_id`, `allowance`, `remark_mg2`, `manager_name`, `manager_date`, `manager2_name`, `manager2_date`,
                `remark_mg3`, `manager3_name`, `manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`,
                `mile_st`, `mile_end`, `status_order`, `created`) 
                VALUES (NULL, 'นอกอำเภอเมือง', '$fname', '$lname', '$position', '$level', '$request_for', '$location', '$passenger', '$teacher',
                '$student', '$date_from', '$time_from', '$date_to', '$time_to', '$distance', '$caretaker', '$name_request', '$status',
                '$remark', '$license_plate', '$driver_id', '$allowance', '$remark_mg2', '$manager_name', NOW(), '$manager_name2', 
                NOW(), '$remark_mg3', '$manager_name3', NOW(), NULL, NULL, NULL, NULL, NULL, 
                NULL, NULL, NULL, 'กำลังดำเนินการ', NOW())";

				mysqli_query($conn, $sql);
        // Insert into Database	event_google
			$sql2 = "INSERT INTO event_google
                (id ,title ,description,location,date_from,date_to,time_from,time_to,datetimeTst,datetimeTend,created) 
                VALUES(NULL, '$location', '$request_for', '$location', '$date_from', '$date_to', '$time_from', '$time_to',
                '$datetimeTst','$datetimeTend',NOW())";	
                
                mysqli_query($conn, $sql2);

				echo "<script> alert('กำลังส่งข้อมูลไปยัง ปฏิทิน'); window.location = './quickstart.php';</script>";
			}else{
				echo "<script> alert('คนขับซ้ำ บันทึกไม่สำเร็จ'); window.location = './order_out.php';</script>";
				}
		} else {
			echo "<script> alert('รถซ้ำ บันทึกไม่สำเร็จ'); window.location = './order_out.php';</script>";
		}
	}