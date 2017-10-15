<?php
session_start();
if(!isset($_SESSION["login_user"])){
    header("Location:http://localhost/DTS/index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../jquery-3.2.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="sidebarStyle.css">
  <script>
      
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
        }
      
  </script>
</head>
<body style="background-image: url('../admin/adminBackground.jpg');">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:black">
            <span class="glyphicon glyphicon-align-justify" style="color:#555555"></span>                    
      </button>
        <a class="navbar-brand" href="empHomePage.php" id="logo">Bug Tracking System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a href="empHomePage.php" class="unstyled">Home</a></li>
          <li><a href="aboutPage.php" class="ancher">About</a></li>
          
          <li><a href="../contactForAdmin.php" id="ancher">Contact</a></li>
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
          <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
      <div class="col-sm-2 sidenav" style="background-color: white;margin: 2px 8px 0px 5px;width: 15%;text-align: left;height: initial;padding: 0px">
          <div class="w3-container w3-black" style="text-align:center;width: 100%;padding: 0px; margin-bottom: 1px">
            <h4 >Menu</h4>
          </div>
          <button id="menuButton" onclick="myFunction('Demo1')" class="w3-button w3-block w3-center-align w3-large" state="back"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
           
          <div id="Demo1" class="w3-hide ">
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="bugsPage.php" class="w3-active">Manage Bugs</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="projectPage.php">Manage Projects</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="#">Generate Report</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="#">Apply Leave</a>
              <a class="w3-button w3-block w3-black w3-left-align w3-text-white" href="#">Change Password</a>
            </div>

      </div>
      <style>
          .changepassword input {
            display: block;
            padding: 12px 10px;
            width: 100%;
            border: 1px solid #ddd;
            transition: border-width 0.2s ease;
            border-radius: 2px;
            color: #656060;
          }
            .changepassword input:focus {
            outline: none;
            color: #444;
            border-color: #2196F3;
            border-left-width: 35px;
                        }
           #SR-btn{
            padding: 10px 10px;
            background: #2196F3;
            color: #fff;
            border: 0px solid rgba(0, 0, 0, 0.1);
            border-radius: 0 0 2px 2px;
            border-bottom-width: 3px;
          }
                       
      </style>
   
      
      <div class="col-sm-8 text-left" style="margin-top: 2px;min-width: 98vh;min-height: 100vh;;background-color: white;"> 
          <h1>Change Password</h1>
          <hr>
          <div class='container-fluid'>
              <div id="passwordcompletemsg" style='display: none;text-align:center;margin-top: 90px'>
                    <p><span class='glyphicon glyphicon-ok' style='font-size:30px;color: green'></span></p>
                    <p style='font-size:20px;color: green'>Your password has been changed Successfully</p>
                </div>
              <form class="changepassword" style="">
                  
                  <ul>
                      <label for="password">Password<span style="color: red">*</span></label><span><p id="wrongpassword" style="display: none;color:red;margin-bottom: -16px;">Please type correct password.</p></span><br>
                      <input type="password" id="password" name="password" required><br>
                  <label for="newpassword">New Password<span style="color: red">*</span></label><span><p class="errorpassword" style="display: none;color:red;margin-bottom: -16px;">Password doesn't match.</p></span><br>
                  <input type="password" id="newpassword" name="newpassword" required><br>
                  <label for="confirmpassword">Confirm Password<span style="color: red">*</span></label><span><p class="errorpassword" style="display: none;color:red;margin-bottom: -16px;">Password doesn't match.</p></span><br>
                  <input type="password" id="confirmpassword" name="confirmpassword" required><br>
                  <div class="input-group add-on" style="display:flex">
                  <input type="submit" id="SR-btn">&nbsp;<input type="reset" id="SR-btn">
                  </div>
                  </ul>
              </form>
          </div>
      </div>
      <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $(".changepassword").submit(function(event){
                
                var data=$(this).serialize();
                var newpassword=$("#newpassword").val();
                var confirmpassword=$("#confirmpassword").val();
                if(newpassword==confirmpassword){
                $(".errorpassword").css('display','none');
                
                 $.post( "changePasswordCode.php", data)
                            .done(function( dataOut )
                            {
                                //dataOut holds the response from mail.php. The response would be any html mail.php outputs. I typically echo out json encoded arrays as responses that you can parse here in the jQuery.
                                var result = JSON.parse(dataOut );
                                
                                if(result=="true"){
                                   $(".changepassword").replaceWith($("#passwordcompletemsg"));
                                   $("#passwordcompletemsg").css('display','block');

                                }
                                else if(result=="fail"){
                                    $("#wrongpassword").css('display','block');
                                }
                                else{
                                    var content="<div style='margin-top:90px;text-align:center'><p><span style='color:red;font-size:20px' class='glyphicon glyphicon-remove'></span></p><h3 style='color:red'>Something went wrong please try again.</h3></div>"
                                    $(".changepassword").html(content);
                                }

                       });
           }
           else{
                $(".errorpassword").css('display','block');
           }
           return false;
            });
            
         });
      </script>
      <div class="col-sm-2 sidenav" style="opacity: 0">
      <div class="well">
          <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>



</body>
</html>
