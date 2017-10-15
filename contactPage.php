


<?php
include ("login.php");


 if(isset($_POST['username'])){
               $con=mysql_connect("localhost","root","");
                if(!$con)
                    {                    die("error in connection".mysql_error());
                
                }
                
                mysql_select_db("dts_db",$con);
                $username=$_POST['username'];
                $password=$_POST['password'];
                $query="SELECT * FROM users WHERE username='".$username."'AND password='".$password."'";
                $result=mysql_query($query);
                $row=mysql_fetch_array($result);
                if(!$row){
                    echo"<script>document.getElementById('error').innerHTML='Invalid username and password';</script>";
                }
                else{
                    $_SESSION["login_user"]=$username;
                    if($row["usertype"]=="admin"){
                        setcookie("admin","/");
                    header("Location:admin/adminHomePage.php");}
                    else {header("Location:employee/empHomePage.php");}

                }
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
<body>

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
          <li><a onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
  

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

   <script src="contact.js"></script>
    </div>
      
   <!--------------------Center Body END------------------->
   

  </div>
</div>
    <div class="w3-container ">
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
           
                <form class="login " action="" method="post">
                    <p class="title">Log in <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-medium w3-hover-red w3-display-topright" title="Close Modal">&times;</span></p>
                    <input type="text" placeholder="Username" id="login_username" name="username"/>
                    <i class="fa fa-user"></i>
                    <input type="password" placeholder="Password" id="password" name="password"/>
                    <i class="fa fa-key"></i>
                    <a href="#">Forgot your password?</a>
                    <button>
                      <i class="spinner"></i>
                      <span class="state">Log in</span>
                    </button>
                     
              </form>
            </div>
        </div>     
    </div>
   
    
    <footer class="container-fluid text-center" style="position: relative">
    <p>&copy;This website belongs to <a href="http://lords.ac.in" target="_blank" style="color: white">Lords Institute of Engineering and Technology.</a></p>
    <p>Designed by <a href="mailto:syedparvez72@hotmail.com" style="color: white">Syed Parvez.</a></p>
</footer>
    
</body>

</html>
