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

<?php
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"email_db");
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
  </head> 
<body>
<!-- Start of Navbar -->
  <nav class="navbar navbar-expand-md"  >
    <div class="container-fluid "> 
       <a href="index.php"> <img src="img/GECO.png" class="logo" ></a>
        <div class=" container fw-bold text-light text-center" style="font-size:30px;"> HR Email Support</div> 
         <!-- style="margin-left:700px; font-size:30px; -->
             <button class="toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <form class="ms-auto" role="search" >
               <div class="input-group ">
                 <button class="btn btn-outline-light" type="button" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                 <input type="text" class="form-control" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
               </div>
             </form>
          </div>
      </div>
  </nav>
<!-- End of Navbar -->


<main class=" mt-5 pt-3">
     <?php
        $id=$_GET["id"];
        $email="";
        $name="";

        $res=mysqli_query($link,"SELECT * FROM customer WHERE customer_id = $id");
     ?>
            
     <form  method="POST" name="form1">
           <div class="justify-content-center">
                 <Label>Email: </Label>
                 <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
                 <Label>Name: </Label>
                 <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
                 <input type="submit" name="update" value="Update" class="btn btn-warning">
            </div>
      </form>
      <?php
         if (isset($_POST["update"])){
           $name=$_POST['name'];
    		   $email=$_POST['email'];
    		   $sql = "UPDATE `customers` SET `customer_name`='$name',`customer_email`='$email' WHERE id=$id";
      ?>

     <script type="text/javascript">
        window.location="index.php?id=<?php echo $id?>";
     </script>

     <?php
         }
     ?>
   </div>
 </div>
</main>
</body>
</html>