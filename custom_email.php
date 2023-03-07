<?php
   include "include/header.php";
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


<div class="text-center">
    <!-- START OF ROW TABLE--> 
        <div class="row">
            <div class="col">
                   <div class="form container ">
                       <div class="">
                       <!--START OF TABLE  --> 
                          <!-- <table class="table table-bordered table-striped" id="employee_data">
                              <tr>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Select</th>
                                  <th>Action</th>
                              </tr>
                               <?php 
                                //    $count = 0;
                                //    foreach($result as $row){
                                //        $count = $count + 1;
                                //        echo '
                                //           <tr>
                                //              <td>'.$row["customer_name"].'</td>
                                //              <td>'.$row["customer_email"].'</td>
                                //              <td>
                                //                 <input type="checkbox" 
                                //                        class="single_select" 
                                //                        name="single_select"
                                //                        data-email="'.$row["customer_email"].'"
                                //                        data-name="'.$row["customer_name"].'"/>
                                //              </td>
                                //              <td>
                                //                 <button type="button" 
                                //                         name="email_button" 
                                //                         class="btn btn-info btn-xs email_button"
                                //                         id="'.$count.'"
                                //                         data-email="'.$row["customer_email"].'"
                                //                         data-name="'.$row["customer_name"].'"
                                //                         data-action="single">Send Single
                                //                 </button> 
                                //              </td>
                                //           </tr>
                                //        ';
                                //    }
                               ?>
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


                   <!--START OF TABLE-->
                      <table class="table table-bordered table-striped table-hovered table-light" id="employee_data">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Email Status</th>
                                    <th>Select email</th>
                        
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
                                                    id="<?php $count?>"
                                                    data-email="<?= $row["customer_email"]?>"
                                                    data-name="<?= $row["customer_name"] ?>"
                                                   data-action="single" disabled>Status
                                           </button> 
                                     </td>
                                        </div> 

                                     <td>  
                                          <input type="checkbox" 
                                                 class="single_select" 
                                                 name="single_select"
                                                 id="single_select"
                                                 data-email="<?=$row["customer_email"]?>"
                                                 data-name="<?=$row["customer_name"]?>"
                                         />             
                                    </td>
                                </tr>
                                  <?php
                                      }
                                  ?>
                              </tbody>                
                         </table>
                    <!-- END OF TABLE-->
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-success"> Add all Emails</button>
                     </div>
                </div>
            </div>
        </div>

            <div class="col">
                    <div class="">
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
                                       <textarea class="form-control" id="recipient" name="recipient" rows="3" required>
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
                                      <button class="btn btn-success me-2" name="send" type="submit">Send Email</button>
                                      <button class="btn btn-danger" name="reset" type="reset">Reset Form</button>
                                  </div>
                           </form>
                           <!--End Form Action with POST Method-->
                 </div>
            </div>
        </div>
    </div>

<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<!-- START SINGLE EMAIL-->
<!--Using JQUERY-->
<script>
    $(document).ready(function(){
        // DATA TALBLE ADDED BY CRIS
        $('#employee_data').DataTable();

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

            // CHECKBOX TO TEXT AREA 
            $("#single_select").change(function(){
            var select = $(this).is(":checked") ? 1:0;
            var email = $(this).closest('tr').find('.get').text();
            if(select == true)
            {
                document.getElementById("recipient").value = email;
                if(select == 10)
                {
                
                }
            }
            else
            {
                document.getElementById("recipient").value = null;
            }
             });

             //Adding CKEDITOR
             CKEDITOR.replace( 'body',{
                removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
            });
    });
</script>
<!-- END SINGLE EMAIL-->

<?php
   include "include/footer.php";
?>