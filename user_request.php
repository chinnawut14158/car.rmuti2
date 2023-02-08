<?php
include('connect.php');
session_start();
$level = $_SESSION['userlevel'];
if ($level != '1') {
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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
</head>
<body style="background-color:ebebeb">
    <!-- Navbar -->
    <?php
    include('ul.php');
    ?>
    <!-- EndNavbar -->

    <main>
        <div class="container">
            <div class="row" style="padding:50px 0px 0px 0px;">
                <div class="col">
                    <center>
                        <h1>รายการคำขอใช้บริการ(ภายในเขตอำเภอเมือง)</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="user_in_data">
                            <thead>
                                <tr style="background-color:fdc500">
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
                            <tbody style="background-color:ffffe0">
                                <?php

                                // ดึงข้อมูลมาจากดาต้าเบส
                                // แสดงข้อมูลในตาราง
                                $sql = "SELECT * FROM `events` WHERE status=1 AND in_out_id=1";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th>" . $row['request_for'] . "</th>";
                                        echo "<th>" . $row['in_out'] . "</th>";
                                        echo "<th>" . $row['fname'] . '&nbsp' . $row['lname'] . "</th>";
                                        echo "<th>" . $row['location'] . "</th>";
                                        echo "<th>" . $row['date_from'] . "</th>";
                                        echo "<th>" . $row['date_to'] . "</th>";
                                        echo "<th>" . $row['time_from'] . "</th>";
                                        echo "<th>" . $row['time_to'] . "</th>";
                                        echo "<th>" . 'รออนุมัติ' . "</th>";
                                        // echo "<th><a href='order_edit.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                        echo "<th><a href='check_orderin.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>ตรวจสอบข้อมูล</th>";
                                        echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_order.php?id=" . $row['id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<th colspan='11'>ยังไม่มีคำขอใช้บริการ</th>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <center>
                        <h1>รายการคำขอใช้บริการ(ภายนอกเขตอำเภอเมือง)</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="user_out_data">
                            <thead>
                                <tr style="background-color:fdc500">
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
                            <tbody style="background-color:ffffe0">
                                <?php

                                // ดึงข้อมูลมาจากดาต้าเบส
                                // แสดงข้อมูลในตาราง
                                $sql = "SELECT * FROM `events` WHERE status=1 AND in_out_id=2";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th>" . $row['request_for'] . "</th>";
                                        echo "<th>" . $row['in_out'] . "</th>";
                                        echo "<th>" . $row['fname'] . '&nbsp' . $row['lname'] . "</th>";
                                        echo "<th>" . $row['location'] . "</th>";
                                        echo "<th>" . $row['date_from'] . "</th>";
                                        echo "<th>" . $row['date_to'] . "</th>";
                                        echo "<th>" . $row['time_from'] . "</th>";
                                        echo "<th>" . $row['time_to'] . "</th>";
                                        echo "<th>" . 'รออนุมัติ' . "</th>";
                                        // echo "<th><a href='order_edit.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                        echo "<th><a href='check_orderout.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>ตรวจสอบข้อมูล</th>";
                                        echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_order.php?id=" . $row['id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<th colspan='11'>ยังไม่มีคำขอใช้บริการ</th>";
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
</body>

</html>
<script>
    $(document).ready(function() {
        $('#user_in_data').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#user_out_data').DataTable();
    });
</script>