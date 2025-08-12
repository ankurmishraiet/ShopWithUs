<?php include ( "connect.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_id'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM Users WHERE userName='$user'");
	$get_user_email = mysql_fetch_assoc($result);
	$uname_db = $get_user_email['firstName'];
}
if (isset($_REQUEST['poid'])) {
	
	$pid = mysql_real_escape_string($_REQUEST['poid']);
}else {
	header('location: index.php');
}


$getposts = mysql_query("SELECT * FROM Products WHERE id ='$pid'") or die(mysql_error());
if (mysql_num_rows($getposts)) {
	$row = mysql_fetch_assoc($getposts);
	$id = $row['id'];
	$pName = $row['name'];
	$price = $row['price'];
	$description = $row['description'];
	$picture = $row['photo'];
	$item = $row['type'];
	$discount =$row['discount'];
	$fPrice=$price-($price*$discount)/100;
}	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>View Products</title>
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
				<a href="products.php" class="link"> Products  &nbsp; &nbsp;</a> 
				<?php 
				if ($user!="") {
					echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">' .$user.'&nbsp; &nbsp;</a>';
				}
				else {
					echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN &nbsp; &nbsp;</a>';
				}
				?>

				<?php 
				if ($user!="") {
					echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT  &nbsp; &nbsp; </a>';
				}
				else {
					echo '<a style="text-decoration: none; color: #fff;" href="register.php">Register &nbsp; &nbsp;</a>';
				}
				?>

				<a href="#" class="link"> About Us </a> 
			</div>
		</div>
		<div id="marquee">
			<marquee> Welcome to world's most adorable shopping site </marquee>
		</div>

		<div id="form1">
			<?php 
			echo '
			<div style="float: left;">
			<div>
			<img src="img/'.$item.'/'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
			</div>
			</div>
			<div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
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
			<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Enter Review :  </h3>
			<div id="srcheader">
			<form id="" method="post" action="reviewBack.php?poid='.$pid.'">
			<textarea rows="4" cols="50" name="review">
			</textarea><br/>
			<input type="submit" value="Submit" class="srcbutton" >
			</form>
			<div class="srcclear"></div>
			</div>
			</div>

			</div>
			</div>

			';
			?>
		</div>

	</div>
</body>
</html>
