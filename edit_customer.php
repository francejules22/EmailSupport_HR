<?php
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"email_db");

   if(isset($_REQUEST['id'])){
      $id = $_REQUEST['id'];

      $sql = "SELECT * FROM customer WHERE customer_id='$id'";
      $query = $link->query($sql) or die ($link->error);
      $row = $query->fetch_assoc();

      $email = $row['customer_email'];
      $name = $row['customer_name'];
   }
?>


<?php
  include_once('index.php'); //include index.php
?>


<script>
  $(document).ready(function(){
    $("#editUserForm").submit(function(e){
      e.preventDefault();

      var name = $("#edit_customer_name").val();
      var email = $('#edit_customer_email').val();

      if(name == '' || email == ''){
        Swal.fire({
           title: 'Error',
           text: 'Please fill-up the blank',
           icon: 'warning',

        })
      }
    })
  })
</script>