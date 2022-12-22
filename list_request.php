<?php
include('connect.php');
session_start();
$level = $_SESSION['userlevel'];
 	if($level!='1'){
    Header("Location:logout.php");  
  }  
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CarBooking RMUTI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9"> -->

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light" >

  <!-- Navbar -->
  <?php
    include('connect.php');
    include('ul.php');
  ?>
  <!-- EndNavbar -->
<main>
  <div class="container">
        <div class="row" style="padding:50px 0px 0px 0px;">
            <div class="col">
                <center><h1>รายการจองการจอง</h1></center>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary text-white">
                                <!-- <th>id</th> -->
                                <th>พนักงานขับรถ</th>
                                <th>รูปยานพาหนะ</th>
                                <th>ยานพาหนะ</th>
                                <th>รายละเอียดการขอใช้</th>
                                <th>ประเภท</th>
                                <th>ผู้ขอใช้ยานพาหนะ</th>
                                <th>สถานที่</th>
                                <th>เริ่มวันที่</th>
                                <th>ถึงวันที่</th>
                                <th>เวลาไป</th>
                                <th>เวลากลับ</th>
                                <th>สถานะ</th>
                                <th>เพิ่มข้อมูลหลังจากเดินทาง</th>
                                <th>ลบข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            // ดึงข้อมูลมาจากดาต้าเบส
                            // แสดงข้อมูลในตาราง
                            $sql = "SELECT * FROM events 
                            LEFT JOIN vehicle ON events.vehicle_id = vehicle.vehicle_id 
                            LEFT JOIN user ON events.driver_id = user.user_id WHERE 1";
                            

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    // echo "<th>" . $row['id'] . "</th>";
                                    echo "<th><img src='img/" . $row['photo'] . "'width=100 height=100 ></th>";
                                    echo "<th><img src='car/" . $row['vehicle_photo'] . "'width=100 height=100 ></th>";
                                    echo "<th>" . $row['license_plate'] . "</th>";
                                    echo "<th>" . $row['request_for'] . "</th>";
                                    echo "<th>" . $row['in_out'] . "</th>";
                                    echo "<th>" . $row['fname'] .'&nbsp'. $row['lname'] . "</th>";
                                    echo "<th>" . $row['location'] . "</th>";
                                    echo "<th>" . $row['date_from'] . "</th>";
                                    echo "<th>" . $row['date_to'] . "</th>";
                                    echo "<th>" . $row['time_from'] . "</th>";
                                    echo "<th>" . $row['time_to'] . "</th>";
                                    echo "<th>" . $row['status_order'] . "</th>";
                                    // echo "<th><a href='order_edit.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                    echo "<th><a href='after_order.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>หลังจากเดินทาง</th>";
                                    echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_order.php?id=" . $row['id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th colspan='4'>ยังไม่มีคำขอใช้บริการ</th>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  

</body></html>