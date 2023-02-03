<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-vehicle'])) {
		$catename=$_POST['catename'];
		$vehcomp=$_POST['vehcomp'];
		$vehreno=$_POST['vehreno'];
		$ownername=$_POST['ownername'];
		$ownercontno=$_POST['ownercontno'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$charge=$_POST['chargeh'];
		$pplace=$_POST['pplace'];
		
		$nameh=$_SESSION['usernam'];
	
			
		$query=mysqli_query($con, "INSERT into monthly_pass(VehicleCategory,AddedBy,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,FromDate,ToDate,Charge,Location) value('$catename','$nameh','$vehcomp','$vehreno','$ownername','$ownercontno','$fromdate','$todate','$charge','$pplace')");
		if ($query) {
			echo "<script>alert('Monthly Pass Detail has been added');</script>";
			echo "<script>window.location.href ='activepass.php'</script>";
		} else {
			echo "<script>alert('Something Went Wrong');</script>";       
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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="monthly-pass";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Add Monthly Pass</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Monthly Pass Entry</div>
					<div class="panel-body">

						<div class="col-md-12">

							<form method="POST">

								<div class="form-group">
									<label>Vehicle Number</label>
									<input type="text" class="form-control" placeholder="MP-00-MH-0000" id="vehreno" name="vehreno" required>
								</div>

						
									<div class="form-group">
										<label>Vehicle Category</label>
										<select class="form-control" name="catename" id="catename">
										<option value="Two Wheeler">Two Wheeler</option>
                                        <option value="Three Wheeler">Three Wheeler</option>
                                        <option value="Four Wheeler">Four Wheeler</option>
										</select>
									</div>
									
									<div class="form-group">
                            <label>Parking Place</label>
                            <select class="form-control" id="pplace" name="pplace">
                                <option value="Arcelor Mittal Orbit">Arcelor Mittal Orbit</option>
                                <option value="Crossness Pumping Station">Crossness Pumping Station</option>
                                <option value="Telegraph Hill Upper Park">Telegraph Hill Upper Park</option>
                                <option value="Greenwich Park">Greenwich Park</option>
                                <option value="Victoria Park">Victoria Park</option>
                                <option value="Barbican Centre">Barbican Centre</option>
                                <option value="Eitham Palace">Eitham Palace</option>
                                <option value="Dulwich Picture Gallery">Dulwich Picture Gallery</option>

                            </select>
                           </div>

								<div class="form-group">
									<label>Owner's Full Name</label>
									<input type="text" class="form-control" placeholder="Enter Here.." id="ownername" name="ownername" required>
								</div>


								<div class="form-group">
									<label>Owner's Contact</label>
									<input type="text" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
								</div>

								<div class="form-group">
									<label>From</label>
									<input class="form-control" type="date" name="fromdate" id="fromdate" required="true">
								</div>

								<div class="form-group">
									<label>To</label>
									<input class="form-control" type="date" name="todate" id="todate" required="true">
								</div>

								<div class="form-group">
									<label>Charge</label>
									<input class="form-control" type="number" name="chargeh" id="chargeh" required="true">
								</div>


									<button type="submit" class="btn btn-success" name="submit-vehicle">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div> <!--  col-md-12 ends -->
							</form>
						</div> 
					</div>
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
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

<?php }  ?>