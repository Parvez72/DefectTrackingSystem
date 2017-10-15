<?php 
/* @var $name type */
$name = $_POST['username'];
$email = $_POST['email'];
$phoneno=$_POST['phonenumber'];
$message = $_POST['textArea'];
$formcontent = "From : $name \n email : $email \nPhone Number : $phoneno \n Message : $message";
$recipient = 'syedparvez72@hotmail.com';
$subject = 'Message from Website';
$mailheader = "From: $email \r\n";
$captcha = false;

  if(isset($_POST['username']))
  {   
      $message= wordwrap($message);
      if (mail($recipient, $subject, $formcontent, $mailheader)){
      $success="true";
  }
 else {
     $success="false";
  }
echo json_encode($success);
  } 