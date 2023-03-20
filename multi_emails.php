<?php

  include 'SMTPMailer.php';
  $sender_name = $_POST['sender_name'];
  $sender_email = $_POST['sender_email'];
  $subject = $_POST['subject'];
  $attachments = $_POST['attachments'];
  $email = $_POST['emails'];
  $smtp = new SMTPMailer();
  $mail = $smtp->load();

  foreach (explode(",", $email) as $address){

  }

  ?>