<?php
    include("connect.php");
    
    $id = $_GET['id'];
    //ลบข้อมูลรถจาก id
    $sql    = "DELETE FROM user WHERE user_id = '".$id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "<script>alert('ลบข้อมูลบุคลากรแล้ว'); window.location = './list_user.php';</script>"; 
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>