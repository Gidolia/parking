<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
{
 $email=$_POST['email'];
 $password=$_POST['password'];

   $query=mysqli_query($con,"SELECT ID from userdata where  Email='$email' && password='$password' ");
   $ret=mysqli_fetch_array($query);


    if ($ret == true)
    {
      $_SESSION['userid']=$ret['ID'];
      header('location:userpannel.php'); 
	  }
  
    else
    {
      echo "<script>alert('Invalid Email or Password');</script>";  
  
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/old-women-png/old-woman-user-pictures-anna-litviniuk-icon-person-icon-22.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            User Login
        </div>
         

        <form class="p-3 mt-3" method="POST"> 
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button class="btn mt-3" type="submit" name="login" >Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="signup.php">Sign up</a>
        </div>
    </div>
</body>
</html>