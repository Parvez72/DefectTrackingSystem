<?php
session_start();
if(!isset($_SESSION["login_user"])){
    header("Location:http://localhost/DTS/index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bug Tracking System-Contact us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery-3.2.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="w3.css">

</head>
<body style="background-image: url('admin/adminBackground.jpg');">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:black">
            <span class="glyphicon glyphicon-align-justify" style="color:#555555"></span>                    
      </button>
        <a class="navbar-brand" href="index.php" id="logo">Bug Tracking System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
        <li><a href="aboutPage.php">About</a></li>
        
        <li class="active"><a href="contactPage.php">Contact</a></li>
        <li><form class="navbar-form" role="search">
    <div class="input-group add-on">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
      <input class="form-control" placeholder="Search" name="srch-term" id="searchBar" type="text">
      
    </div>
  </form>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
   
      <!--------------------Center Body Start------------------->
      
      <div class="col-sm-12 text-left" id="wrapper1"> 
      
          <form class="contact" action="mail.php" method="post">
                <p class="title">Contact Us</p>
                <input type="text" placeholder="Full Name*" id="username" name="username" autofocus required/>
                <i class="fa fa-user"></i>
                <input type="email" placeholder="Email*" id="email" name="email" required/>
                <i class="fa fa-envelope-o"></i>
                <input type="text" placeholder="Phone Number*" id="phonenumber" name="phonenumber" required/>
                <i class="fa fa-mobile-phone" style="font-size:24px"></i>
                <textarea id="textArea" name="textArea"placeholder="Your Comment....." rows="5" cols="25"></textarea>

                <button>
                  <i class="spinner"></i>
                  <span class="state">Submit</span>
                </button>
          </form>
  


   <script src="contact.js"></script>
    </div>
      
   <!--------------------Center Body END------------------->
   

  </div>
   

    
</body>

</html>
