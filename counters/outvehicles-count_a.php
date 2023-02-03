<?php
   
    include './includes/dbconn.php';
 
    $query=mysqli_query($con,"SELECT ID from  vehicle_info where Status='Out'");
    $count_parkings=mysqli_num_rows($query);


    $total=$count_parkings;
    echo $total
 ?>