<?php
    session_start();
    include './includes/dbconn.php';
    $dataname=$_SESSION['slothe'];
    $query=mysqli_query($con,"SELECT ID from  vehicle_info where Parkingplace='$dataname' And Status='Out'");
    $count_parkings=mysqli_num_rows($query);

    echo $count_parkings
 ?>