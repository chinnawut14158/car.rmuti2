<?php
session_start(); 
    include('connect.php');

  $level = $_SESSION['userlevel'];
 	if($level!='1'){
    Header("Location:logout.php");  
  }  

// if (isset($_POST['submit'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $request_for = mysqli_real_escape_string($conn, $_POST['request_for']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
	$passenger = mysqli_real_escape_string($conn, $_POST['passenger']);
    $teacher = mysqli_real_escape_string($conn, $_POST['teacher']);
    $student = mysqli_real_escape_string($conn, $_POST['student']);
	$date_from = mysqli_real_escape_string($conn, $_POST['date_from']);
    $time_from = mysqli_real_escape_string($conn, $_POST['time_from']);
    $date_to = mysqli_real_escape_string($conn, $_POST['date_to']);
    $time_to = mysqli_real_escape_string($conn, $_POST['time_to']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $caretaker = mysqli_real_escape_string($conn, $_POST['caretaker']);
    $name_request = mysqli_real_escape_string($conn, $_POST['name_request']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    $type = mysqli_real_escape_string($conn, $_POST['country']);
    $license_plate = mysqli_real_escape_string($conn, $_POST['state']);
	$driver_id = mysqli_real_escape_string($conn, $_POST['driver_id']);

    $allowance = mysqli_real_escape_string($conn, $_POST['allowance']);
    $manager_name = mysqli_real_escape_string($conn, $_POST['manager_name']);
    $remark_mg2 = mysqli_real_escape_string($conn, $_POST['remark_mg2']);
    $manager_name2 = mysqli_real_escape_string($conn, $_POST['manager_name2']);
    $remark_mg3 = mysqli_real_escape_string($conn, $_POST['remark_mg3']);
    $manager_name3 = mysqli_real_escape_string($conn, $_POST['manager_name3']);

    // $_SESSION['T'] = "T$time_from";

    $_SESSION['fname'] = "$fname";
	$_SESSION['lname'] = "$lname";
    $_SESSION['position'] = "$position";
    $_SESSION['level'] = "$level";
	$_SESSION['location'] = "$location";
    $_SESSION['passenger'] = "$passenger";
	$_SESSION['request_for'] = "$request_for";
    $_SESSION['teacher'] = "$teacher";
    $_SESSION['student'] = "$student";
    $_SESSION['date_from'] = "$date_from";
    $_SESSION['date_to'] = "$date_to";
	$_SESSION['time_from'] = "$time_from";
    $_SESSION['time_to'] = "$time_to";
    $_SESSION['distance'] = "$distance";
    $_SESSION['caretaker'] = "$caretaker";
    $_SESSION['name_request'] = "$name_request";
    $_SESSION['status'] = "$status";
    $_SESSION['remark'] = "$remark";
    
    $_SESSION['type'] = "$type";
    $_SESSION['license_plate'] = "$license_plate";
	$_SESSION['driver_id'] = "$driver_id";

    $_SESSION['allowance'] = "$allowance";
    $_SESSION['manager_name'] = "$manager_name";
    $_SESSION['remark_mg2'] = "$remark_mg2";
    $_SESSION['manager_name2'] = "$manager_name2";
    $_SESSION['remark_mg3'] = "$remark_mg3";
    $_SESSION['manager_name3'] = "$manager_name3";

    $_SESSION['timeST'] = "T$time_from:00+07:00";
    $_SESSION['timeEND'] = "T$time_to:00+07:00";

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CarBooking RMUTI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <?php
    include('ul.php');
    ?>
    <!-- EndNavbar -->

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ตรวจสอบข้อมูล</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="send_orderout.php"
                        enctype="multipart/form-data">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ"
                                    value="<?php echo $_SESSION['fname'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                    placeholder="กรอกนามสกุล" value="<?php echo $_SESSION['lname'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="กรอกตำแหน่งงาน" value="<?php echo $_SESSION['position'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid Job title is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ระดับ</label>
                                <input type="text" class="form-control" id="level" name="level" placeholder="กรอกระดับ"
                                value="<?php echo $_SESSION['level'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid Job title is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ขออนุญาตใช้รถยนต์ราชการ เพื่อเดินทางไป</label>
                                <input type="text" class="form-control" id="request_for" name="request_for"
                                    placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $_SESSION['request_for'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">สถานที่ไป</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $_SESSION['location'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">จำนวน</label>
                                <input type="text" class="form-control" id="passenger" name="passenger"
                                    placeholder="กรอกจำนวน (คน)" value="<?php echo $_SESSION['passenger'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">อาจารย์ - เจ้าหน้าที่</label>
                                <input type="text" class="form-control" id="teacher" name="teacher"
                                    placeholder="กรอกจำนวน (คน)" value="<?php echo $_SESSION['teacher'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">นักศึกษา</label>
                                <input type="text" class="form-control" id="student" name="student"
                                    placeholder="กรอกจำนวน (คน)" value="<?php echo $_SESSION['student'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <!-- วันที่เดินทางไป -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางไป</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่</span>
                                    <input type="text" class="form-control" id="date_from" name="date_from" placeholder="Username"
                                    value="<?php echo $_SESSION['date_from'] ?>"
                                        required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <!-- วันทีเดินทางไป -->
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่ไป</span>
                                    <input type="text" class="form-control" id="time_from" name="time_from" placeholder="" value="<?php echo $_SESSION['time_from'] ?>" required="">
                                    <div class="invalid-feedback">
                                        Your time is required.
                                    </div>
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->

                            <!-- วันที่เดินทางกลับ -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางกลับ</label>
                                <div class="input-group has-validation">
                                <span class="input-group-text">วันที่กลับ</span>
                                <input type="text" class="form-control" id="date_to" name="date_to" placeholder="" value="<?php echo $_SESSION['date_to'] ?>" required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่กลับ</span>
                                    <input type="text" class="form-control" id="time_to" name="time_to" placeholder="" value="<?php echo $_SESSION['time_to'] ?>" required="">
                                    <div class="invalid-feedback">
                                        Your time is required.
                                    </div>
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->
                            <!-- วันทีเดินทางกลับ -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">รวมระยะทาง</label>
                                <input type="text" class="form-control" id="distance" name="distance"
                                    placeholder="กรอกระยะทาง" value="<?php echo $_SESSION['distance'] ?>" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ผู้ควบคุมรถยนต์ราชการขณะเดินทาง</label>
                                <input type="text" class="form-control" id="caretaker" name="caretaker"
                                    placeholder="กรอกชื่อผู้รับผิดชอบ" value="<?php echo $_SESSION['caretaker'] ?>" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อคนขอ</label>
                                <input type="text" class="form-control" id="name_request" name="name_request"
                                    placeholder="กรอกชื่อผู้รับผิดชอบ" value="<?php echo $_SESSION['name_request'] ?>" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ความเห็นหัวหน้าแผนกงานยานพาหนะ</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    placeholder="กรอกความเห็น" value="<?php echo $_SESSION['status'] ?>" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">หมายเหตุ</label>
                                <input type="text" class="form-control" id="remark" name="remark"
                                    placeholder="กรอกความเห็น" value="<?php echo $_SESSION['remark'] ?>" required="">
                            </div>
                            <?php
                            $sql    = "SELECT * FROM type WHERE id=$type";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-md-6">
                                <label for="" class="form-label">ประเภทรถ</label>
                                <input type="hidden" class="form-control" id="vehicle_id" name="vehicle_id" required=""
                                    value="<?php echo $_SESSION['type'] ?>">
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
                            <div class="col-md-6">
                                <label for="country" class="form-label">หมายเลขทะเบียนรถ</label>
                                <input type="hidden" class="form-control" id="license_plate" name="license_plate" required=""
                                    value="<?php echo $_SESSION['license_plate'] ?>">
                                <input type="text" class="form-control" id="license_name" name="license_name" required=""
                                    value="<?php echo $row['license_plate'] ?>">    
                            </div>
<?php
                                }}
                                $sql    = "SELECT * FROM user WHERE user_id=$driver_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
?>

                            <div class="col-md-6">
                                <label for="country" class="form-label">คนขับ</label>
                                <input type="hidden" class="form-control" id="driver_id" name="driver_id" required=""
                                    value="<?php echo $_SESSION['driver_id'] ?>">
                                <input type="text" class="form-control" id="show" name="show" required=""
                                    value="<?php echo $row['fname'] ,'&nbsp', $row['lname']?>">
                            </div>
                            <?php
                        }}?>

                            <input type="hidden" class="form-control" id="name_request" name="name_request"
                                        placeholder="กรอกข้อมูล" value="<?php echo $_SESSION['fname'] ,'&nbsp', $_SESSION['lname']?>"
                                        required="">
                                        <div class="col-sm-6">
                                <label for="" class="form-label">ขอเบิกเบี้ยเลี้ยง</label>
                                <input type="text" class="form-control" id="allowance" name="allowance"
                                    placeholder="ลงชื่อ" value="<?php echo $_SESSION['allowance'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อหัวหน้าแผนกงาน</label>
                                <input type="text" class="form-control" id="manager_name" name="manager_name"
                                    placeholder="ลงชื่อ" value="<?php echo $_SESSION['manager_name'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <!-- ผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ความเห็น</label>
                                <input type="text" class="form-control" id="remark_mg2" name="remark_mg2"
                                    placeholder="กรอกความเห็น" value="<?php echo $_SESSION['remark_mg2'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น</label>
                                <input type="text" class="form-control" id="manager_name2" name="manager_name2"
                                    placeholder="ลงชื่อ" value="<?php echo $_SESSION['manager_name2'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <!-- รองอธิการบดีประจำวิทยาเขตขอนแก่น -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ความเห็น</label>
                                <input type="text" class="form-control" id="remark_mg3" name="remark_mg3"
                                    placeholder="กรอกความเห็น" value="<?php echo $_SESSION['remark_mg3'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อรองอธิการบดีประจำวิทยาเขตขอนแก่น</label>
                                <input type="text" class="form-control" id="manager_name3" name="manager_name3"
                                    placeholder="ลงชื่อ" value="<?php echo $_SESSION['manager_name3'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>
                                <input type="hidden" class="form-control" id="datetimeTst" name="datetimeTst" placeholder=""
                                    value="<?php echo $_SESSION['date_from'] . $_SESSION['timeST'] ?>" required="">
                                <input type="hidden" class="form-control" id="datetimeTend" name="datetimeTend" placeholder=""
                                    value="<?php echo $_SESSION['date_to'] . $_SESSION['timeEND'] ?>" required="">
                            <hr class="my-4">
                            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit2">สร้างPDF</button>
                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">บันทึก</button>

                    </form>
                    <?php
                    // }
                    ?>
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