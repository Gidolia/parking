<?php
	session_start();
	include('includes/dbconn.php');
	error_reporting(0);

	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['change-password'])){
	$userid=$_SESSION['vpmsaid'];
	$password=$_POST['currentpassword'];

	$newpassword=$_POST['newpassword'];
	$conpassword=$_POST['confirmpassword'];

	if($conpassword == $newpassword)
	{
	$ret=mysqli_query($con," SELECT * from admin where ID='$userid'" );
	while ($row=mysqli_fetch_array($ret))
	{
	if ($row['Password'] == $password)
	{
	$query=mysqli_query($con,"UPDATE admin set Password='$newpassword' where ID='$userid'" );

	if($query>0)
	{

	$msg= "Your password has been updated with new one";
	}
	}
	else
	{
	$msg="Current password is wrong";
	}
	}
    }
	else
	{
	$msg="Password and confirm password does not match";
	}
	
   }
	?>

	<!DOCTYPE html>
	<html>

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>VPS</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/font-awesome.min.css" rel="stylesheet">
			<link href="css/datepicker3.css" rel="stylesheet">
			<link href="css/styles.css" rel="stylesheet">

			<!--Custom Font-->
			<link
				href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
				rel="stylesheet">

		</head>

		<body>
			<?php include 'includes/navigation_v.php' ?>

				<?php
					include 'includes/sidebar_v.php'
					?>

					<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
						<div class="row">
							<ol class="breadcrumb">
								<li><a href="dashboard_v.php">
										<em class="fa fa-home"></em>
									</a></li>
								<li class="active">User Password</li>
							</ol>
						</div>
						<!--/.row-->

						<div class="row">
							<div class="col-lg-12">
								<!-- <h1 class="page-header">Vehicle Management</h1> -->
							</div>
						</div>
						<!--/.row-->

						<div class="panel panel-default">
							<div class="panel-heading">Change Password</div>
							<div class="panel-body">

								<div class="col-md-12">

									<?php if($msg)
										echo"<div class='alert bg-info' role='alert'>
										<em class='fa fa-lg fa-warning'>&nbsp;</em>
										$msg</div>" ?>

									<form method="POST">

										

											<?php
												$userid=$_SESSION['vpmsaid'];
												$ret=mysqli_query($con," SELECT * from admin where ID='$userid'"
												);
												$cnt=1;
												
												while ($row=mysqli_fetch_array($ret)) {

													?>

												<div class="col-lg-12">
                                                <div class="form-group">
												<label>Existing Password</label>
												<input type="password" class="form-control" name="currentpassword"
												id="currentpassword" required>
											</div>


											<div class="col-lg-12">
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="newpassword"
													id="newpassword" required>
												</div>
											</div>


											<div class="col-lg-12">
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="confirmpassword"
													id="confirmpassword"	required>
												</div>
											</div>


											<center>
												<button type="submit" class="btn btn-info" name="change-password" >Change
													Password </button>


											</center>

										</div> 
										<?php } ?>
										</form>
									</div>
								</div>




								<?php include 'includes/footer.php'?>
								</div>
								<!--/.main-->

								<script src="js/jquery-1.11.1.min.js"></script>
								<script src="js/bootstrap.min.js"></script>
								<script src="js/chart.min.js"></script>
								<script src="js/chart-data.js"></script>
								<script src="js/easypiechart.js"></script>
								<script src="js/easypiechart-data.js"></script>
								<script src="js/bootstrap-datepicker.js"></script>
								<script src="js/custom.js"></script>
								<script>
    window.onload = function() {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
    </script>
							</body>

						</html>

						<?php } ?>