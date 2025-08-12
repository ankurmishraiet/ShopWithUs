<?php include ( "function.php" ); ?>
<?php 
ob_start();
$con=con();
session_start();
if (!isset($_SESSION['user_id'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_id'];
	//$result = mysql_query("SELECT * FROM Users WHERE userName='$user'");
	// $sql="select * from Users where userName='$user' ";
	 //$result=$con->query($sql);
		//$get_user_email = mysql_fetch_assoc($result);
			//$uname_db = $get_user_email['firstName'];
	//echo '$user';
}
?>		
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <link  href="css/new.css" rel="stylesheet"/>
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
       <a href="about.php" class="link"> About Us &nbsp;</a> 
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

   <div id="products">
    <div class="product">
      <a href="products/beauty.php"><img src="./img/beauty.jpg" width="500px;" height="500px"></a>
    </div>
    <div class="product">
     <a href="products/jeans.php"><img src="./img/jeans.jpg" width="500px;" height="500px"></a>
   </div>
   <div class="product">
    <a href="products/shoes.php"> <img src="./img/shoes.jpg" width="500px;" height="500px"></a>
  </div>
  <div class="product">
    <a href="products/tshirt.php"> <img src="./img/tshirt.jpg" width="500px;" height="500px"></a>
  </div>
  <div class="product">
    <a href="products/watch.php"> <img src="./img/watch.jpg" width="500px;" height="500px"></a>
  </div>
  <footer class="site-footer" style="background-color: lightgrey; padding: 10px 10px 10px 15px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6" id="menu">
          <h3 style="color: yellow; text-shadow: 1px 1px black;">About</h3>
          <p style="text-align: center; font-size: 20px; color: #7d7d7d;font-family: Helvetica, Sans-Serif; " >ShopWithUs is a shopping website where you can shop products from various categories like: </p>
          <ul id ="menu" style="list-style:none; font-size: 20px; color: #7d7d7d;text-align: center;font-family: Helvetica, Sans-Serif; ">
            <li>Beauty Products</li>
            <li>Jeans</li>
            <li>Tshirts</li>
            <li>Shoes</li>
            <li>Watches</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h3 style="color: yellow; text-shadow: 1px 1px black;">Contact Us:- </h3>
          <ul style="margin-left:50px; font-size: 20px; color: #7d7d7d;font-family: Helvetica, Sans-Serif; ">
            <li>Whatsapp: +91 9140552958</li>
            <li>Email: hackerankit5@gmail.com</li>
          </ul>
        </div>

        
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text" style="color: #7d7d7d;">Copyright &copy; 2019 All Rights Reserved by ShopWithUs

          </p>
        </div>


      </div>
    </div>
  </footer>
</div>  
</div>

</body>
</html>
