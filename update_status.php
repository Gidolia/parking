<?php
    session_start();
    error_reporting(0);

    include('includes/dbconn.php');
    if (strlen($_SESSION['userid']==0)) {
    header('location:login.php');
    } else{

    if(isset($_POST['update-status']))
    {
        
        $pplace=$_POST['pplace'];
        $ptype=$_POST['ptype'];
        $vcate=$_POST['vcate'];
        $vehno=$_POST['vehno'];
        $descrip=$_POST['descrip'];
        $fromdate=$_POST['fromdate'];
        $todate=$_POST['todate'];
        $eid=$_GET['editid'];
    
        $query=mysqli_query($con, "UPDATE userapply set parkingplace='$pplace',parkingtype='$ptype', vehcat='$vcate', Description='$descrip',FromDate='$fromdate', ToDate='$todate'  where id='$eid'");
        if ($query) {
        $msg="Requested Updated.";
    }
    else
        {
        $msg="Something Went Wrong. Please try again";
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
        <?php include 'includes/navigation_u.php' ?>
	
		<?php
		$page="curr_status";
		include 'includes/sidebar_u.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="profile.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Update Request</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">

						<div class="col-md-12">

                        <?php if($msg)
						echo "<div class='alert bg-info' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 

							<form method="POST">

                            <?php
                            $cid=$_GET['editid'];
                            $ret=mysqli_query($con,"SELECT * from  userapply where id='$cid'");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>  

                            <div class="form-group">
                            <label>Parking Place</label>
                            <select class="form-control" value="<?php  echo $row['username'];?>" id="pplace" name="pplace">
                                <option value="Thathipur">Thathipur</option>
                                <option value="Morar">Morar</option>
                                <option value="Bada">Bada</option>

                            </select>
                           </div>
 
                            <div class="form-group">
                        <label>Parking Type</label>
                            <select class="form-control" value="<?php  echo $row['parkingtype'];?>" id="ptype" name="ptype">
                                <option value="Today">24 Hour</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>

                            </select>
                        </div>

                            <div class="form-group">
                        <label>Vehicle Category</label>
                            <select class="form-control" value="<?php  echo $row['vehcat'];?>" id="vcate" name="vcate">
                                <option value="Two-Wheeler">Two Wheeler</option>
                                <option value="Three-Wheeler">Three Wheeler</option>
                                <option value="Four-Wheeler">Four Wheeler</option>

                            </select>
                            </div>

                       
                                <div class="form-group">
									<label>From</label>
									<input class="form-control" type="date" value="<?php  echo $row['FromDate'];?>" name="fromdate" id="fromdate" required="true">
								</div>

								<div class="form-group">
									<label>To</label>
									<input class="form-control" type="date" value="<?php  echo $row['ToDate'];?>" name="todate" id="todate" required="true">
								</div>

								<div class="form-group">
									<label>Description</label>
									<input type="text" class="form-control" value="<?php  echo $row['Description'];?>" id="descrip" name="descrip" required>
								</div>
                               

                            <?php }?>

									<button type="submit" class="btn btn-info" name="update-status">Make Changes</button>
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