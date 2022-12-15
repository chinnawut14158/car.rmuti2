<?php

    header('Content-Type: application/json');
    require_once 'db.php';

    $sqlQuery = "SELECT * FROM student ORDER BY id"; 

    // เก็บข้อมูลที่คิวรี่มา
    $result = mysqli_query($conn, $sqlQuery); 
    // เก็บข้อมูลที่คิวรี่มา

    $data = array();

    // ใช้ foreach ในการ loop ข้อมูล
    foreach($result as $row) {
        $data[] = $row;
    }
    // ใช้ foreach ในการ loop ข้อมูล

    mysqli_close($conn);

    echo json_encode($data);
?>