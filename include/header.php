<?php 
   include 'dbconnect/connection.php';
   session_start();
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
   <!--Datatables-->
     <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
     <link type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"/>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
   <!--Editor -->
     <link rel="stylesheet" href="trumbowyg/dist/ui/trumbowyg.min.css">
     <script src="trumbowyg/dist/trumbowyg.min.js"></script>
     
</head> 
     <body style="background: #E8EEF1;">
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
                <!--Start Dropdown-->
                <div class="d-flex  mb-2">
                   <a href="archive_page.php" class="icon btn btn-primary"><i class="icon fa-solid fa-box-archive"></i>Archives</a>
                   <a href="custom_email.php" class="icon btn btn-primary"><i class="icon fa-solid fa-envelope"></i>Email</a>
                   <!-- email tracking page -->
                   <a href="track_email.php" class="icon btn btn-primary"><i class="fa-solid fa-chart-column"></i> Track Email</a>
                   <!-- Button trigger modal -->
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#guide">
                           <i class="fa-solid fa-circle-question"></i>
                           </button>

                           <!-- Modal -->
                           <div class="modal fade" id="guide" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                              <div class="modal-content">
                                 <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Guidelines to HR Email Support System</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">                                 
                                      <b>Geco Asia Logo </b> -  <i>logo is used to link to the system's home page.</i> <br> <br>

                                      <b>Archive</b> -  <i>is linked to the archive page where accounts of emails are stored if not in use.</i> <br> <br>

                                      <b>Email Button</b> - <i>is a link to the archive page where employees accounts are kept when not in use.</i> <br> <br>

                                      <b>Track Email Button</b> - <i>is linked to the track email page where the HR can check the status of emails that are sent to the recipient emails.</i> <br> <br>

                                      <b>Question Mark</b> - <i>is a button to see the guidelines on what are the features of each functionality of the system.</i> <br> <br>

                                      <b>Add Email Button</b> - <i>is used to register email accounts to the system.</i>  <br> <br>

                                      <b>Archive All Accounts Button</b> - <i>is used to archive all of the accounts of emails that is registered and will be saved to archive database.</i> <br> <br>

                                      <b>Export Button</b> -  <i>button used to export account details of emails that are currently registered to the system to excel file.</i> <br> <br>

                                      <b>Show Entries Dropdown</b> -  <i>the dropdown will control the amount of accounts that is being shown to the tables.</i> <br> <br>

                                      <b>Search Bar</b> - <i>is used to search a specific account of emails.</i> <br> <br>

                                      <b>Edit Button</b> - <i>is used to edit the credentials of the emails account that is registered to the system.</i> <br> <br>

                                      <b>Delete Button</b> - <i>is used to delete the specific account of an emails that is terminated or can't be accessed by the companies.</i> <br> <br>

                                      <b>Single Archive Button</b> - <i>the button will archive the specific account that is not being used by the emails and will be saved to the archive database.</i> <br> <br>
                                 
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 
                                 </div>
                              </div>
                           </div>
                           </div>
                   
                   <!-- end of navbar -->
                </div>
                
            </div>
      </div>
  </nav>   
<!-- End of Navbar -->



<main class="mt-5 pt-3">


