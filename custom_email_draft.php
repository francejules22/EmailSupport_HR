<?php
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- link css -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
</head> 

<body>
     <nav class="navbar navbar-expand-md"  >
         <div class="container-fluid justify-content-center">
              <a href="index.php"> <img src="img/GECO.png" class="logo" ></a>
              <button class="toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <form class="ms-auto" role="search" >
               <div class="input-group ">
                 <input type="hidden" class="form-control" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
               </div>
             </form>
           </div>
         </div>
     </nav>
 
<main>
    <div class="text-center">
        <div class="row">
            <div class="col">
                   <div class="form container bg-light border">
                       <div class="p-2">
                    <!--START OF TABLE -->
                          <!-- <table class="table table-bordered table-striped">
                              <tr>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Select</th>
                                  <th>Action</th>
                              </tr> -->

                              <?php 
                                 //  $count = 0;
                                 //  foreach($result as $row){
                                  //     $count = $count + 1;
                                  //     echo '
                                        //   <tr>
                                        //      <td>'.$row["customer_name"].'</td>
                                        //      <td>'.$row["customer_email"].'</td>
                                        //      <td>
                                        //         <input type="checkbox" 
                                        //                class="single_select" 
                                        //                name="single_select"
                                        //                data-email="'.$row["customer_email"].'"
                                        //                data-name="'.$row["customer_name"].'"/>
                                        //      </td>
                                        //      <td>
                                        //         <button type="button" 
                                        //                 name="email_button" 
                                        //                 class="btn btn-info btn-xs email_button"
                                        //                 id="'.$count.'"
                                        //                 data-email="'.$row["customer_email"].'"
                                        //                 data-name="'.$row["customer_name"].'"
                                        //                 data-action="single">Send Single
                                        //         </button> 
                                        //      </td>
                                        //   </tr>
                                        //';
                                       // }
                               ?>
