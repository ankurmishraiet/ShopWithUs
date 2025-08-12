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
  <title>Admin Remove Product</title>
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
        <a href="admin_home.php"><?php echo "ShopWithUs" ;?></a>
      </div>
      <div id="lin">
        <!-- <a href="index.php" class="link" > Home &nbsp; &nbsp;</a>  -->
        <!-- <a href="products/products.php" class="link"> Products  &nbsp; &nbsp;</a>  -->
        <!-- <a href="about.php" class="link"> About Us </a>  -->
        <?php 
        if ($user!="") {
          echo '<a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="admin_home .php?uid='.$user.'">' .$user.'&nbsp; &nbsp;</a>';
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
    <h2 style="color:yellow"> Welcome, <?php  echo "$user"; ?> </h2>
    <?php 
    $getResult=mysql_query("SELECT * FROM Products ");
    if (mysql_num_rows($getResult)) {
      while ($row1 = mysql_fetch_assoc($getResult)){
        $poid = $row1['id'];
        $pName = $row1['name'];
        $price = $row1['price'];
        $description = $row1['description'];
        $picture = $row1['photo'];
        $item = $row1['type'];
        echo '
        <div style="float: left;">
        <div>
        <img src="img/'.$item.'/'.$picture.'" style=" margin-top:20px; margin-left: 40px; height: 500px; width: 450px; padding: 2px; border: 2px solid yellow;">
        </div>
        </div>
        <div style="float: right; margin-right:50px; margin-top:20px; height:499px; width: 40%;color: #067165; background-color: #fcff6e ;padding: 10px;">
        <div style="">
        <h3 style="font-size: 25px; font-weight: bold; text-align:center;">'.$pName.'</h3><hr>
        <h3 style="padding: 20px 0 0 0; font-size: 20px;">Price: '.$price.' Rs</h3><hr>
        <h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
        <p>
        '.$description.'
        </p>

        <div>
        <h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to Delete this Product </h3>
        <div id="srcheader">
        <form id="" method="post" action="removeProduct_back.php?poid='.$poid.'">
        <input type="submit" value="Delete Product" class="srcbutton" >
        </form>
        <div class="srcclear"></div>
        </div>
        </div>
        </div>
        <br><br><br>
        </div>

        ';}
      }
      ?> 
    </div>

  </div>
</body>
</html>
