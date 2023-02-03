<?php
    include './includes/dbconn.php';
    $query3=mysqli_query($con,"SELECT ID from vehicle_info");
    $count_parkings=mysqli_num_rows($query3);

    $query1=mysqli_query($con,"SELECT ID from parking_2");
    $count_parkings_1=mysqli_num_rows($query1);

    $total=$count_parkings+$count_parkings_1;
    echo $total
 ?>