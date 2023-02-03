<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else{

    if(isset($_POST['submit-category']))
    {
        $comname=$_POST['Comname'];
        $slothe=$_POST['Slothe'];
        $tworate=$_POST['Tworate'];
        $threerate=$_POST['Threerate'];
        $fourrate=$_POST['Fourrate'];
        
        $query=mysqli_query($con, "INSERT into vcategory(Databaseh,CompanyName,TwoWheeler,ThreeWheeler,FourWheeler) value('$slothe','$comname','$tworate','$threerate','$fourrate')");
        if($query>0) {
        $msg="Category has been added";
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
    <?php include 'includes/navigation.php' ?>

    <?php
		$page="vehicle-category";
		include 'includes/sidebar.php'
		?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
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
                    <div class="panel-heading">Add New Vehicle Category</div>
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
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name" id="Comname"
                                        name="Comname" required>
                                </div>

                                <div class="form-group">
                                    <label>Parking Place</label>
                                    <select class="form-control" id="Slothe" name="Slothe">

                                        <option value="vehicle_info">vehicle_info</option>
                                        <option value="parking_2">parking_2</option>
                                        <option value="parking_3">parking_3</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Two Wheeler Rate</label>
                                    <input type="number" class="form-control" placeholder="Enter Rate" id="Tworate"
                                        name="Tworate" required>

                                </div>
                                <div class="form-group">
                                    <label>Three Wheeler Rate</label>
                                    <input type="number" class="form-control" placeholder="Enter Rate" id="Threerate"
                                        name="Threerate" required>
                                </div>

                                <div class="form-group">
                                    <label>Four Wheeler Rate</label>
                                    <input type="number" class="form-control" placeholder="Enter Rate" id="Fourrate"
                                        name="Fourrate" required>
                                </div>



                                <button type="submit" class="btn btn-success" name="submit-category">Submit</button>
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