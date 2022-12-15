<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart JS</title>
    <style>
    
        /* body {
            width: 100%;
            margin: 2rem auto;
        /* } */
        /* #chart-container {
            padding: 100px 50px 0px 50px;
            width: 100%;
            height: auto;
        } */ */
    </style>
</head>
<body>
     <!-- Navbar -->
     <?php
    include('ul.php');
  ?>
    <!-- EndNavbar -->
    
    <!-- คำสั่งปริ้น
    <?php
        echo "<input type='button' onclick='javascript:print()' value='สั่งปริ้น'>";
    ?>
    คำสั่งปริ้น -->


    <div class="container">
        <br>
             <center>
                        <h4 class="mb-3">กราฟแสดงรายงานการใช้ยานพาหนะ มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น</h4>
            </center>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function() {
            showGraph();
        });
        function showGraph(){
            {
                
                $.post("data.php", function(data) {
                    console.log(data);
                    let name = [];
                    let score = [];
                    let van = [];
                    for (let i in data) {
                        name.push(data[i].car_type);
                        score.push(data[i].car_score);
                        van.push(data[i].car_van);
                    }
                    
                    
                    let chartdata = {
                        labels: name,
                        

                        
// ----------------------------------

            datasets: [{
                label: 'รถตู้',
                data: van,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                // hoverBackgroundColor: '#CCCCCC',
                borderWidth: 1
        
            },
             {
                label: 'รถบัส',
                data: score,
                fill: false,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                // hoverBackgroundColor: '#CCCCCC',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
        
             }]
             
             
// ----------------------------------
                        // datasets: [{
                        //         label: 'Student Score',
                        //         backgroundColor: '#49e2ff',
                        //         borderColor: '#46d5f1',
                        //         hoverBackgroundColor: '#CCCCCC',
                        //         hoverBorderColor: '#666666',
                        //         data: score
                        // }]1ฤ+
                    };
                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    })
                })
            }
        }
    </script>
    </div>
</body>
</html>