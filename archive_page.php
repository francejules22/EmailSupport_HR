<?php
  include 'include/header.php';
  include 'dbconnect/connection.php';
?>

<div class="container">
    <div class="table-responsive text-center">
         <!--Start of Table-->
             <table class="table table-bordered table-striped">
                 <tr>
                     <th>Customer Name</th>
                     <th>Email</th>
                     <th>Data Archived</th>
                     <th>Action</th>
                 </tr>

                 <?php
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
                         <button class="retrieve btn btn-success" id="<?= $row['customer_id']?>"><i class="icon fa-sharp fa-solid fa-arrow-up-from-bracket"></i>Retrieve Account</button>
                     </td>
                </tr>
                <?php
                    }
                ?>
             </table>
         <!--End of Table-->
    </div>
</div>


<script>
    $(document).ready(function(){
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