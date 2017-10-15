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
  <script src="sidebarScript.js"></script>
</head>
<body style="background-image: url('../admin/adminBackground.jpg');">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:black">
            <span class="glyphicon glyphicon-align-justify" style="color:#555555"></span>                    
      </button>
      <a class="navbar-brand" href="#" id="logo">Bug Tracking System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="active"><a href="#" class="unstyled">Home</a></li>
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
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="bugsPage.php">Manage Bugs</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="projectPage.php">Manage Projects</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="#">Generate Report</a>
               <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="applyLeavePage.php">Apply Leave</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="changePasswordPage.php">Change Password</a>
            </div>

      </div>
      
      
      <div class="col-sm-8 text-left" style="margin-top: 2px;min-width: 98vh;min-height: 100vh;background-color: white;"> 
        <h1>Welcome  <?php echo'<span style="font-family: serif;font-style: initial;color: #711b1b;">'.$_SESSION["login_user"].'</span>';?> </h1>
      <p>You are logged in as Employee.......</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>
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
