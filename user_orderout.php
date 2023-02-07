<?php
include('connect.php');
session_start();
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
    include('user_ul.php');
    ?>
    <!-- EndNavbar -->

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ขออนุญาตใช้รถยนต์ราชการภายนอกเขตอำเภอเมือง จังหวัดขอนแก่น</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="user_sendorderout.php"
                        enctype="multipart/form-data">
                        <div class="row g-3">

                            <div class="col-sm-3">
                                <label for="firstName" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value=""
                                    required="">
                            </div>

                            <div class="col-sm-3">
                                <label for="lastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value=""
                                    required="">
                            </div>

                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-3">
                                <label for="" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน"
                                    value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">ระดับ</label>
                                <input type="text" class="form-control" id="level" name="level" placeholder="กรอกระดับ"
                                    value="" >
                            </div>
                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ขออนุญาตใช้รถยนต์ราชการ เพื่อเดินทางไป</label>
                                <input type="text" class="form-control" id="request_for" name="request_for"
                                    placeholder="กรอกรายละเอียดการเดินทาง" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">สถานที่ไป</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="กรอกรายละเอียดการเดินทาง" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="" class="form-label">จำนวน</label>
                                <input type="text" class="form-control" id="passenger" name="passenger"
                                    placeholder="กรอกจำนวน (คน)" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">อาจารย์ - เจ้าหน้าที่</label>
                                <input type="text" class="form-control" id="teacher" name="teacher"
                                    placeholder="กรอกจำนวน (คน)" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">นักศึกษา</label>
                                <input type="text" class="form-control" id="student" name="student"
                                    placeholder="กรอกจำนวน (คน)" value="" required="">
                            </div>

                            <!-- วันที่เดินทางไป -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางไป</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่ไป</span>
                                    <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Username"
                                        required="">
                                </div>
                            </div>
                            <!-- วันทีเดินทางไป -->
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่ไป</span>
                                    <input type="time" class="form-control" id="time_from" name="time_from" placeholder="Time" required="">
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->

                            <!-- วันที่เดินทางกลับ -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางกลับ</label>
                                <div class="input-group has-validation">
                                <span class="input-group-text">วันที่กลับ</span>
                                <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Username" required="">
                                </div>
                            </div>
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่กลับ</span>
                                    <input type="time" class="form-control" id="time_to" name="time_to" placeholder="Time"required="">
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->
                            <!-- วันทีเดินทางกลับ -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">รวมระยะทาง</label>
                                <input type="text" class="form-control" id="distance" name="distance"
                                    placeholder="กรอกระยะทาง" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ผู้ควบคุมรถยนต์ราชการขณะเดินทาง</label>
                                <input type="text" class="form-control" id="caretaker" name="caretaker"
                                    placeholder="กรอกชื่อผู้รับผิดชอบ" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อผู้ขออนุญาต</label>
                                <input type="text" class="form-control" id="name_request" name="name_request"
                                    placeholder="กรอกชื่อ-นามสกุล" value="" required="">
                            </div>   
                            <!-- <div class="col-6">
                                <label for="username" class="form-label">ลงวันที่(วันที่ยื่นคำขอ)</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="date_from" name="date_from" placeholder=""
                                        required="">
                                </div>
                            </div>                   -->
                            <hr class="my-4">
                            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">บันทึกข้อมูล</button>
                            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit2">สร้างPDF</button>
                    </form>
                </div>
                <div>      
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