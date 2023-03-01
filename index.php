<?php
     include 'include/header.php';
?>


<div class="wrapper-box container">
       <!-- Button trigger modal -->
        <button type="button" class="ae btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           <i class="icon fa-solid fa-user-plus"></i>Add Customer
        </button>
        <button class="ae btn btn-outline-dark"> <i class="icon fa-solid fa-clock-rotate-left"></i>History</button>
        
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#archive">
           <i class="icon fa-solid fa-box-archive"></i>Archive All Accounts
        </button>
</div>


<!-- Start of Modal Add Customer -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form  method="POST">
               <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text" id="addon-wrapping">Name:</span>
                  <input type="text" class="form-control" placeholder="" name="ename" aria-label="Username" aria-describedby="addon-wrapping">
               </div>
               <div class="input-group flex-nowrap">
                 <span class="input-group-text" id="addon-wrapping">Email:</span>
                 <input type="text" class="form-control" placeholder="" name="email" aria-label="Username" aria-describedby="addon-wrapping">
               </div>
         </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-success" name="add"><i class="icon fa-solid fa-user-plus"></i>Add</button>
          </form>
         </div>
      </div>
   </div>
</div>
<!--End of Modal Add Customer-->


<!-- Start of Archive Modal-->
   <div class="modal fade" id="archive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <form action="handler/bulk_archive.php" method="POST">
                   <h3>Are you sure you want to save all data to the archive!</h3>
              </div>
              <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="archive"><i class="icon fa-solid fa-box-archive"></i>Confirm</button>
                 </form>
              </div>
          </div>
       </div>
   </div>
<!-- End of Archive Modal-->




    <div class="container">
         <div class="table-responsive text-center">
          <!--Start of Table-->
             <table class="table table-bordered table-striped">
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Email Status</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM customer";
                    $query = $link->query($sql) or die($link->error);
                   while($row = $query->fetch_assoc())
                  {
                ?>
                <tr>
                   <td> <?= $row['customer_name']?></td>
                   <td> <?= $row['customer_email']?></td>
                   <td>
                     <button type="button" name="email_button" class="btn btn-info btn-xs email_button" ><i class="icon fa-solid fa-square-poll-horizontal"></i>Status</button> 
                  </td>
                  <td><center>
                    <button type="button" class="btn btn-warning update_user" id= "<?= $row['customer_id'] ?>" ><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger del_user " id= "<?= $row['customer_id'] ?>" ><i class="fa-solid fa-trash"></i></button>
                    <button type="button" class="btn btn-danger archive_user" id= "<?= $row['customer_id'] ?>" ><i class="fa solid fa-box-archive"></i></button>
                   </center></td>
                </tr>
                <?php
                   }
                ?>  
             </table>
            <!--End of Table-->
          </div>
       </div>
    </div>
 </main>

  <div id="display_user"></div>
  <div id="search_result"></div>

<script>
  //Start
    $(document).ready(function(){

      //Start PHPMailer
        $('.email_button').click(function(){
            $(this).attr('disabled', 'disabled');
            var id = $(this).attr("id");
            var action = $(this).data("action");
            var email_data = [];
            if(action == 'single')
            {
                email_data.push({
                    email: $(this).data("email"),
                    name: $(this).data("name")
                });
            } 
            else 
            {
               $('.single_select').each(function(){
                   if($(this).prop("checked") == true)
                   {
                      email_data.push({
                         email: $(this).data("email"),
                         name: $(this).data('name')
                      });
                   }
               });
            }
         //End PHPMailer

         //Start AJAX
            $.ajax({
                url: "send_mail.php",
                method: "POST",
                data: {email_data:email_data},
                beforeSend:function(){
                     $('#'+id).html('Sending...');
                     $('#'+id).addClass('btn-danger');
                },
                success:function(data){
                    if(data == 'ok')
                    {
                        $('#'+id).text('Success');
                        $('#'+id).removeClass('btn-danger');
                        $('#'+id).removeClass('btn-info');
                        $('#'+id).addClass('btn-success');
                    }
                    else
                    {
                       $('#'+id).text(data);
                    }
                    $('#'+id).attr('disabled', false);
                }
            })
        });
       //End AJAX


        //Edit Function
        $(document).on('click','.update_user',function(){
           var id = $(this).attr('id');
          
           $("#display_user").html('');
           $.ajax({
            url: 'CRUD/view_customer.php',
            type: 'POST',
            cache: false,
            data: {id:id},
            success:function(data){
               $("#display_user").html(data);
               $("#updateUserModal").modal('show');
            }
           })
        });



        //Start Delete Function
        $(document).on('click','.del_user',function(e){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The customer details will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d44',
                confirmButtonText: 'Confirm Delete'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'CRUD/delete_customer.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            title: 'Success',
                            position: 'center',
                            icon: 'success',
                            title: 'Deleted Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            window.location.reload();
                        })
                     }
                 })
               }
            })
        });
      //End Delete Function


      //Start Archive Function
         $(document).on('click', '.archive_user', function(e){
             var id = $(this).attr('id');
             Swal.fire({
                title: 'Are you sure?',
                text: 'The details will be saved to archive!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d44',
                confirmButtonText: 'Confirm',
             }).then((result) => {
               if(result.isConfirmed){
                  $.ajax({
                     url: 'handler/single_archive.php',
                     type: 'POST',
                     data: {id:id},
                     success:function(data){
                        Swal.fire({
                           position: 'center',
                           icon: 'success',
                           title: 'Data saved to archive successfully',
                           showConfirmButton: false,
                           timer: 2000
                        }).then(() => {
                           window.location.reload();
                        })
                     }
                  })
               }
             })
         });
      //End Archive Function


      //Start Live Search Function
      //  $("#live_search").keyup(function(){
      //      var input = $(this).val();
      //      //alert(input);
      //      if(input != ""){
      //       $.ajax({
      //          url: "search_customer.php",
      //          method: "POST",
      //          data: {input:input},
      //          success:function(data){
      //             $("#search_result").html(data);
      //          }
      //       })
      //      } else {
      //          $("#search_result").css("display","none");
      //      }

      //  });
      //End Live Search Function

}); 
//End
</script>


<?php
   include 'include/footer.php';
?>