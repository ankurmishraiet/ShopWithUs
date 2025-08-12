<?php include ( "connect.php" ); ?>
<?php 
ob_start();
session_start();
require('function.php');
if (isset($_REQUEST['poid'])) {
	
	$pid = mysql_real_escape_string($_REQUEST['poid']);
}else {
	header('location: index.php');
}

if (!isset($_SESSION['user_id'])) {
	$user = "";
	echo "<script>alert('Please Login First !!');window.location='login.php';</script>";
	//header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_id'];
}

    $review = validate($_POST["review"]);
    $con=con();
  
  $query="select *from Reviews s where s.userName='$user' AND s.productId='$pid'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('You have already entered review for this product.');window.location='profile.php';</script>";
        die();
   }
   else
    {
     //$ins_query="insert into Products values('$id','$name','$price',$description,'$type','$photo')";
     //$ins_result=$con->query($ins_query);
     mysql_query("INSERT INTO Reviews VALUES('$user','$pid','$review')");
     echo "<script>alert('Congratulations !!! You have Entered review for this Product.');window.location='profile.php';</script>";
	 die(); 
    }
?>		
