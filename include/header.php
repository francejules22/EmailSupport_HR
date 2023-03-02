<?php 
   include 'dbconnect/connection.php';

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
  <!--Datatables-->
  <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
  <link type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
  </head> 
<body>

<!--Start Add Function -->
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
<!--End Add Function -->
    
<!-- Start of Navbar -->
  <nav class="navbar navbar-expand-md"  >
    <div class="container-fluid ">
      <a href="index.php"><img src="img/GECO.png" class="logo" ></a>
         <div class=" container fw-bold text-light text-center" style="font-size:30px;"> HR Email Support</div> 
           <!-- style="margin-left:700px; font-size:30px; -->
              <button class="toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <!-- Start Search Form-->
               <!-- <form class="ms-auto" action="" method="POST">
                 <div class="input-group ">
                   <button class="btn btn-outline-light" type="submit" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                   <input type="text" id="search" name="search" class="form-control" value=">" aria-label="Example text with button addon" aria-describedby="button-addon1" autocomplete="off">
                 </div>
               </form> -->
             <!-- End Search Form-->



             <!--Start Dropdown-->
                <!-- <div class="dropdown">
                    <button class="btn btn-outline-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left: 20px;">
                        <i class="fa-solid fa-bars"></i>
                   </button>
                   <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="archive_page.php"><i class="icon fa-solid fa-box-archive"></i>Archive</a></li>
                      <li><a class="dropdown-item" href="custom_email.php" ><i class="icon fa-solid fa-envelope"></i>Send Custom Email</a></li>
                   </ul>
                </div> -->
             <!--End Dropdown-->
            </div>
      </div>
  </nav>
<!-- End of Navbar -->



<main class="mt-5 pt-3">