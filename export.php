<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "email_db");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM customer";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Employee Name</th>  
                         <th>Employee Email</th>  
                         
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["customer_name"].'</td>  
                         <td>'.$row["customer_email"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>