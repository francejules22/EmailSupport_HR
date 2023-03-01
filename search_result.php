
<?php 
   include 'dbconnect/pdo_connection.php';

   //Search Function
   $mysqli= new mysqli('localhost','root','','email_db');
   $search = $_GET['search'];
   $sql = "SELECT * FROM customer WHERE customer_name LIKE '$search%' ORDER BY customer_id DESC";
   $query = $mysqli->query($sql) or die($mysqli->error);
   $row = $query->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Email Support</title>
   <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
   <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- link css -->
    <link rel="stylesheet" href="CSS/style.css">
  <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
  </head> 
<body>
    <?php
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"email_db");
    
       if(isset($_POST["add"])){
           $name=$_POST['ename'];
           $email=$_POST['email'];
    
          $loop=0;
          $count=0;
          $res=mysqli_query($link,"SELECT *FROM customer WHERE customer_name='$name' ") or die(mysqli_error($link));
          $count=mysqli_num_rows($res);
          
          if ($count==1){
    ?>
         <script>
             Swal.fire({
              position: 'center',
              icon: 'warning',
              title: 'Employee already registered',
              showConfirmButton: false,
              timer: 1500
            })
         </script>
    <?php
      } else {
          $loop=$loop+1;
          mysqli_query($link,"INSERT INTO customer(customer_name,customer_email)VALUES('$name','$email')") or die(mysqli_error($link));
        }
      }
    ?>
    
    
<!-- Start of Navbar -->
  <nav class="navbar navbar-expand-md"  >
    <div class="container-fluid ">
      <img src="img/GECO.png" class="logo" >
         <div class=" container fw-bold text-light text-center" style="font-size:30px;"> HR Email Support</div> 
           <!-- style="margin-left:700px; font-size:30px; -->
              <button class="toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Start Search Form-->
               <form class="ms-auto" action="search_result.php" method="GET">
                 <div class="input-group ">
                   <button class="btn btn-outline-light" type="submit" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                   <input type="text" id="search" name="search" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" autocomplete="off">
                 </div>
               </form>
             <!-- End Search Form-->
            </div>
      </div>
  </nav>
<!-- End of Navbar -->


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



<main class=" mt-5 pt-3">
    <div class="wrapper-box container">
       <!-- Button trigger modal -->
        <button type="button" class="ae btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           <i class="icon fa-solid fa-user-plus"></i>Add Customer
        </button>
        <a href="custom_email.php" class="ae btn btn-outline-primary"><i class="icon fa-solid fa-envelope"></i>Custom Email</a>
        <button class="ae btn btn-outline-dark"> <i class="icon fa-solid fa-clock-rotate-left"></i>History</button>
        <button class="btn btn-outline-warning"><i class="icon fa-solid fa-box-archive"></i>Archive</button>
    </div>

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

</body>
</html>



