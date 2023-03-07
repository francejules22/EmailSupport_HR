<?php
  include 'include/header.php';
  include 'dbconnect/connection.php';
?>

<div class="container">
    <div class="table-responsive text-center">
         <!--Start of Table-->
             <table class="table table-bordered table-striped table-hovered table-light" id="customer_data">
               <thead>
                  <tr>
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Data Archived</th>
                      <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                       $conn = new mysqli('localhost','root','','email_db');
                       $sql = "SELECT * FROM archive";
                       $query = $link->query($sql) or die($link->error);
                       while($row = $query->fetch_assoc())
                         {
                   ?>

                    <tr>
                       <td><?= $row['customer_name'] ?></td>
                       <td><?= $row['customer_email'] ?></td>
                       <td><?= $row['date_archived'] ?></td>
                       <td>
                           <div class="d-flex justify-content-center">
                              <button class="retrieve btn btn-success" id="<?= $row['customer_id']?>"><i class="icon fa-sharp fa-solid fa-arrow-up-from-bracket"></i>Retrieve Account</button>
                           </div>
                       </td>
                     </tr>
                    <?php
                       }
                    ?>
                </tbody>
             </table>
         <!--End of Table-->
    </div>
</div>

<!--Datatables-->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){

      //Data tables
        $("#customer_data").DataTable();


        //Start Archive
          $(document).on('click', '.retrieve', function(){
             var id = $(this).attr('id');
             Swal.fire({
                title: 'Retrieve this data?',
                text: 'The data will be registered again!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Retrieve the data!'
             }).then((result) => {
                if(result.isConfirmed){
                  $.ajax({
                    url: 'handler/retrieve_data.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'The data has been retrieved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                           window.location.reload();
                        })
                    }
                  })
                }
             })
          })
        //End Archive
    });
</script>

<?php
  include 'include/footer.php';
?>