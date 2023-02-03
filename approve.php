<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['approve'])) {
		
		$ownername=$_POST['vehcat'];
		$ownercontno=$_POST['ptype'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
        $status=1;
        $rid=$_GET['updateid'];
	
		$query=mysqli_query($con, "UPDATE userapply set Status='$status' Where id ='$rid'  ");
		if ($query) {
			echo "<script>alert('Approve Successfully');</script>";
			echo "<script>window.location.href ='request.php'</script>";
		} else {
			echo "<script>alert('Something Went Wrong');</script>";       
		}
	}

	if(isset($_POST['decline'])) {
		
		$ownername=$_POST['vehcat'];
		$ownercontno=$_POST['ptype'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
        $status=2;
        $rid=$_GET['updateid'];
	
			
		$query=mysqli_query($con, "UPDATE userapply set Status='$status' Where id ='$rid'  ");
		if ($query) {
			echo "<script>alert('Decline Successfully');</script>";
			echo "<script>window.location.href ='request.php'</script>";
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
        <?php include 'includes/navigation_p.php' ?>
	
		<?php
		$page="request";
		include 'includes/sidebar_p.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard_p.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">All parking details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Parking Details</div>
					<div class="panel-body">

						<div class="col-md-12">

							<form method="POST">
                                   
                            <?php
                             $rid=$_GET['updateid'];
                               
                                $ret2=mysqli_query($con,"SELECT * from userapply where id='$rid' ");                       
                                $row2=mysqli_fetch_array($ret2);
                           
                                  $userid=$row2['userid'];

                                   $ret=mysqli_query($con,"SELECT * from userdata where ID='$userid' ");                       
                                   $row=mysqli_fetch_array($ret);

                            ?>

								<div class="form-group">
									<label>User Name</label>
									<input type="text" class="form-control"  value="<?php  echo $row['username'];?>" readonly>
								</div>


								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" value="<?php  echo $row['Email'];?>" readonly>
								</div>
								

								<div class="form-group">
									<label>Mobile Number</label>
									<input type="text" class="form-control" value="<?php  echo $row['Mobilenum'];?>" readonly>
								</div>

								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" value="<?php  echo $row['Address'];?>" readonly>
								</div>

								<div class="form-group">
									<label>Applying Timing</label>
									<input type="text" class="form-control" value="<?php  echo $row2['PostingDate'];?>" readonly>
								</div>


								<div class="form-group">
									<label>Vehicle Category</label>
									<input type="text" class="form-control" value="<?php  echo $row2['vehcat'];?>" id="vehcat" name="vehcat" required>
								</div>

								<div class="form-group">
									<label>Parking Type</label>
									<input type="text" class="form-control" value="<?php  echo $row2['parkingtype'];?>" id="ptype" name="ptype" >
								</div>

								<div class="form-group">
									<label>From</label>
									<input class="form-control" type="date" value="<?php  echo $row2['FromDate'];?>" name="fromdate" id="fromdate" required="true">
								</div>

								<div class="form-group">
									<label>To</label>
									<input class="form-control" type="date" value="<?php  echo $row2['ToDate'];?>" name="todate" id="todate" required="true">
								</div>
                                

									<button type="submit" class="btn btn-success" name="approve">Approved</button>
									<button type="submit" class="btn btn-danger" name="decline">Decline</button>
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