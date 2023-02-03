<?php
       session_start();
    include './includes/dbconn.php';
    $dataname=$_SESSION['slothe'];
    $sql = "SELECT SUM( ParkingCharge) FROM $dataname WHERE OutTime >= CURDATE() AND OutTime < CURDATE() + INTERVAL 1 DAY";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( ParkingCharge)'];
 ?>