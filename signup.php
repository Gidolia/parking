<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
{
$username=$_POST['userName'];
$email=$_POST['email'];
$mobnum=$_POST['mobnum'];
$password=$_POST['password'];
$conpassword=$_POST['conpassword'];
$useradd=$_POST['uadd'];

  if($password == $conpassword)
  {

 $query=mysqli_query($con, "INSERT into userdata (username,password,Email,Mobilenum,Address) value('$username','$password','$email','$mobnum','$useradd')");


 if($query >0)
 {
    echo "<script>alert('Account Created');</script>";  
 }
else
{
    echo "<script>alert('Something went wrong');</script>";  
}
  }
    
    
    else
    {

        echo "<script>alert('Password does not match');</script>"; 
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
            Creat Account
        </div>
       
        <form class="p-3 mt-3"   method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Name" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="mobnum" id="mobnum" placeholder="Mobile Number" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="textarea" rows="4" cols="50" name="uadd" id="uadd" placeholder="Address" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="conpassword" id="conpassword" placeholder="Conform Password" required>
            </div>
           
            <button class="btn mt-3" type="submit" name="login">Sign up</button>
        </form>
        <div class="text-center fs-6">
            <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>