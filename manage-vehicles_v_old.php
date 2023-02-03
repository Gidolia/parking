<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-vehicle'])) {
		
		$catename=$_POST['catename'];
		
		$vehreno=$_POST['vehreno'];
	
		
		$enteringtime=$_POST['enteringtime'];
	    $dataname=$_SESSION['slothe'];
        $usernam=$_SESSION['usernam'];
			
		$query=mysqli_query($con, "INSERT into  $dataname(AddedBy,VehicleCategory,RegistrationNumber) value('$usernam','$catename','$vehreno')");
		if ($query) {
			
            $msg="Vehicle Added";
		} else {
			echo "<script>alert('Something Went Wrong');</script>";       
		}
	}
    if(isset($_POST['out-vehicle'])){
        $vehreno=$_POST['vehreno'];
        $status='Out';
        $dataname=$_SESSION['slothe'];
 
        $ret=mysqli_query($con,"SELECT * from $dataname where RegistrationNumber='$vehreno' ");
               
                    $row=mysqli_fetch_array($ret);
                            
        $quel=mysqli_query($con,"SELECT * from vcategory WHERE Databaseh='$dataname' ");
        $ram=mysqli_fetch_array($quel);

   if($row['VehicleCategory']=="Two Wheeler")
   {
       $charge=$ram['TwoWheeler'];
   }
   if($row['VehicleCategory']=="Three Wheeler")
   {
       $charge=$ram['ThreeWheeler'];
   }
   if($row['VehicleCategory']=="Four Wheeler")
   {
       $charge=$ram['FourWheeler'];
   }


 $query=mysqli_query($con,"SELECT HOUR(TIMEDIFF(CURRENT_TIMESTAMP(),InTime)) as abc FROM $dataname WHERE RegistrationNumber='$vehreno' ");
 $rell=mysqli_fetch_array($query);
 $total=$rell['abc'];

$mul=0;


for ($x = 0; $x <= $total; $x+=4) {
  $mul+=1;

}


}

        $parkingcharge=$charge*$mul;
		$dataname=$_SESSION['slothe'];
        $nameh=  $_SESSION['usernam'];
        $_SESSION['newsysh']=$vehreno;
        $queryss=mysqli_query($con, "UPDATE $dataname set Status='$status',ParkingCharge='$parkingcharge' ,RemoveBy='$nameh' where RegistrationNumber='$vehreno'");
        if ($query) {
    
            header('location:print-manage_v.php');
         

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
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

</head>

<body>
    <?php include 'includes/navigation_v.php' ?>

    <?php
       $pri=$_SESSION['usernam'];
		$page="manage-vehicles_v";
		include 'includes/sidebar_v.php'

		?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard_v.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Manage Vehicle</li>
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
            <div class="panel-heading"><?php echo $pri; ?></div>
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
                            <label>Registration Number</label>
                            <input type="text" class="form-control" placeholder="HH-00-MM-0000" id="vehreno" name="vehreno"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Vehicle Category</label>
                            <select class="form-control" id="catename" name="catename">
                                <option value="Two Wheeler">Two Wheeler</option>
                                <option value="Four Wheeler">Four Wheeler</option>
                                <option value="Three Wheeler">Three Wheeler</option>

                            </select>
                        </div>



                        <button type="submit" class="btn btn-success" name="submit-vehicle">In-Vehicle</button>
                        <button type="submit" class="btn btn-danger" name="out-vehicle">Out-Vechicle</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                </div> <!--  col-md-12 ends -->
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

<?php }  ?>