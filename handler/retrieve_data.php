<?php
  include "../dbconnect/connection.php";

  $name = '';
  $email = '';

  $res = mysqli_query($link, "SELECT * FROM archive");
  while($row=mysqli_fetch_array($res)){
     mysqli_query($link, "INSERT INTO `customer` VALUES( '$row[customer_name]', '$row[customer_email]')") or die(mysqli_error($link));
     mysqli_query($link, "DELETE FROM `archive` WHERE `customer_id` = '$row[customer_id]'") or die(mysqli_error($link));
  }

?>

