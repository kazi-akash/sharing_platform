<?php
 $hostname = "localhost";
 $username = "root";
 $pass = "";
 $db = "cmstest";

 $conn = new mysqli($hostname, $username, $pass, $db);

 if($conn->connect_errno){
  die("Database connetct error!".$conn->connect_errno);
 }

?>