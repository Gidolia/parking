<?php
   
   
    $query=mysqli_query($con,"SELECT ID from  vehicle_info  where Status=''");
    $count_parkings=mysqli_num_rows($query);

    $total=$count_parkings;
    echo $total
 ?>