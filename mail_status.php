<?php

//OPEN STATUS
    if(isset($_GET['token'])!=''){
       $token = $_GET['token']; 
       $conn=mysqli_connect("localhost","root","");
       mysqli_select_db($conn,"email_db");
       mysqli_query($conn,"UPDATE email_track SET email_status = 'open' WHERE unique_id = '$token'");
    } 
?>
 