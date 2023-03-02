<?php

include "../dbconnect/connection.php";

$name='';
$email='';
$date = date("Y-m-d");

$res=mysqli_query($link,"SELECT * FROM customer");
while($row=mysqli_fetch_array($res))
{
            mysqli_query($link, "INSERT INTO `archive` VALUES('', '$row[customer_name]', '$row[customer_email]','$date')") or die(mysqli_error($link));
            mysqli_query($link, "DELETE FROM `customer` WHERE `customer_id` = '$row[customer_id]'") or die(mysqli_error($link));

}  
?>