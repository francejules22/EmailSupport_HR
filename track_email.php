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
                        <!--Sent or Fail Email Status-->
                           <?php if ($row['status'] == 'send') { ?>
                               <button type="button" class="btn btn-success" id= "<?= $row['status'] ?>" >Sent</button>
                           <?php } else { ?>
                               <button type="button" class="btn btn-danger" id= "<?= $row['status'] ?>" >Fail</button>
                           <?php } ?>
                     </center></td>
                  </tr>
                  <?php
                      }
                  ?>
               </tbody>
            </table>
     <!--End Table-->

    <!-- Getting the ID for sweetalert-->
            <?php if(isset($_GET['m'])) : ?>
               <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>">
                  <label>email sent</label>
               </div>
            <?php endif; ?>
 </div>


 
<!--Datatables-->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

 <script>
     $(document).ready(function(){
          //Start Data Tables
          $('#track_data').DataTable();
      })


// Added Alert Box for Email Success
     const flasdata = $('.flash-data').data('flashdata')
         if(flashdata)
         {
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Email has been successfully sent',
            showConfirmButton: false,
            timer: 1500
            })
         }
 </script>