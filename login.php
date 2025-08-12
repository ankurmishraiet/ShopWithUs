<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
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

       <a style="text-decoration: none;  position:absolute; right:0; padding-right: 170px;color: yellow;" href="login.php" class="link"> Login  &nbsp; &nbsp;</a> 
       <a style="text-decoration: none; position:absolute; right:0; padding-right: 55px; color: #fff;" href="register.php" class="link"> Register &nbsp; &nbsp;</a> 
       
     </div>
   </div>
   <div id="marquee">
     <marquee> Welcome to world's most adorable shopping site </marquee>
   </div>

   <div id="form1">
    <form id="form2" action="login_back.php" method="post">
      Login type : <select name="loginType">
        <option value="admin"> Admin</option>
        <option value="user"> User</option>
      </select><br/><br/>
      User Name : <input type="text" name="userName" placeholder="User Name"> <br/><br/>
      Password : <input type="password" name="password" placeholder="Password"><br/><br/>
      <center><input type="submit" value="submit">&nbsp; &nbsp; <input type="reset" value="reset"></center>
    </form>
  </div>

</div>
</body>
</html>
