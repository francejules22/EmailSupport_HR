<?php
$mysqli= new mysqli('localhost','root','','email_db');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query = mysqli_query($link, "SELECT * FROM `customer` customer_id = $id");
    $date = date("Y-m-d");
    while($fetch = mysqli_fetch_array($query)){
            mysqli_query($link, "INSERT INTO `archive` VALUES('', '$fetch[customer_name]', '$fetch[customer_email]','$date')") or die(mysqli_error($link));
            mysqli_query($link, "DELETE FROM `customer` WHERE `customer_id` = '$fetch[customer_id]'") or die(mysqli_error($link));
    }
}
?>