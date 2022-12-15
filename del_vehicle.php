<?php
    include("connect.php");
    
    $vehicle_id = $_GET['id'];
    //ลบข้อมูลรถจาก id
    $sql    = "DELETE FROM vehicle WHERE vehicle_id = '".$vehicle_id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "<script>alert('ลบข้อมูลรถแล้ว'); window.location = './list_vehicle.php';</script>"; 
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>