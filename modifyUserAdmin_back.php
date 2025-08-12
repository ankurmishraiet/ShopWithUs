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
    mysql_query("DELETE from Users WHERE userName='$userName'");
    mysql_query("insert into Users values('$userName','$fname','$lname',$mno,'$email_id','$add1','$gender','$pass')");
    echo "<script>alert('Congratulations !!! You have Changed user details.');window.location='admin_home.php';</script>";
 
?>
