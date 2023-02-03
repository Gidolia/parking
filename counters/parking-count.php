<?php
    session_start();
    include './includes/dbconn.php';
    $dataname=$_SESSION['slothe'];
    $query3=mysqli_query($con,"SELECT ID from vehicle_info Where Parkingplace='$dataname' ");
    $count_parkings=mysqli_num_rows($query3);

    echo $count_parkings
 ?>