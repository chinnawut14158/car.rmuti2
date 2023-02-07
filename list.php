<?php  
 $connect = mysqli_connect("localhost", "root", "", "projectcalendar");  
 $query ="SELECT * FROM events ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  

 <html>  
      <head>
            
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
           <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>  


      </head>  
      <body>
      <?php
        include('ul.php');
        ?>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>fname</td>  
                                    <td>lname</td>  
                                    <td>location</td>  
                                    <td>in_out</td>  
                                    <td>request_for</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["fname"].'</td>  
                                    <td>'.$row["lname"].'</td>  
                                    <td>'.$row["location"].'</td>  
                                    <td>'.$row["in_out"].'</td>  
                                    <td>'.$row["request_for"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
