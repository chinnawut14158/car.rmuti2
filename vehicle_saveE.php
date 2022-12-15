<?php
session_start();
if (isset($_POST['submit'])) {
include("connect.php");

$errors = array();

$vehicle_id = $_POST['vehicle_id'];
$type_id = $_POST['type_id'];
$vehicle_name = $_POST['vehicle_name'];
$seat = $_POST['seat'];
$license_plate = $_POST['license_plate'];

$sql = "UPDATE vehicle SET type_id='$type_id', vehicle_name='$vehicle_name', seat='$seat', license_plate='$license_plate'
        WHERE vehicle_id = '" . $vehicle_id . "'";


// UPDATE `vehicle` SET `vehicle_type` = 'รถบัส', `vehicle_name` = 'รถฮอนด้า', `seat` = '30', `license_plate` = 'กข2222 ขอนแก่น' WHERE `vehicle`.`vehicle_id` = 4
$query  = $conn->query($sql);
				if ($query) {
    				echo "<script>alert('บันทึกสำเร็จ'); window.location = './list_vehicle.php';</script>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
            }
?>