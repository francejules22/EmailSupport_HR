<!-- Delete Function-->
<?php
$mysqli= new mysqli('localhost','root','','email_db');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM customer WHERE customer_id = '$id'";
    $query = $mysqli->query($sql) or die($mysqli->error);
}
?>