<?php
include('connect.php');
session_start();
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
  <body style="background-color:ebebeb" >

  <!-- Navbar -->
  <?php
    include('user_ul.php');
  ?>
  <!-- EndNavbar -->
  <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=formin.pdf'">ดาวน์โหลดแบบฟอร์ม(ภายในเขตอำเภอเมือง)</button>
    <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=formout.pdf'">ดาวน์โหลดแบบฟอร์ม(นอกเขตอำเภอเมือง)</button>

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