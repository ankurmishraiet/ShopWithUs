<?php include ( "connect.php" ); ?>
<?php 
ob_start();
session_start();

if (!isset($_SESSION['user_id'])) {
	$user = "";
	echo "<script>alert('Please Login First !!');window.location='login.php';</script>";
	//header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM Users WHERE userName='$user'");
	$get_user = mysql_fetch_assoc($result);
	$firstName = $get_user['firstName'];
	$lastName = $get_user['lastName'];
	$mobileNo = $get_user['mobileNo'];
	$emailId = $get_user['emailId'];
	$gender = $get_user['gender'];
	$password = $get_user['password'];
	$address = $get_user['address'];
}
?>		

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Page</title>
  <script type="text/javascript" src="js/var.js"></script>
  <link  href="css/new.css" rel="stylesheet"/>
  <style>
  #form1{
    position:absolute;
       border-left: 6px solid yellow;
       background-color: deepskyblue;
       height:auto;
       width:100%;
       font-size:30px;
       top:30%;
       margin:auto;
       margin-left:10%;
       width:80%;
       color:white;
       word-spacing:5px;
       padding:25px;
       opacity: 1;
 }
 #form2{
  text-align:center;
  margin-bottom: 10px;
}
</style>
</head>
<body>
  <div id="full">
    <div id="header">
      <div id="logo">
        <a href="index.php"><?php echo "ShopWithUs" ;?></a>
      </div>
       <div id="lin">
       <a href="index.php" class="link" > Home &nbsp; &nbsp;</a> 
       <a href="products/products.php" class="link"> Products  &nbsp; &nbsp;</a> 
       <a href="about.php" class="link"> About Us  &nbsp;</a> 
				<a href="contact.php" class="link"> Contact Us </a> 
       <?php 
       if ($user!="") {
         echo '<a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="profile.php?uid='.$user.'">' .$user.'&nbsp; &nbsp;</a>';
       }
       else {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 170px;color: yellow;" href="login.php">Login &nbsp; &nbsp;</a>';
       }
       ?>

       <?php 
       if ($user!="") {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 55px; color: #fff;" href="logout.php">Logout  &nbsp; &nbsp; </a>';
       }
       else {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 55px;color: #fff;" href="register.php">Register &nbsp; &nbsp;</a>';
       }
       ?>

     </div>
   </div>
   <div id="marquee">
     <marquee> Welcome to world's most adorable shopping site </marquee>
   </div>

   <div id="form1">
    <form id="form2" name="RegForm" action="user_edit_back.php" onsubmit="return validate()" method="post">
      <br/>
      User Name : <input type="text" name="userName" value=" <?php echo "$user"; ?> "><br/><br/>
      First Name : <input type="text" name="firstName" placeholder="First Name" value=" <?php echo "$firstName"; ?> "> <br/><br/>
      Last Name : <input type="text" name="lastName" placeholder="Last Name" value=" <?php echo "$lastName"; ?> "> <br/><br/>
      Mobile No : <input type="text" name="mobileNo" placeholder="Mobile No" value=" <?php echo "$mobileNo"; ?> "> <br/> <br/>
      Email Id : <input type="email" name="emailId" placeholder="Email-id" value=" <?php echo "$emailId"; ?> "> <br/><br/>
      Address : <input type ="text" name="address" placeholder="Enter Address" value=" <?php echo "$address"; ?> "> <br/><br/>
      Select Gender: <select name="gender">
        <option value="male"> Male</option>
        <option value="female"> Female</option>
        <option value="other"> Other</option>
      </select><br/><br/>
      Password : <input type="password" name="password" placeholder="Password"><br/><br/>
      <center><input type="submit" value="submit">&nbsp; &nbsp; <input type="reset" value="reset"></center>
    </form>
  </div>

</div>
</body>
</html>
