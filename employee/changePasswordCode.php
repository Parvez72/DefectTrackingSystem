<?php
session_start();
$username=$_SESSION['login_user'];
               $con=mysql_connect("localhost","root","");
                if(!$con)
                    {                    die("error in connection".mysql_error());
                
                }
                
                mysql_select_db("dts_db",$con);
                
                $password=$_REQUEST['password'];
                $newpassword=$_REQUEST['newpassword'];
                $query="SELECT * FROM users WHERE username='".$username."'AND password='".$password."'";
                $result=mysql_query($query);
                $row=mysql_fetch_array($result);
                if(!$row){
                    $suc="fail";
                }
                else{
                    $query1="UPDATE users SET  password='".$newpassword."'WHERE username='".$username."'";
                    if(mysql_query($query1)){
                        $suc="true";
                    }
                    else{
                        $suc="suck";
                    }  
                }
                
                echo json_encode($suc);