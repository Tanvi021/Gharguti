<?php 

   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "food";

   //Creating Database connection
   $con = mysqli_connect($host, $username, $password, $database);

   //Checking Database connection
   if(!$con)
   {
      die("Connection Failed : ".mysqli_connect_error());
   }
   

?>