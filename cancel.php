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
	mysql_query("DELETE FROM Cart WHERE userName='$user' AND productId='$poid'");
	echo "<script>alert('Item has been successfully Remove ');window.location='profile.php';</script>";
}
?>		
