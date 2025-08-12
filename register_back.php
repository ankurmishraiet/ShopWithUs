<?php
 session_start();
 require('function.php');
 $fname = validate($_POST["firstName"]);
 $lname = validate($_POST["lastName"]);
 $user_id = validate($_POST["userName"]);
 $email_id = validate($_POST["emailId"]);
 $mno = validate($_POST["mobileNo"]);
 $add1 = validate($_POST["address"]);
 $gender = validate($_POST["gender"]);
 $pass = validate($_POST["password"]);
 $con=con();
  
  $query="select *from Users s where s.userName='$user_id'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('User with this user id is exist.');window.location='register.php';</script>";
        die();
   }
   else
    {
     $ins_query="insert into Users values('$user_id','$fname','$lname',$mno,'$email_id','$add1','$gender','$pass')";
     $ins_result=$con->query($ins_query);

      $headers =  'MIME-Version: 1.0' . "\r\n"; 
      $headers .= 'From: ShopWithUs <info@address.com>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
      
      if(mail($email_id, "ShopWithUs Registeration", "Thank you ".$fname." for successfully registering at ShopWithUs. We hope you serve you well.",$headers))
      //header("location:./profile.php");

     echo "<script>alert('Congratulations !!! Now you are a valid customer.');window.location='login.php';</script>";
   else
    echo "<script>alert('Failed!');</script>";
	 // die(); 
    }
?>
