<?php
include('connect.php');
session_start();
$level = $_SESSION['userlevel'];
 	if($level!='1'){
    Header("Location:logout.php");  
  }

                               
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CarBooking RMUTI</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <?php
    include ('ul.php')
    
    ?>
    <!-- EndNavbar -->
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ขออนุญาตใช้รถยนต์ราชการในเขตอำเภอเมือง จังหวัดขอนแก่น</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="confirm_in.php"
                        enctype="multipart/form-data">
                        <div class="row g-3">

                        <?php

                        if (isset($_GET['id'])) {
                        //ดึงข้อมูล จากไอดี มาทำการแก้ไข
                            // $sql    = "SELECT * FROM events WHERE id = '" . $_GET['id'] . "'";
                            $sql    = "SELECT * FROM events 
                            LEFT JOIN vehicle ON events.vehicle_id = vehicle.vehicle_id 
                            LEFT JOIN user ON events.driver_id = user.user_id WHERE id = '" . $_GET['id'] . "'";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            $_SESSION['type_id'] = $row['type_id'];
                            $_SESSION['vehicle_id'] = $row['vehicle_id'];
                            $_SESSION['driver_id'] = $row['driver_id'];
                            $_SESSION['idm'] = $row['id'];

                            $type = $_SESSION['type_id'];
                            $license_plate = $_SESSION['vehicle_id'];
                            $driver_id = $_SESSION['driver_id'];
                            $idm = $_SESSION['idm'];
                        ?>
                        <?php
                                
                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    
                                ?>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ"
                                    value="<?php echo $row['fname']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                                          
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                    placeholder="กรอกนามสกุล" value="<?php echo $row['lname']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                            
                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-12">
                                <label for="" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="กรอกตำแหน่งงาน" value="<?php echo $row['position']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid Job title is required.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="" class="form-label">ขออนุญาตใช้รถยนต์ ราชการ เพื่อเดินทางไป
                                    (สถานที่ไป)</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="กรอกสถานที่เดินทาง" value="<?php echo $row['location']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">จำนวนผู้เดินทาง</label>
                                <input type="text" class="form-control" id="passenger" name="passenger"
                                    placeholder="กรอกจำนวนผู้เดินทาง" value="<?php echo $row['passenger']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">เพื่อปฎิบัติหน้าที่</label>
                                <input type="text" class="form-control" id="request_for" name="request_for"
                                    placeholder="กรอกวัตถุประสงค์ในการเดินทาง" value="<?php echo $row['request_for']; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <!-- วันที่เดินทางไป -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่</span>
                                    <input type="date" class="form-control" id="date_from" name="date_from" placeholder=""
                                        required="" value="<?php echo $row['date_from']; ?>">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่</span>
                                    <input type="date" class="form-control" id="date_to" name="date_to" placeholder=""
                                        required="" value="<?php echo $row['date_to']; ?>">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทางไป</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่ไป</span>
                                    <input type="time" class="form-control" id="time_from" name="time_from"
                                        placeholder="Time" required="" value="<?php echo $row['time_from']; ?>">
                                    <div class="invalid-feedback">
                                        Your time is required.
                                    </div>
                                </div>
                            </div>
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทางกลับ</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่กลับ</span>
                                    <input type="time" class="form-control" id="time_to" name="time_to"
                                        placeholder="Time" required="" value="<?php echo $row['time_to']; ?>">
                                </div>
                            </div>
                            <?php
                            }}
                            ?>  
                            <!-- ----------------------------------------------------------------------------- -->
                            <?php
                            $sql    = "SELECT * FROM type WHERE id=$type";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">ประเภทรถ</label>
                                <input type="text" class="form-control" id="show" name="show" required=""
                                    value="<?php echo $row['type_name'] ?>">
                            </div>
                            <?php
                                }}
                                $sql    = "SELECT * FROM vehicle WHERE vehicle_id=$license_plate";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">เลขทะเบียน</label>
                                <input type="hidden" class="form-control" id="license_plate" name="license_plate" placeholder="กรอกชื่อ"
                                    value="<?php echo $row['vehicle_id']; ?>" required="">
                                <input type="text" class="form-control" id="show" name="show" placeholder="กรอกชื่อ"
                                    value="<?php echo $row['license_plate']; ?>" required="">
                            </div>
                            <?php
                                }}
                                $sql    = "SELECT * FROM user WHERE user_id=$driver_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                
                            ?>            
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">คนขับ</label>
                                <input type="hidden" class="form-control" id="driver_name" name="driver_name" required=""
                                    value="<?php echo $row['user_id']?>">
                                <input type="text" class="form-control" id="show" name="show" required=""
                                    value="<?php echo $row['fname'] ,'&nbsp', $row['lname']?>">
                            </div>
                            <?php
                                }}
                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    
                                ?>
                        <center>
                            <div class="col-sm-6">
                                <label for="lastName"
                                    class="form-label">ผู้อนุญาตให้รถยนต์ราชการออกนอกเขตวิทยาเขตฯ</label>
                                <input type="text" class="form-control" id="manager_name" name="manager_name"
                                    placeholder="ลงชื่อผู้ขออนุญาต" value="<?php echo $row['manager_name']; ?>" required="">
                            </div>
                            <?php
                                    }}?>
                        </center>
                        <hr class="my-4">

                        <!-- <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">บันทึก</button> -->
                        <?php
                        }
                        ?>
                    </form>
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
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="form-validation.js"></script>
</body>

</html>