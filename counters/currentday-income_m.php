<?php
       session_start();
    include './includes/dbconn.php';
    $dataname=$_SESSION['slothe'];
    if($dataname=='vehicle_info')
		{
			$newdatah ='monthly_pass';
		 
		}
		else
		{
			$newdatah='monthly_pass_2';
			
		}
    $sql = "SELECT SUM(Charge) FROM $newdatah WHERE FromDate >= CURDATE() AND FromDate < CURDATE() + INTERVAL 1 DAY";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM(Charge)'];
 ?>