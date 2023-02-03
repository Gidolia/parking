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
		$once=$_POST['once'];
		$pplace=$_POST['pplace'];
        $usernam=$_SESSION['usernam'];
       
        $query3=mysqli_query($con," SELECT Available  from location where Location='$pplace' ");
        $row3=mysqli_fetch_array($query3);
        $left=$row3['Available'];
        $left++;

  
	   if($left<=100)
       {

		$query=mysqli_query($con, "INSERT into vehicle_info (AddedBy,VehicleCategory,RegistrationNumber,Regular,Parkingplace,ParkingNumber) value('$usernam','$catename','$vehreno','$once','$pplace','$left')");

        if ($query) 
        {

              

               $query6=mysqli_query($con, "UPDATE location set Available='$left' where Location='$pplace'");   

               if ($query) {
                $msg="Vehicle Added";
                           
                           }




		} 
        else
        {
			echo "<script>alert('Something Went Wrong');</script>";       
		}

       }
        else
        {
            $msg="Parking Place Full";
        }

		
	}
    if(isset($_POST['out-vehicle'])){
        $vehreno=$_POST['vehreno'];
        $pplace=$_POST['pplace'];
        $status='Out';
        $mul=0;
 
 
        $ret=mysqli_query($con," SELECT ID,HOUR(TIMEDIFF(CURRENT_TIMESTAMP(),InTime)) as abc,VehicleCategory from vehicle_info where RegistrationNumber='$vehreno' and Status='' ");
        $row=mysqli_fetch_array($ret);
        $total=$row['abc'];
        $_SESSION['newsysh']=$row['ID'];
   for ($x = 0; $x <= $total; $x+=4) {
    $mul+=1;
 
                                   }

                            
$quel=mysqli_query($con,"SELECT * from location WHERE Location='$pplace' ");
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

        
        $parkingcharge=$charge*$mul;
		
        $nameh=  $_SESSION['usernam'];

        $ret33=mysqli_query($con,"SELECT * from vehicle_info where RegistrationNumber='$vehreno' and Status=' ' ");       
        $row33=mysqli_fetch_array($ret33);

        $check=$row33['Regular'];
        if($check=="Monthly")
        {
            $parkingcharge=0;
        }
     
        $queryss=mysqli_query($con, "UPDATE vehicle_info set Status='$status',ParkingCharge='$parkingcharge' ,RemoveBy='$nameh' where RegistrationNumber='$vehreno' and Status=' ' ");

        if ($queryss)
        {
            
            $query9=mysqli_query($con," SELECT Available  from location where Location='$pplace' ");
            $row9=mysqli_fetch_array($query9);
            $left=$row9['Available'];
            $left--;

            $query6=mysqli_query($con, "UPDATE location set Available='$left' where Location='$pplace'");   

            if ($query) {

                $msg="Vehicle Added";

                        }
        }

         else 
        {
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
    <?php include 'includes/navigation.php' ?>

    <?php
       $pri=$_SESSION['usernam'];
		$page="manage-vehicles";
		include 'includes/sidebar.php'

		?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
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
                            <input type="text" class="form-control" placeholder="HH-00-MM-0000" id="vehreno"
                                name="vehreno" required>
                        </div>

                        <div class="form-group">
                            <label>Vehicle Category</label>
                            <select class="form-control" id="catename" name="catename">
                                <option value="Two Wheeler">Two Wheeler</option>
                                <option value="Four Wheeler">Four Wheeler</option>
                                <option value="Three Wheeler">Three Wheeler</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Once Or Monthly</label>
                            <select class="form-control" id="once" name="once">
                                <option value="Once">Once</option>
                                <option value="Monthly">Monthly</option>


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