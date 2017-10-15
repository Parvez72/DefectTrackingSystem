<?php


               $con=mysql_connect("localhost","root","");
                if(!$con)
                    {                    die("error in connection".mysql_error());
                
                }
                
                mysql_select_db("dts_db",$con);
                $id=$_REQUEST['option'];
                $query="SELECT * FROM projectstable WHERE projectstable.id='".$id."'";
                $result=mysql_query($query);
                $row=mysql_fetch_array($result);if(!$row){echo json_encode("fail");}
                else { echo json_encode($row);}
               
