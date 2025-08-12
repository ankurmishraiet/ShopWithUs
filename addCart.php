<?php include ( "connect.php" ); ?>
<?php 

if (isset($_REQUEST['poid'])) {
	
	$poid = mysql_real_escape_string($_REQUEST['poid']);
}else {
	header('location: index.php');
}
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
	$get_user_email = mysql_fetch_assoc($result);
	$uname_db = $get_user_email['firstName'];
	$uemail_db = $get_user_email['emailId'];

	$umob_db = $get_user_email['mobileNo'];
	$uadd_db = $get_user_email['address'];
	mysql_query("INSERT Cart VALUES ('$user','$poid',1)");
}
?>		

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add To Cart Products</title>
	<link  href="css/new.css" rel="stylesheet"/>
	<style>
	#form1{
		position:absolute;
		border-left: 6px solid yellow;
		background-color: deepskyblue;
		height:auto;
		/*width:100%;*/
		font-size:30px;
		top:30%;
		margin:auto;
		margin-left:10%;
		width:75%;
		color:white;
		word-spacing:5px;
		padding:25px;
		/*opacity: 0.8;*/
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
				<?php 
				if ($user!="") {
					echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">' .$user.'&nbsp; &nbsp;</a>';
				}
				else {
					echo '<a style="text-decoration: none; color: #fff;" href="login.php">Login &nbsp; &nbsp;</a>';
				}
				?>

				<?php 
				if ($user!="") {
					echo '<a style="text-decoration: none; color: #fff;" href="logout.php">Logout &nbsp; &nbsp; </a>';
				}
				else {
					echo '<a style="text-decoration: none; color: #fff;" href="register.php">Register &nbsp; &nbsp;</a>';
				}
				?>

				<a href="about.php" class="link"> About Us </a> 
			</div>
		</div>
		<div id="marquee">
			<marquee> Welcome to world's most famous shopping site. </marquee>
		</div>

		<div id="form1">
			<h2 style="color:white; text-shadow: 1px 1px #d9d9ce;"> Your cart details are as follows : </h2>
			<?php 

			$getposts = mysql_query("SELECT * FROM Cart WHERE userName ='$user'") or die(mysql_error()); 
			if (mysql_num_rows($getposts)) {
				while ($row = mysql_fetch_assoc($getposts)) {
					$id = $row['productId'];
					$getResult=mysql_query("SELECT * FROM Products WHERE id='$id'");
					if (mysql_num_rows($getResult)) {
						$row1 = mysql_fetch_assoc($getResult);
						$poid = $row1['id'];
						$pName = $row1['name'];
						$price = $row1['price'];
						$description = $row1['description'];
						$picture = $row1['photo'];
						$item = $row1['type'];
						$discount =$row1['discount'];
						$fPrice=$price-($price*$discount)/100;
						echo '
						<div>
							<div style="float: left;">
								<div>
									<img src="img/'.$item.'/'.$picture.'" style="margin-top:20px; margin-left: 40px; height: 450px; width: 450px; padding: 2px; border: 2px solid yellow;">
									<br>
									<br>
								</div>
							</div>
							<div style="float: right;margin-right:50px; margin-top:20px; width: 40%;color: #067165; background-color: #fcff6e ;padding: 10px;">
								<div style="">
									<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
									<h3 style="padding: 20px 0 0 0; font-size: 20px;">Price: '.$price.' Rs</h3><hr>
									<h3 style="padding: 20px 0 0 0; font-size: 20px;">Discount: '.$discount.' %</h3><hr>
									<h3 style="padding: 20px 0 0 0; font-size: 20px;">Final Price: '.$fPrice.' Rs</h3><hr>
									<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
									<p>
										'.$description.'
									</p>

									<div>
						
										<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </h3>
										<div id="srcheader">
											<form id="" method="post" action="order.php?poid='.$poid.'">
												Quantity : <select name="quantity">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>

												</select><br>
												<input type="submit" value="Order Now" class="srcbutton" >
											</form>
											<form id="" method="post" action="cancel.php?poid='.$poid.'">
												<input type="submit" value="Cancel" class="srcbutton" >
											</form>
											<div class="srcclear"></div>
										</div>
									</div>

								</div>
							</div>
						</d
						';
					}	    
					//echo '<hr/>';
				}
			}
			?>
		</div>

	</div>
</body>
</html>
