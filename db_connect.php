<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="shailendrasingh";
 try{
     $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     date_default_timezone_set('Asia/Kolkata');
 }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }
?>