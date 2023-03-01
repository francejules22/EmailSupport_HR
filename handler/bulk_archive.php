<?php
	date_default_timezone_set("Etc/GMT+8");
    //database
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"email_db");
 
	
        if(isset($_POST["archive"])){
            $query = mysqli_query($link, "SELECT * FROM `customer`");
            $date = date("Y-m-d");
            while($fetch = mysqli_fetch_array($query)){
                    mysqli_query($link, "INSERT INTO `archive` VALUES('', '$fetch[customer_name]', '$fetch[customer_email]','$date')") or die(mysqli_error($link));
                    mysqli_query($link, "DELETE FROM `customer` WHERE `customer_id` = '$fetch[customer_id]'") or die(mysqli_error($link));
            }
            header("location:../index.php");

        }
	
?>