<!-- 
                                  <tr>
                                     <td colspan="3"></td>
                                     <td><button type="button" 
                                                 name="bulk_email" 
                                                 class="btn btn-info email_button" 
                                                 id="bulk_email" 
                                                 data-action="bulk">Send Bulk
                                         </button>
                                     </td>
                                  </tr>
                            </table> -->
                        <!-- END OF TABLE -->

                        <!--Start of Data Table-->
                          <table class="table table-bordered table-light table-hovered table-striped" id="customer_data">
                               <thead>
                                  <tr>
                                     <th>Customer Name</th>
                                     <th>Email</th>
                                     <th>Email Status</th>
                                     <th>Select Email</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  <?php
                                     $conn = new mysqli('localhost','root','','email_db');
                                     $sql = "SELECT * FROM customer";
                                     $res = $conn->query($sql) or die($conn->error);
                                     while($row=$res->fetch_assoc())
                                     {
                                  ?>
                                  <tr>
                                     <td><?= $row['customer_name'] ?></td>
                                     <td class="get"><?= $row['customer_email'] ?></td>
                                     <td>
                                         <div class="d-flex justify-content-center">
                                            <button type="button" 
                                                    name="email_button" 
                                                    class="btn btn-info btn-xs email_button" 
                                                    id="<?php $count ?>" 
                                                    data-email="<?= $row['customer_email'] ?>" 
                                                    data-name="<?= $row['customer_name'] ?>" 
                                                    data-action="single" disabled>Status
                                            </button>
                                     </td>
                                        </div>
                                    
                                    
                                    <td>
                                        <input type="checkbox"
                                               class="single_select"
                                               id="single_select"
                                               data-email="<?= $row['customer_email']?>"
                                               data-name="<?= $Row['customer_name']?>" 
                                        />
                                    </td>
                                  </tr>
                                  <?php
                                     }
                                  ?>
                               </tbody>
                          </table>
                        <!--End of Data Table-->

                        <div class="d-flex justify-content-end mt-3">
                             <button class="btn btn-success">Add All Emails</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                 <div class="form container bg-light border">
                    <div class="p-2">
                         <!--Adding Successful Message -->
                             <?php 
                                 if(isset($_GET["status"]) && $_GET["status"] == "1") { ?>
                                    <div class="alert alert-success">Email Sent Successfully</div>
                              <?php } ?>
                              

                            <!--Start Form Action with POST Method-->
                            <!--Using POST Method (the sender name will not showed in url and it is hidden)-->
                            <form action="send.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                <!--First Input for Sender Name-->
                                     <div class="col-6 mb-3">
                                        <label for="sender_name" class="form-label">Sender Name</label>
                                        <input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="Sender Name"  required>
                                     </div>

                                <!--Second Input for Sender Email-->
                                    <div class="col-6 mb-3">
                                       <label for="sender_email" class="form-label">Sender Email</label>
                                       <input type="email" class="form-control" id="sender" name="sender" placeholder="Sender Email" required>
                                    </div>

                                <!--Third Input for Message-->
                                    <div class="col-6 mb-3">
                                       <label for="subject" class="form-label">Subject</label>
                                       <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                                    </div>

                                <!--Fourth Input for Files(png, jpeg, videos)-->
                                   <div class="col-5">
                                      <label for="attachments" class="form-label">Attachments (Multiple)</label>
                                      <input type="file" class="form-control" multiple id="attachments" name="attachments[]" placeholder="Input Files" required>
                                   </div>
                               </div>
                        
                               <!--Fifth Input for Recipient Emails-->
                                   <div class="mb-3">
                                       <label for="recipient" class="form-label">Recipient Emails</label>
                                       <textarea class="form-control" id="recipient" name="recipient" placeholder="Insert Multiple Emails" rows="3" required>
                                       </textarea>
                                   </div>
                        
                               <!--Six Input for Body-->
                                  <div class="mb-3">
                                      <label for="body" class="form-label">Body</label>
                                      <textarea class="form-control" id="body" name="body" placeholder="Enter a message" rows="5" required>
                                      </textarea>
                                  </div>

                                <!--Buttons-->
                                  <div class="button-box">
                                      <button class="btn btn-primary me-2" name="send" type="submit">Send Email</button>
                                      <button class="btn btn-danger" name="reset" type="reset">Reset Form</button>
                                  </div>
                           </form>
                           <!--End Form Action with POST Method-->
                      </div>
                 </div>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


</body>    
</html>

<!--Data Table-->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


<!-- START SINGLE EMAIL-->
<!--Using JQUERY-->
<script>
    $(document).ready(function(){
        $('.email_button').click(function(){
            $(this).attr('disabled', 'disabled');
            var id = $(this).attr("id");
            var action = $(this).data("action");
            var email_data = [];
            if(action == 'single')
            {
                email_data.push({
                    email: $(this).data("email"),
                    name: $(this).data("name")
                });
            } 
            else 
            {
               $('.single_select').each(function(){
                   if($(this).prop("checked") == true)
                   {
                      email_data.push({
                         email: $(this).data("email"),
                         name: $(this).data('name')
                      });
                   }
               });
            }


            //Starting Data Tables
            $("#customer_data").DataTable();

            //Starting AJAX
            $.ajax({
                url: "send_mail.php",
                method: "POST",
                data: {email_data:email_data},
                beforeSend:function(){
                     $('#'+id).html('Sending...');
                     $('#'+id).addClass('btn-danger');
                },
                success:function(data){
                    if(data == 'ok')
                    {
                        $('#'+id).text('Success');
                        $('#'+id).removeClass('btn-danger');
                        $('#'+id).removeClass('btn-info');
                        $('#'+id).addClass('btn-success');
                    }
                    else
                    {
                       $('#'+id).text(data);
                    }
                    $('#'+id).attr('disabled', false);
                }
            })
        }); 
    });
   
    //Adding CKEDITOR
    CKEDITOR.replace( 'body',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
    });
</script>
<!-- END SINGLE EMAIL-->
