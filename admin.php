<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
	$role=$_POST['Role'];
    $query=mysqli_query($con,"SELECT ID from admin where  Email='$email' && Password='$password' && Role='$role' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){

		$_SESSION['vpmsaid']=$ret['ID'];
		$temp=$ret['ID'];
		
	if ($role =='Vendor')
	{	
    
		$sql=mysqli_query($con,"SELECT * FROM admin WHERE ID='$temp'");
		$row=mysqli_fetch_array($sql);

		$_SESSION['slothe']=$row['Slot'];
	    $_SESSION['usernam']=$row['UserName'];

      
	header('location:dashboard_v.php');
	}
	elseif ($role =='Admin') {
	
		$sql=mysqli_query($con,"SELECT * FROM admin WHERE ID='$temp'");
		$row=mysqli_fetch_array($sql);

		$_SESSION['usernam']=$row['UserName'];
		



		header('location:dashboard.php');
	}
	elseif($role =='P-Admin')
	{   $sql=mysqli_query($con,"SELECT * FROM admin WHERE ID='$temp'");
		$row=mysqli_fetch_array($sql);

		$_SESSION['slothe']=$row['Slot'];
		$_SESSION['usernam']=$row['UserName'];


		header('location:dashboard_p.php');
	}
    

    }
    else{
    $msg="Login Failed !!";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<center><h2><b>Vehicle Parking System</b></h2></center>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Please Log In To Continue</div>
				<div class="panel-body">
					<form method="POST">
					<?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="email">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" >
							</div>

							<div class="form-group">
                           
                            <select class="form-control"  id="Role" name="Role" >
							
                            <option value="Admin">Admin</option>
                             <option value="P-Admin">P-Admin</option>
                           <option value="Vendor">Vendor</option>
 
                          </select>
                        </div>

							<div class="checkbox">
								
								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password?</a>
							</div>
							<button class="btn btn-success" type="submit" name="login">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>