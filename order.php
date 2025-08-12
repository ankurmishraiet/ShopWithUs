<?php include ( "connect.php" ); ?>
<?php 
require('function.php');
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
	mysql_query("DELETE FROM Cart WHERE userName='$user' AND productId='$poid'");
	//echo "<script>alert('Item has been successfully Remove ');window.location='profile.php';</script>";
	
	$quantity = validate($_POST["quantity"]);
	
	$d = date("Y-m-d"); //Year - Month - Day
	
	$getResult=mysql_query("SELECT * FROM Products WHERE id='$poid'");
	$row = mysql_fetch_assoc($getResult);
	$discount =$row['discount'];
	$price=$row['price'];
	$fPrice=$price-($price*$discount)/100;
	
	
	$timestamp = time();
	$date = strtotime("+0 day", $timestamp);
	$date = date('Y-m-d', $date);
	mysql_query("INSERT INTO Orders values('$user','$poid',$quantity,$fPrice,'$date')");
	$getposts = mysql_query("SELECT * FROM Users WHERE userName ='$user'") or die(mysql_error());
	
	$row = mysql_fetch_assoc($getposts);
	$email=$row['emailId'];
	$msg="Thanks for odering the item, You will receive your product within 7 days \n";
	// mail($email,"Order Confirmation",$msg);
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
  	$headers .= 'From: ShopWithUs <info@address.com>' . "\r\n";
  	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
  	mail($email, "Order Confirmation", "Your order has been placed successfully!",$headers);
  	//header("location:./profile.php");
	echo "<script>alert('Thanks for ordering item !! Mail sent to you!');window.location='profile.php';</script>";
}
?>	


