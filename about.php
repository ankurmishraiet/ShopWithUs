<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Page</title>
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
    background-color:deepskyblue;
    word-spacing:5px;
    padding:25px;
    opacity: 1;
  }
  #form2{
    text-align:center;
    margin-bottom: 10px;
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
       <a href="about.php" class="link"> About Us </a> 

       <a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="login.php" class="link"> Login  &nbsp; &nbsp;</a> 
       <a style="text-decoration: none; position:absolute; right:0; padding-right: 55px; color: #fff;"href="register.php" class="link"> Register &nbsp; &nbsp;</a> 
       
     </div>
   </div>
   <div id="marquee">
    <marquee> Welcome to world's most famous shopping site. </marquee>
  </div>

  <div id="form1">
   <p style="color: yellow; text-shadow: 1px 1px black">This project is for the Shopping of given categories:- </p>
   <ul>
     <li>Beauty Products</li>
     <li>Jeans</li>
     <li>Tshirts</li>
     <li>Shoes</li>
     <li>Watches</li>
   </ul>
 </div>
 

</div>
</body>
</html>
