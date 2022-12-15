<?php
session_start();
if (isset($_POST['submit'])) {
include("connect.php");

$errors = array();

$id = $_POST['id'];
$pre = $_POST['pre'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$userlevel = $_POST['userlevel'];
$position = $_POST['position'];

$sql = "UPDATE user SET userlevel='$userlevel', pre='$pre',fname='$fname', lname='$lname', sex='$sex', email='$email', position='$position', tel='$tel'
        WHERE user_id = '" . $id . "'";

$query  = $conn->query($sql);
				if ($query) {
    				echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = './list_user.php';</script>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
            }
?>