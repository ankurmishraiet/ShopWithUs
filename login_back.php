<?php
session_start();
require('function.php');
$con=con();
$login_id=$_POST['userName'];
$pass=$_POST['password'];
$ty=$_POST['loginType'];
//echo "$login_id $pass $ty";
if($ty=="admin")
  {
    $sql="select * from Admin where userName='$login_id' and password='$pass'";
    $result=$con->query($sql);
    if($row=$result->fetch_array())
     {
       $_SESSION['user_id'] = $login_id;   
       header("location: admin_home.php");
     }
     else
      {
         echo "<script>alert('invalid user id and password');window.location='login.php';</script>";
         die();
      }
  }
  else
   {
    $sql="select * from Users where userName='$login_id' and password='$pass'";
    $result=$con->query($sql);
    if($row=$result->fetch_array())
     {
       $_SESSION['user_id'] = $login_id;   
       header("location: profile.php");
     }
     else
      {
         echo "<script>alert('invalid user id and password');window.location='login.php';</script>";
         die();
      }
   }
?>
