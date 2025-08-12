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
}
?>		

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Remove User Page</title>
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
        <!-- <a href="index.php" class="link" > Home &nbsp; &nbsp;</a>  -->
        <!-- <a href="products/products.php" class="link"> Products  &nbsp; &nbsp;</a>  -->
        <!-- <a href="about.php" class="link"> About Us </a>  -->
        <?php 
        if ($user!="") {
          echo '<a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="admin_home.php?uid='.$user.'">' .$user.'&nbsp; &nbsp;</a>';
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
     <marquee> Welcome to world's most famous shopping site. </marquee>
   </div>

   <div id="form1">
    <form id="form2" action="removeUser_back.php" method="post">
      Enter user name to be deleted : <input type="text" name="userName" placeholder="User Name"> <br/><br/>
      <center><input type="submit" value="submit"></center>
    </form>
  </div>

</div>
</body>
</html>
