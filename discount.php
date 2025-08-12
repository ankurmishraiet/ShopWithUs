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
  <title>Admin Discount Page</title>
  <link  href="css/new.css" rel="stylesheet"/>
  <script type="text/javascript" src="js/var1.js"></script>
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
     <marquee> Welcome to world's most adorable shopping site </marquee>
   </div>

   <div id="form1">
    <h2 style="color:yellow; text-shadow: 1px 1px black"> Welcome, <?php  echo "$user"; ?> </h2>
    <form form id="form2" name="RegForm" action="discount_back.php" onsubmit="return validate()" method="post">
      Select Category : <select name="type">
       <option>Beauty</option>
       <option>Shoes</option>
       <option>Jeans</option>
       <option>Tshirt</option>
       <option>Watch</option>
     </select>
     Enter Discount : <input type="text" name="discount" placeholder="Enter Discount"> 
     <center><input type="submit" value="submit">&nbsp; &nbsp; <input type="reset" value="reset"></center>
   </form>
 </div>

</div>
</body>
</html>
