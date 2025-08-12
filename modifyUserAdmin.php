<?php include ( "connect.php" ); ?>
<?php
require('function.php');
ob_start();
session_start();

if (!isset($_SESSION['user_id'])) {
  $user1 = "";
  echo "<script>alert('Please Login First !!');window.location='login.php';</script>";
  //header("location: login.php?ono=".$poid."");
}
else {
  $user1 = $_SESSION['user_id'];
}

$con=con();
$user=$_POST['userName'];
$query="select *from Users s where s.userName='$user'";
$result=$con->query($query);
if($result->num_rows==0){
  echo "<script>alert('There is no user of this name ');window.location='admin_home.php';</script>";
}

$result = mysql_query("SELECT * FROM Users WHERE userName='$user'");
$get_user = mysql_fetch_assoc($result);
$firstName = $get_user['firstName'];
$lastName = $get_user['lastName'];
$mobileNo = $get_user['mobileNo'];
$emailId = $get_user['emailId'];
$gender = $get_user['gender'];
$password = $get_user['password'];
$address = $get_user['address'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Modify User Page</title>
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
        <a href="admin_home.php"><?php echo "ShopWithUs" ;?></a>
      </div>
      <div id="lin">
       <!-- <a href="admin_home.php" class="link" > Home &nbsp; &nbsp;</a>  -->
       <!-- <a href="products/products.php" class="link"> Products  &nbsp; &nbsp;</a>  -->
       <?php 
       if ($user1!="") {
         echo '<a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="admin_home.php?uid='.$user1.'">' .$user1.'&nbsp; &nbsp;</a>';
       }
       else {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 170px;color: yellow;" href="login.php">Login &nbsp; &nbsp;</a>';
       }
       ?>

       <?php 
       if ($user!="") {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 55px; color: #fff;" href="logout.php">Logout &nbsp; &nbsp; </a>';
       }
       else {
         echo '<a style="text-decoration: none; position:absolute; right:0; padding-right: 55px;color: #fff;" href="register.php">Register &nbsp; &nbsp;</a>';
       }
       ?>

       <!-- <a href="about.php" class="link"> About Us </a>  -->
     </div>
   </div>
   <div id="marquee">
     <marquee> Welcome to world's most adorable shopping site </marquee>
   </div>

   <div id="form1">
    <form id="form2" name="RegForm" action="modifyUserAdmin_back.php" onsubmit="return validate()" method="post">
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
  </form>
</div>

</div>
</body>
</html>
