<?php 
    $servername = "localhost";
    $username = "chin";
    $password = "Chin1234!";
    $dbname = "projectcalendar";

    // สร้างคำสั่งลัด ให็เป็น $conn
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
?> 