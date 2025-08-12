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

?>		

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Print Order Details</title>
        <link  href="css/index.css" rel="stylesheet"/>
        <script>
        document.getElementById("d").innerHTML = Date();
        function pr() {
        window.print();
}
</script>
        <style>
            #form1{
                 position:absolute;
    border-left: 6px solid red;
   /* background-color: lightgrey;*/
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
    opacity: 0.8;
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
                <a href="index.php"><?php echo "Shopping" ;?></a>
            </div>
            <div id="lin">
                     <a href="index.php" class="link" > Home &nbsp; &nbsp;</a> 
                     <a href="products/products.php" class="link"> Products  &nbsp; &nbsp;</a> 
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
					
                     <a href="about.php" class="link"> About Us </a> 
            </div>
          </div>
          <div id="marquee">
               <marquee> Welcome to world's most adorable shopping site </marquee>
          </div>
          
          <div id="form1">
          <h2 style="color:black"> Your Order Details As Follows </h2>
             <?php 
             $result = mysql_query("SELECT * FROM Orders WHERE userName='$user' AND productId='$poid'");
		           $get_details = mysql_fetch_assoc($result);
		           
		           $date = $get_details['date'];
		            $unit=$get_details['quantity'];
                    $unitPrice = $get_details['unitPrice'];
                    $totalPrice=$unit*$unitPrice;
		           $result1=mysql_query("SELECT * FROM Products WHERE id='$poid'");
		           
		           $row=mysql_fetch_assoc($result1);
		           
		           $id = $row['id'];
						$pName = $row['name'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['photo'];
						$item=$row['type'];
						echo '
				<div style="float: left;">
				<div>
					<img src="img/'.$item.'/'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
				</div>
				</div>
				<div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
					<div style="">
						<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;">Unit Price: '.$unitPrice.' Rs Total unit : '.$unit.'</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;">total Order Value: '.$totalPrice.' Rs</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3> <hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;">Order Date: '.$date.'</h3>
						<p>
							'.$description.'
						</p>

						<div>
							<div id="srcheader">
								<form id="" method="post" action="index.php">
								        <input type="button" id="p" value="print" onclick="pr()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="p" value="Go to Home page">
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
