<?php
    require('function.php');
    require('connect.php');
    $user=$_POST['userName'];
    ob_start();
session_start();
    $con=con();
    $query="select *from Users s where s.userName='$user'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     mysql_query("DELETE FROM Users where userName='$user'");
      echo "<script>alert('Congratulations !!! User has been deleted');window.location='admin_home.php';</script>";
   }
   else
    {
     echo "<script>alert('There is no user of this name ');window.location='admin_home.php';</script>";
    }
?>
