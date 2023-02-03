<?php
    session_start();
    error_reporting(0);

    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else{

    if(isset($_POST['update-category']))
    {
        $aid=$_SESSION['vpmsaid'];
        $vehreno=$_POST['vehreno'];
        $vehcomp=$_POST['vehcomp'];
        $catename=$_POST['catename'];
        $ownername=$_POST['ownername'];
        $ownercontno=$_POST['ownercontno'];
        $fromdate=$_POST['fromdate'];
        $todate=$_POST['todate'];
        $charge=$_POST['chargeh'];
		$dataname=$_SESSION['slothe'];
		$nameh=$_SESSION['usernam'];
		
       $eid=$_GET['editid'];
    
	   $query=mysqli_query($con, "INSERT into monthly_pass(VehicleCategory,AddedBy,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,FromDate,ToDate,Charge,Location) value('$catename','$nameh','$vehcomp','$vehreno','$ownername','$ownercontno','$fromdate','$todate','$charge','$dataname')");
        if ($query) {
        $msg="Monthly Pass Renew";
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
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="activepass";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Update Pass</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Update Monthly Pass</div>
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
						
							
	
                            $ret=mysqli_query($con,"SELECT * from  monthly_pass where   ID='$cid'");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>  

                                  <div class="form-group">
									<label>Vehicle Number</label>
									<input type="text" class="form-control" value="<?php  echo $row['RegistrationNumber'];?>" id="vehreno" name="vehreno" required>
								</div>


								<div class="form-group">
                            <label>Parking Place</label>
                            <select class="form-control" id="pplace" name="pplace"  value="<?php  echo $row['Location'];?>">
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
										<label>Vehicle Category</label>
										<select class="form-control" value="<?php  echo $row['VehicleCategory'];?>" name="catename" id="catename">
										<option value="Two Wheeler">Two Wheeler</option>
                                        <option value="Three Wheeler">Three Wheeler</option>
                                        <option value="Four Wheeler">Four Wheeler</option>
										</select>
									</div>
									

								<div class="form-group">
									<label>Owner's Full Name</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerName'];?>" id="ownername" name="ownername" required>
								</div>


								<div class="form-group">
									<label>Owner's Contact</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerContactNumber'];?>" maxlength="10" pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
								</div>

								<div class="form-group">
									<label>From</label>
									<input class="form-control" type="date" name="fromdate" id="fromdate" required="true">
								</div>

								<div class="form-group">
									<label>To</label>
									<input class="form-control" type="date"  name="todate" id="todate" required="true">
								</div>

								<div class="form-group">
									<label>Charge</label>
									<input class="form-control" type="number" value="<?php  echo $row['Charge'];?>" name="chargeh" id="chargeh" required="true">
								</div>
                            

								

                            <?php }?>

									<button type="submit" class="btn btn-success" name="update-category">Make Changes</button>
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