<?php
session_start();
if(!isset($_SESSION["login_user"])){
    header("Location:http://localhost/DTS/index.php");

}
$con=mysql_connect("localhost","root","");
                if(!$con){die("error in connection".mysql_error());}
                mysql_select_db("dts_db",$con);
                $username=$_SESSION["login_user"];
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
  <script src="projectpage.js"></script>
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
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="bugsPage.php">Manage Bugs</a>
              <a class="w3-button w3-block w3-left-align w3-text-white w3-black" href="#">Manage Projects</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="#">Generate Report</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="#">Apply Leave</a>
              <a class="w3-button w3-block w3-left-align w3-hover-text-white" href="changePasswordPage.php">Change Password</a>
            </div>

      </div>
      <style>
          #projectButton,#projectButton1{
                    background-color: rgba(31, 30, 30, 0.83);
                    /* color: #1f0607; */
                    border-radius: 4px;
                    padding: 2px;
                    margin-bottom: 6px;
                    font-family: -webkit-pictograph;
                    font-size: 24px;
                    /* font-style: normal; */
                    text-shadow: 1px 1px 1px black;
                    color: rgb(191, 191, 191);
          }
          #right-arrow,#right-arrow1{
              margin-right: 20px;
              margin-left: 5px;
              margin-top: 2px;
             font-size: 20px;
          }
          div #projectButton:hover{
              color: ghostwhite;
          }
                    div #projectButton1:hover{
              color: ghostwhite;
          }
            #employee,#updateStatus,#updateStatus1{
              width: 96%;
    font-size: 22px;
    border-radius: 4px;
    border-bottom-width: medium;
    /* font-family: tahoma; */
    font-family: -webkit-pictograph;
    background-color: #fdf7f0;
    padding: 5px;
    padding-bottom: 8px;
      }
      td {
    border-bottom-width: initial;
    border-radius: 5px;
    /* background-color: azure; */
    background-color: #efca7d;
    color: black;
    font-family: TAHOMA;
    font-style: inherit;
    font-size: 22px;
      }
      th {
    font-family: tahoma;
}
      </style>
      
      <div class="col-sm-8 text-left" style="margin-top: 2px;min-width: 98vh;min-height: 100vh;background-color: white;"> 
          <h1>Manage Projects</h1>
          <hr>
          <div class="w3-container">
              <button id="projectButton"onclick="mFunction('projectSelection','right-arrow','#projectButton')" class=" w3-block w3-left-align" ><span id="right-arrow" class="glyphicon glyphicon-triangle-right"></span> Projects Assigned To You.</button>
          </div>
          <div id="projectSelection" class="w3-hide w3-container">
                <div class="page-header">
                 <h2><select id="employee" style="width: 100%;font-size: 20px">
                    <option value="" selected="selected" disabled selected value >...Select Project Name...</option>
                        <?php
                        $sql = "SELECT projectstable.id,projectstable.projectName FROM `projectstable` LEFT JOIN projectassignto ON projectstable.id=projectassignto.projectId  WHERE projectassignto.employee='".$username."'";
                        $resultset = mysql_query($sql) or die("database error:". mysql_error($con));
                        while( $rows = mysql_fetch_assoc($resultset) ) { 
                        ?>
                        <option value="<?php echo $rows["id"]; ?>"><?php echo $rows["projectName"]; ?></option>
                        <?php }	?>
                 </select></h2>
                </div>
              <div class="w3-container" id="error-project-retrive">
                  <table class="w3-table" style="border-collapse: separate;border-spacing: 10px 25px;display: none" id="tabledata">
                      <tr>
                        <th>Project Id</th>
                        <th>Project Name</th>
                        <th>Project Status</th>
                      </tr>
                      <tr id="first-row">

                      </tr>

                      <tr>
                        <th>Total Bugs</th>
                        <th>Resolved Bugs</th>
                        <th>UnResolved Bugs</th>
                      </tr>
                      <tr id="second-row">

                      </tr>
                      <tr>
                        <th>Project Assign Date</th>
                        <th>Project Submit Date</th>
                        <th></th>
                      </tr>
                      <tr id="third-row">

                      </tr>
                    </table>
                  </div>
          </div>
          <div class="w3-container">
              <button id="projectButton1"onclick="mFunction('projectupdate','right-arrow1','#projectButton1')" class=" w3-block w3-left-align" ><span id="right-arrow1" class="glyphicon glyphicon-triangle-right"></span> Update Project Status.</button>
          </div>
          <div id="projectupdate" class="w3-hide w3-container">
              <form action="" method="post" id="updateFormChange">
              <div class="col-sm-6 sidenav">
               <div class="page-header">
                 <h2><select id="updateStatus" style="width: 100%;font-size: 20px">
                    <option value="" selected="selected" disabled selected value >...Select Project Name...</option>
                        <?php
                        $sql = "SELECT projectstable.id,projectstable.projectName FROM `projectstable` LEFT JOIN projectassignto ON projectstable.id=projectassignto.projectId  WHERE projectassignto.employee='".$username."'";
                        $resultset = mysql_query($sql) or die("database error:". mysql_error($con));
                        while( $rows = mysql_fetch_assoc($resultset) ) { 
                        ?>
                        <option value="<?php echo $rows["id"]; ?>"><?php echo $rows["projectName"]; ?></option>
                        <?php }	?>
                 </select></h2>
              </div>
              </div>
              <div class="col-sm-6 sidenav">
              <div class="page-header">
                 <h2><select id="updateStatus1" style="width: 100%;font-size: 20px">
                    <option value="" selected="selected" disabled selected value >...Select Status...</option>
                        
                        <option value="Complete">Complete</option>
                        <option value="Incomplete">Incomplete</option>
                        
                 </select></h2>
              </div>
             </div>
             </form>
              
          </div>
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
