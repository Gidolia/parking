<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Execption;
	

    if (strlen($_SESSION['userid']==0)) {
    header('location:logout.php');
    } else {

    if(isset($_POST['submit-in']))
	{
        $userid=$_SESSION['userid'];
        $pplace=$_POST['pplace'];
        $ptype=$_POST['ptype'];
        $vno=$_POST['vno'];
        $vcate=$_POST['vcate'];
        $descrip=$_POST['descrip'];
        $fromdate=$_POST['fromdate'];
        $todate=$_POST['todate'];
		$query=mysqli_query($con, "INSERT into userapply (parkingplace,vehcat,parkingtype,Fromdate,Todate,Description,userid,regno) value('$pplace','$vcate','$ptype','$fromdate','$todate','$descrip','$userid','$vno')");
        if ($query) {
            // $msg="Applied Successful.";
       
			$mail= new PHPMailer();
			$mail->isSMTP();
			$mail->Host ="smtp.gmail.com";
            $mail->SMTPAuth="true";
            $mail->SMTPSecure="tls";
			$mail->Port="587";
			$mail->Username="ankittechies1@gmail.com";
			$mail->Password="ankit7610@#A";
			$mail->Subject="Test Email Using PHPMailer";
			$mail->setFrom("ankittechies1@gmail.com");
			$mail->Body="This is Plain text email body";
			$mail->addAddress("sanuverma298@gmail.com");
		  	$mail_>Send();
			$mail->smtpClose();


        } else {
            $msg="Something Went Wrong";
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
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
-
</head>
<body>
        <?php include 'includes/navigation_u.php' ?>
	
		<?php
		$page="bookslot";
		include 'includes/sidebar_u.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="userpannel.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Book Slot</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
					
						<div class="panel-heading"><a href="check_available.php" type="button" class="btn btn-sm btn-primary">Check Availability</a></div>
						<div class="panel-body">

                        <?php if($msg)
						echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        
                        <div class="col-md-12">


							<form method="POST">

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
                        <label>Parking Type</label>
                            <select class="form-control" id="ptype" name="ptype">
                                <option value="Today">24 Hour</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>

                            </select>
                        </div>

                            <div class="form-group">
                            <label>Vehicle Category</label>
                            <select class="form-control" id="vcate" name="vcate">
                                <option value="Two-Wheeler">Two Wheeler</option>
                                <option value="Three-Wheeler">Three Wheeler</option>
                                <option value="Four-Wheeler">Four Wheeler</option>

                            </select>
                            </div>
                                  
							<div class="form-group">
									<label>Vechicle No.</label>
									<input type="text" class="form-control"  id="vno" name="vno" required>
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
									<label>Description</label>
									<input type="text" class="form-control"  id="descrip" name="descrip" required>
								</div>
                               

								
                        <?php } ?>

									<button type="submit" class="btn btn-success" name="submit-in">Submit For Booking</button>
									<button type="reset" class="btn btn-default">Reset</button>
                                    
								</div> <!--  col-md-12 ends -->


						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

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

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php   ?>