<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else {

    if(isset($_POST['submit-in'])){
        $cid=$_GET['updateid'];
       
        $status=$_POST['status'];
        $parkingcharge=$_POST['parkingcharge'];
		$dataname=$_SESSION['slothe'];
        $nameh=  $_SESSION['usernam'];
      
      //Second Method
      $queryss=mysqli_query($con, "UPDATE vehicle_info set Status='$status',ParkingCharge='$parkingcharge' ,RemoveBy='$nameh' where RegistrationNumber='$vehreno' and Status=' ' ");
                        
                                if ($queryss)
                                {
                                    
                                    $query9=mysqli_query($con," SELECT Available  from location where Location='$dataname' ");
                                    $row9=mysqli_fetch_array($query9);
                                    $left=$row9['Available'];
                                    $left--;
                        
                                    $query6=mysqli_query($con, "UPDATE location set Available='$left' where Location='$dataname'");   
                        
                                    if ($query) {
                        
                                        $msg="All remarks has been updated.";
                        
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
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

</head>

<body>
    <?php include 'includes/navigation_v.php' ?>

    <?php
		$page="in-vehicle_v";
		include 'includes/sidebar_v.php'
		?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard_v.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Vehicle Category Management</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Vehicle Management</h1> -->
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Incoming Vehicles</div>
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


                                <?php
                            $cid=$_GET['updateid'];
							$dataname=$_SESSION['slothe'];
                            $ret=mysqli_query($con,"SELECT * from vehicle_info where Parkingplace='$dataname' and ID='$cid'");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>

                                <div class="form-group">
                                    <label>Vehicle Registration Number</label>
                                    <input type="text" class="form-control"
                                        value="<?php  echo $row['RegistrationNumber'];?>" id="catename" name="catename"
                                        readonly>
                                </div>



                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control"
                                        value="<?php  echo $row['VehicleCategory'];?>" id="sdesc" name="sdesc" readonly>
                                </div>


                                <div class="form-group">
                                    <label>Vehicle IN Time</label>
                                    <input type="text" class="form-control" value="<?php  echo $row['InTime'];?>"
                                        id="sdesc" name="sdesc" readonly>
                                </div>


                                <div class="form-group">
                                    <label>Current Status</label>
                                    <input type="text" class="form-control"
                                        value="<?php if($row['Status']==""){ echo "Vehicle In"; } if($row['Status']=="Out"){echo "Vehicle out";} ;?>"
                                        id="sdesc" name="sdesc" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Total Charge</label>
                                    <?php 
                                //Second Tech
                                $cid=$_GET['updateid'];
                                $status='Out';
                                $mul=0;
                                $dataname=$_SESSION['slothe'];
                         
                                $ret=mysqli_query($con," SELECT ID,HOUR(TIMEDIFF(CURRENT_TIMESTAMP(),InTime)) as abc,VehicleCategory from vehicle_info where ID='$cid' and Status='' ");
                                $row=mysqli_fetch_array($ret);
                                $total=$row['abc'];
                              
                           for ($x = 0; $x <= $total; $x+=4) {
                            $mul+=1;
                         
                                                           }
                        
                                                    
                        $quel=mysqli_query($con,"SELECT * from location WHERE Location='$dataname' ");
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
                                $dataname=$_SESSION['slothe'];
                                $nameh=  $_SESSION['usernam'];
                        
                                $ret33=mysqli_query($con,"SELECT * from vehicle_info where RegistrationNumber='$vehreno' and Status=' ' ");       
                                $row33=mysqli_fetch_array($ret33);
                        
                                $check=$row33['Regular'];
                                if($check=="Monthly")
                                {
                                    $parkingcharge=0;
                                }
                             
                              
                        
                            
                                   //End second tech
                                  
                                         ?>

                                    <input type="text" class="form-control" value="<?php echo $parkingcharge; ?>"
                                        id="parkingcharge" name="parkingcharge" readonly>

                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required="true">
                                        <option value="Out">Outgoing Vehicle</option>
                                    </select>
                                </div>


                                <?php } ?>

                                <button type="submit" class="btn btn-success" name="submit-in">Submit For
                                    Out-Going</button>
                                <button type="reset" class="btn btn-default">Reset</button>

                        </div> <!--  col-md-12 ends -->


                    </div>
                </div>
            </div>



        </div>
        <!--/.row-->




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

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

</body>

</html>

<?php }  ?>