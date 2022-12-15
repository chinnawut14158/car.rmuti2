<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])) {

	$vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
	$date_from = mysqli_real_escape_string($conn, $_POST['date_from']);
    $date_to = mysqli_real_escape_string($conn, $_POST['date_to']);
    $time_from = mysqli_real_escape_string($conn, $_POST['time_from']);
    $time_to = mysqli_real_escape_string($conn, $_POST['time_to']);
    $driver_id = mysqli_real_escape_string($conn, $_POST['driver_id']);

    // เช็ครถ
    $checkcar = "SELECT * FROM testcheck WHERE vehicle_id='$vehicle_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";
    // เช็ค คนขับ
    $checkdriver = "SELECT * FROM testcheck WHERE user_id='$driver_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";

    $result = mysqli_query($conn, $checkcar) or die("Error in sql : $checkcar".
    mysqli_error($checkcar));
    $result2 = mysqli_query($conn, $checkdriver) or die("Error in sql : $checkdriver".
    mysqli_error($checkdriver));

    if(mysqli_num_rows($result)==0){
        if(mysqli_num_rows($result2)==0){
                $sql = "INSERT INTO testcheck 
            (id , vehicle_id , time_from, time_to, date_from, date_to, user_id) 
            VALUES(NULL, '$vehicle_id', '$time_from', '$time_to', '$date_from', '$date_to', '$driver_id')";
            mysqli_query($conn, $sql);
    echo "<script> alert('บันทึกสำเร็จ'); window.location = './check.php';</script>";
        }else{
            echo "<script> alert('คนซ้ำ บันทึกไม่สำเร็จ'); window.location = './check.php';</script>";
        }
    } else {
    echo "<script> alert('รถซ้ำ บันทึกไม่สำเร็จ'); window.location = './check.php';</script>";
}
}
?>