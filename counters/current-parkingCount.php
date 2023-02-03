<?php
    session_start();
    include './includes/dbconn.php';
    //Total Vehicle Entries
    $dataname=$_SESSION['slothe'];
    $query=mysqli_query($con,"SELECT ID from vehicle_info Where Parkingplace='$dataname'  and date(InTime)=CURDATE();");
    $count_parkings=mysqli_num_rows($query);

    echo $count_parkings
 ?>