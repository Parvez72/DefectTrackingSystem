<?php

$con=mysql_connect("localhost","root","");
                if(!$con)
                    {                    die("error in connection".mysql_error());
                
                }
                
                mysql_select_db("dts_db",$con);
                $id=$_POST['opt'];
               
                $status=$_POST['sta'];
               
                $query="UPDATE projectstable SET projectStatus='".$status."'WHERE id='".$id."'";
                $result=mysql_query($query);if(!$result){ echo json_encode("false");  }
 else {
               
   echo json_encode("true");
     
                
 }   
 