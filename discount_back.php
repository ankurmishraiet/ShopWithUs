<?php
 session_start();
 require('function.php');
 $type = validate($_POST["type"]);
 $dis = validate($_POST["discount"]);
 $con=con();
  
  $query="UPDATE Products SET discount='$dis' where type='$type'";
  $result=$con->query($query);
 
     echo "<script>alert('Discount has been added');window.location='admin_home.php';</script>";
?>
