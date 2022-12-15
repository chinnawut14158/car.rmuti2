<?php
session_start();
if (isset($_POST['submit'])) {
include("connect.php");

$errors = array();

$id = $_POST['id'];
$time_out = $_POST['time_out'];
$time_in = $_POST['time_in'];
$date_out = $_POST['date_out'];
$date_in = $_POST['date_in'];
$sec_out = $_POST['sec_out'];
$sec_in = $_POST['sec_in'];
$mile_st = $_POST['mile_st'];
$mile_end = $_POST['mile_end'];
$status = $_POST['status'];


$sql = "UPDATE events SET mile_st='$mile_st', mile_end='$mile_end', time_out='$time_out', 
		time_in='$time_in',date_out='$date_out', date_in='$date_in', sec_out='$sec_out', sec_in='$sec_in', status_order='$status'
        WHERE id = '" . $id . "'";

$query  = $conn->query($sql);
				if ($query) {
    				echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = './list_request.php';</script>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
            }
?>