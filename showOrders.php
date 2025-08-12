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
  <title>Show The Orders Of User</title>
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
    <h2 style="color:yellow; text-shadow: 1px 1px black;"> Your Order Details as follows : </h2>
    <?php 

    $getposts = mysql_query("SELECT * FROM Orders WHERE userName ='$user'") or die(mysql_error()); 
    if (mysql_num_rows($getposts)) {
      while ($row = mysql_fetch_assoc($getposts)) {
        $poid = $row['productId'];
        $da=$row['date'];
        $unit=$row['quantity'];
        $unitPrice = $row['unitPrice'];
        $totalPrice=$unit*$unitPrice;
        $getResult=mysql_query("SELECT * FROM Products WHERE id='$poid'");

        if (mysql_num_rows($getResult)) {
          $row1 = mysql_fetch_assoc($getResult);
          $poid = $row1['id'];
          $pName = $row1['name'];
          $price = $row1['price'];
          $description = $row1['description'];
          $picture = $row1['photo'];
          $item = $row1['type'];

          echo '
          <div style="float: left;">
          <div>
          <img src="img/'.$item.'/'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
          <br>
          <br>
          <br>
          <br>
          </div>
          </div>


          <div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
          <div style="">
          <h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
          <h3 style="padding: 20px 0 0 0; font-size: 20px;">Unit Price: '.$unitPrice.' Rs Total unit : '.$unit.'</h3><hr>
          <h3 style="padding: 20px 0 0 0; font-size: 20px;">total Order Value: '.$totalPrice.' Rs</h3><hr>
          <h3 style="padding: 20px 0 0 0; font-size: 20px;">Order Date: '.$da.' Rs</h3><hr>
          <h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
          <p>
          '.$description.'
          </p>

          <div>
          <h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to print Order Details? </h3>
          <div id="srcheader">
          <form id="" method="post" action="printOrder.php?poid='.$poid.'">
          <input type="submit" value="Print Order" class="srcbutton" >
          </form>
          <div class="srcclear"></div>
          </div>
          </div>
          </div>
          </div>

          ';
        }	    
      }
    }
    ?>
  </div>

</div>
</body>
</html>
