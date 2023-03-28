<?php 
  $mysqli= new mysqli('localhost','root','','email_db');

  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM customer WHERE customer_id = '$id'";
    $query = $mysqli->query($sql) or die($mysqli->error);
    $row = $query->fetch_assoc();

    $cname = $row['customer_name'];
    $cemail = $row['customer_email'];
  }
?>

<div class="modal fade" id="updateUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
           <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Email</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <!--Start form-->
         <form id="editUserForm" method="post">
           <div class="modal-body">
             <div class="row">
                <input type="hidden" value="<?= $id ?>" name="user_id">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input id="edit_customer_name"  class="form-control" type="text" name="edit_customer_name" value="<?= $cname ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input id="edit_customer_email"  class="form-control" type="email" name="edit_customer_email" value="<?= $cemail ?>">
                    </div>
                </div>
             </div>
           </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>Update</button>
           </div>
        </form>
        <!--End form-->

      </div>
   </div>
</div>


<script>
    $(document).ready(function(){
        $("#editUserForm").submit(function(e){
            e.preventDefault();

            var cname = $("#edit_customer_name").val();
            var cemail = $("#edit_customer_email").val();

            if(cname == '' || cemail == ''){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill-up the blank',
                    icon: 'warning',
                }) 
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to update?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                           url: 'CRUD/edit_customer.php',
                           type: 'POST',
                           cache: false,
                           data: $(this).serialize(),
                           success:function(data){
                              Swal.fire({
                                 title: 'Success',
                                 text: 'Update Successfully',
                                 timer: 2000,
                                 showConfirmButton: false,
                                 icon: 'success',
                              }).then(() => {
                                  window.location.reload();
                              })
                           }
                       })
                    }
                })  
            }
        })
    })
</script>
