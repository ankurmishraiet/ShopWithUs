<?php include ( "connect.php" ); ?>
<?php
require('function.php');
ob_start();
 session_start();
 
 $fname = validate($_POST["firstName"]);
 $lname = validate($_POST["lastName"]);
 $userName = validate($_POST["userName"]);
 $email_id = validate($_POST["emailId"]);
 $mno = validate($_POST["mobileNo"]);
 $add1 = validate($_POST["address"]);
 $gender = validate($_POST["gender"]);
 $pass = validate($_POST["password"]);
 $con=con();
 $user = $_SESSION['user_id'];
  if($user==$userName){
    mysql_query("DELETE from Users WHERE userName='$userName'");
    mysql_query("insert into Users values('$userName','$fname','$lname',$mno,'$email_id','$add1','$gender','$pass')");
    echo "<script>alert('Congratulations !!! You have Changed your details.');window.location='login.php';</script>";
  }
  $query="select *from Users s where s.userName='$userName'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('User with this user id is already exits Chose different Id.');window.location='editProfile.php';</script>";
        die();
   }
   else
    {
     $ins_query="insert into Users values('$userName','$fname','$lname',$mno,'$email_id','$add1','$gender','$pass')";
     $ins_result=$con->query($ins_query);
     mysql_query("DELETE FROM Users WHERE userName='$user'");
     echo "<script>alert('Congratulations !!! You have Changed your details.');window.location='login.php';</script>";
	 die(); 
    }
?>
