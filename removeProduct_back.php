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
if (isset($_REQUEST['poid'])) {
	
	$poid = mysql_real_escape_string($_REQUEST['poid']);
}else {
	header('location: index.php');
}
    mysql_query("DELETE FROM Products WHERE id='$poid'");
    echo "<script>alert('Product has been successfully deleted !!');window.location='admin_home.php';</script>";
?>		

