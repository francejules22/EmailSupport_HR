<?php
     include 'include/header.php';
     include "./dbconnect/connection.php";
?>


<div class="container">
     <!--Start Table-->
        <table class="table table-bordered table-striped table-hovered table-light" id="track_data">
               <thead>
                  <tr>
                     <th>Subject</th>
                     <th>Recipient</th>
                     <th>Email Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                       $conn = new mysqli('localhost','root','','email_db');
                       $sql = "SELECT * FROM email_track";
                       $res = $conn->query($sql) or die($conn->error);
                       while($row=$res->fetch_assoc())
                      {
                  ?>
                  <tr>
                     <td><?= $row['subject'] ?></td>
                     <td><?= $row['emails'] ?></td>
                     <td><center>
                        <!--Add Ternary Operator-->
                        <button type="button" class="btn btn-success" id= "<?= $row['status'] ?>" >Sent</button> 
                     </center></td>
                  </tr>
                  <?php
                      }
                  ?>
               </tbody>
            </table>
     <!--End Table-->
 </div>


 
<!--Datatables-->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

 <script>
     $(document).ready(function(){
       
          //Start Data Tables
          $('#track_data').DataTable();


          //Fail or Sent Status
          
     })
 </script>