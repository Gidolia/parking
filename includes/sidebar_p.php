<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">P-Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<!-- <form role="search" action="search-results.php" name="search" method="POST" enctype="multipart/form-data">

			

			<div class="form-group">
				<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Search Vehicle-Reg">
			</div>

		</form> -->
		<ul class="nav menu">
			<li class="<?php if($page=="dashboard_p") {echo "active";}?>"><a href="dashboard_p.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?php if($page=="adminpannel_p") {echo "active";}?>"><a href="adminpannel_p.php"><em class="	fa fa-adn">&nbsp;</em> Admin Pannel</a></li>	
			<li class="<?php if($page=="show-admin_p") {echo "active";}?>"><a href="show-admin_p.php"><em class="
fa fa-address-book">&nbsp;</em> Show Admin</a></li>	
			
			<li class="<?php if($page=="manage-vehicles_p") {echo "active";}?>"><a href="manage-vehicles_p.php"><em class="fa fa-car">&nbsp;</em> Vehicle Entry</a></li>
			<li class="<?php if($page=="in-vehicle_p") {echo "active";}?>"><a href="in-vehicles_p.php"><em class="fa fa-toggle-on">&nbsp;</em> IN Vehicles</a></li>
            <li class="<?php if($page=="out-vehicle_p") {echo "active";}?>"><a href="out-vehicles_p.php"><em class="fa fa-toggle-off">&nbsp;</em> OUT Vehicles</a></li>
			<li class="<?php if($page=="monthly-pass_p") {echo "active";}?>"><a href="monthlypass_p.php"><em class="fa fa-address-card-o ">&nbsp;</em> Monthly Pass</a></li>
			<li class="<?php if($page=="activepass_p") {echo "active";}?>"><a href="activepass_p.php"><em class="fa fa-address-card ">&nbsp;</em> Active Pass</a></li>
			<li class="<?php if($page=="reports_p") {echo "active";}?>"><a href="reports_p.php"><em class="fa fa-file">&nbsp;</em> View Reports</a></li>
			<!-- <li class="<?php if($page=="about") {echo "active";}?>"><a href="about.php"><em class="fa fa-info">&nbsp;</em> About Page</a></li> -->

			<li class="<?php if($page=="request") {echo "active";}?>"><a href="request.php"><em class="glyphicon glyphicon-map-marker">&nbsp;</em>Parking Request</a></li>
			
		</ul>
		
	</div>