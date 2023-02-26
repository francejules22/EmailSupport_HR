<?php
session_start();
   //Connection using PDO
   //PDO (PHP Data Objects) - provides data access abstraction layer, which means that, regardless of which database you're using you use the same functions to issue queries and fetch data.
   $connect = new PDO("mysql:host=localhost; dbname=email_db", "root", "");
   $query = "SELECT * FROM customer ORDER BY customer_id";

   //prepare() - used to prepare an SQL statement for execution.
   $statement = $connect->prepare($query);

   //execute() - Returns TRUE on success or FALSE on failure.
   $statement->execute();

   //fetchAll() -Returns an array containing all of the result set rows
   $result = $statement->fetchALL();
?>