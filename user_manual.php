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

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body style="background-color:ebebeb">

  <!-- Navbar -->
  <?php
  include('user_ul.php');
  ?>
  <!-- EndNavbar -->
  <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=ใบขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมืองจังหวัดขอนแก่น.pdf'">ดาวน์โหลดแบบฟอร์ม(ภายในเขตอำเภอเมือง)</button>
  <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=ใบขออนุญาตใช้รถยนต์ราชการภายนอกเขตพื้นที่จังหวัดขอนแก่น.pdf'">ดาวน์โหลดแบบฟอร์ม(นอกเขตอำเภอเมือง)</button>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
  </div>
</body>
</html>