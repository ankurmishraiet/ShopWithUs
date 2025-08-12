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
  <title>User Profile</title>
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

  img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
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
     <marquee> Welcome to world's most famous shopping site. </marquee>
   </div>

   <div id="form1">
    <h2 style="color:yellow; text-shadow: 1px 1px black"> Welcome, <?php  echo "$user"; ?> </h2>
    <ul style="float: left;list-style: none">
      <li style="float: left; padding: 0px 25px 25px 25px;">
       <div class="home-prodlist-img"><a href="showOrders.php">
        <img src="../E_Commerce/img/your_orders.png" class="home-prodlist-imgi">
      </a>
      <div style="text-align: center; padding: 0 0 6px 0; color:black;"> Your Orders </div>
    </div>

  </li>
</ul>
<ul style="float: left;list-style: none">
  <li style="float: left; padding: 0px 25px 25px 25px;">
   <div class="home-prodlist-img"><a href="cart.php">
    <img src="../E_Commerce/img/cart_icon.jpg" class="home-prodlist-imgi">
  </a>
  <div style="text-align: center; padding: 0 0 6px 0; color:black;"> Your Cart </div>
</div>

</li>
</ul>
<ul style="float: left;list-style: none">
  <li style="float: left; padding: 0px 25px 25px 25px;">
   <div class="home-prodlist-img"><a href="editProfile.php">
    <img src="../E_Commerce/img/edit_profile.jpg" class="home-prodlist-imgi" style="background-color: white;">
  </a>
  <div style="text-align: center; padding: 0 0 6px 0; color:black;"> Edit Profile </div>
</div>

</li>
</ul>
</div>

</div>
</body>
</html>
