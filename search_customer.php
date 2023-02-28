<?php

     $mysqli= new mysqli('localhost','root','','email_db');
     if(isset($_POST['input'])){
        $input = $_POST['input'];
        $query = "SELECT * FROM customer WHERE customer_name  LIKE '{$input}%'";
        $result = mysqli_query($mysqli, $query);

         //number of rows in database
        if(mysqli_num_rows($result) > 0){?>
          
           <table class="table table-bordered table-striped mt-4">
              <thead>
                 <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Email Status</th>
                    <th colspan="2">Action</th>
                 </tr>
              </thead>
              <tbody>
                  <?php
                      while($row = mysqli_fetch_assoc($result)){
                         $id = $row['customer_id'];
                         $cname = $row['customer_name'];
                         $cemail = $row['customer_email'];

                         ?>
                            <tr>
                               <td><?php echo $id; ?></td>
                               <td><?php echo $cname; ?></td>
                               <td><?php echo $cemail; ?></td>
                            </tr>

                         <?php
                      }
                  ?>
              </tbody>
           </table>
        <?php

        } else {
            echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
        }
     }
?>