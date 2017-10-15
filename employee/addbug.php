<?php

$con=mysql_connect("localhost","root","");
                if(!$con)
                    {                    die("error in connection".mysql_error());
                
                }
                
                mysql_select_db("dts_db",$con);
                    $bugname[0]=$_POST["bugname"];
                    $bugname[1]=$_POST["severity"];
                    $bugname[2]=$_POST["status"];
                    $bugname[3]=$_POST["bugfield"];
                    $bugname[4]=$_POST["projectid"];
                    if($bugname[2]=="Resolved"){
                    $sql  = "INSERT INTO bugtable VALUES('','".$bugname[4]."','".$bugname[0]."','".$bugname[2]."','".$bugname[1]."','".$bugname[3]."','') ";
                    }
                    else{
                    $sql  = "INSERT INTO bugtable VALUES('','".$bugname[4]."','".$bugname[0]."','".$bugname[2]."','".$bugname[1]."','','".$bugname[3]."') ";   
                    }
                    $result=mysql_query($sql);
                    if(!$result){ echo json_encode("failure");}
                    else{ echo json_encode("success");}
               
  
     
                
 