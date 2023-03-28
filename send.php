<!--SEND MULTIPLE EMAIL-->
<?php



//Connection
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"email_db");
$uniq = uniqid();

//Post to database
$sender_name = $_POST['sender_name'];
$sender_email = $_POST['sender_email'];
$subject = $_POST['subject'];
$email_address = $_POST['emails'];
$email_body = $_POST['message'];



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["send"])){     
        $sender_name = $_POST["sender_name"];             //For Sender Name
        $sender = $_POST["sender_email"];                 //For Sender
        $subject = $_POST["subject"];                     //For Subject
        $attachments = $_FILES["attachments"]["name"];    //Setting up a Files
        $recipients = explode(",", $_POST["emails"]);   //For Recipient
        $body = $_POST["message"];                            //For Body

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                               //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                          //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                      //Enable SMTP authentication
            $mail->Username   = 'francisjulescelesteespartero@gmail.com';  //SMTP username
            $mail->Password   = 'fromytkvwoibxmli';                        //SMTP password
            $mail->SMTPSecure = 'tls';                                     //Enable implicit TLS encryption
            $mail->Port       = 587;                                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($sender, $sender_name);
            foreach($recipients as $recipient){
                $mail->addAddress($recipient);   
            }        

            //Attachments
           for($x=0; $x<count($attachments); $x++){   //Add For Loops      
            //    print_r($_FILES["attachments"]["tmp_name"][$x] . "</br>");
            //    print_r($_FILES["attachments"]["name"][$x] . "</br>");
               $file_tmp = $_FILES["attachments"]["tmp_name"][$x];
               $file_name = $_FILES["attachments"]["name"][$x];
               //Add move_uploaded_file function (name of attachment files, name of folder)
               move_uploaded_file($file_tmp, "attachments/" . $file_name);  
               $mail->addAttachment("attachments/" . $file_name);         //Add attachments
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            // $mail->Body = "<a href='http://localhost/HREmailSupport/mail_status.php?token=$uniq'>Please click to confirm if you receive the email!</a>";
            // $mail->AltBody = "<img src='http://localhost/HREmailSupport/email_status.php?token=$uniq'>This is GECO Asia Philippines!";
   
           //Message sent statement
           if(!$mail->send()){
              echo "Sorry! Message has been not send some technical issues was found";
              //FAIL STATUS
              mysqli_query($conn,"INSERT INTO email_track (sender_name, sender_email, subject, message, emails, status, unique_id) values ('$sender_name', '$sender_email', '$subject', '$email_body', '$email_address','fail','$uniq')");
           } else {
            //  echo "Success! Message has been sent to email address!";
              //SEND STATUS
              mysqli_query($conn,"INSERT INTO email_track (sender_name, sender_email, subject, message, emails, status, unique_id) values ('$sender_name', '$sender_email', '$subject', '$email_body', '$email_address','send','$uniq')");
            ?>
                        <script> alert('Email Sent');window.location='track_email.php';</script>

            <?php
              
            }
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }

          
}
?>