<?php 
    include("connection.php");
    include("login.php")
    ?>
    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <header style="
  background-color: black;
  width: 100%;
  position: relative;
  z-index: 999;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1% 5%;
">
      <a href="#" class="logo">ELECTRO NACER</a>
      <nav class="navigation">
        <a href="index.php">Log in </a>
        <a href="products.php">Catalogue</a>
        
      
     
    </header>
        <div id="form">
            <h1>Login Form</h1>
            <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <label>Username: </label>
                <input type="text" id="user" name="user">
                <label>Password: </label>
                <input type="password" id="pass" name="pass">
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
        </div>


        <footer>
    <div class="footer-content">
        <h3>ElectroNacer</h3>
        <p>Follow us on social media :</p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2020 ElectroNacer. designed by <span></span></p>
    </div>
</footer>






        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>


    </body>
</html>
    
