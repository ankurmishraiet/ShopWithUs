<?php include ( "connect.php" ); ?>
<?php 
ob_start();
session_start();
require('function.php');
if (!isset($_SESSION['user_id'])) {
	$user = "";
	echo "<script>alert('Please Login First !!');window.location='login.php';</script>";
	//header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_id'];
}

    $id = validate($_POST["productId"]);
    $name = validate($_POST["name"]);
    $price = validate($_POST["price"]);
    $description = validate($_POST["description"]);
    $type = validate($_POST["type"]);
    $photo = validate($_POST["photo"]);
    $con=con();
  
  $query="select *from Products s where s.id='$id'";
  $result=$con->query($query);
  if($result->num_rows>0)
   {
     echo "<script>alert('Product with this Product id already exist.');window.location='addProduct.php';</script>";
        die();
   }
   else
    {
     //$ins_query="insert into Products values('$id','$name','$price',$description,'$type','$photo')";
     //$ins_result=$con->query($ins_query);
     mysql_query("INSERT INTO Products VALUES('$id','$name',$price,'$description','$type','$photo')");
     echo "<script>alert('Congratulations !!! You have added this Product.');window.location='admin_home.php';</script>";
	 die(); 
    }
?>		
