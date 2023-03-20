<?php
//send_mail.php
if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$mail = new PHPMailer;
		$mail->IsSMTP();			//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';	//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = 587;			//Sets the default SMTP server port
		$mail->SMTPAuth = true;		//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'esparterofrancisjules@gmail.com';		//Sets SMTP username
		$mail->Password = 'obbykfxrcxcebhvy';		//Sets SMTP password
		$mail->SMTPSecure = 'tls';				//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'esparterofrancisjules@gmail.com';	 //Sets the From email address for the message
		$mail->FromName = 'francejules';			        //Sets the From name of the message
		$mail->AddAddress($row["email"], $row["name"]);	        //Adds a "To" address
		$mail->WordWrap = 50;	//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'Sending Email'; //Sets the Subject of the message
		
        //An HTML or plain text message body
		$mail->Body = '
		<p>Hello, Welcome to GECO ASIA!!!</p>
		';

		$mail->AltBody = '';
		$result = $mail->Send();	//Send an Email. Return true on success or false on error
            
		//Adding if statement and using is_array function for trying to access the bool array.
        if(is_array($result)){
		    if($result["code"] == '400')
		    {
			  $output .= html_entity_decode($result['full_error']);
		    }
	    }


	}
       if($output == '')
       {
           echo 'ok';
       }
       else
       {
           echo $output;
       }

}

?>