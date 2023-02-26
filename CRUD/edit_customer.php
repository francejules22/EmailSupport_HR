<?php
   $mysqli= new mysqli('localhost','root','','email_db');

   $id = $_POST['user_id'];
   $cname = $_POST['edit_customer_name'];
   $cemail = $_POST['edit_customer_email'];
   $sql = "UPDATE customer SET customer_name = '$cname' , customer_email = '$cemail' WHERE customer_id = '$id'";
   $query = $mysqli->query($sql) or die($mysqli->error);
?>