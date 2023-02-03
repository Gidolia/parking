<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Vendor</div>
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
			<li class="<?php if($page=="dashboard_v") {echo "active";}?>"><a href="dashboard_v.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		
		
			<li class="<?php if($page=="manage-vehicles_v") {echo "active";}?>"><a href="manage-vehicles_v.php"><em class="fa fa-car">&nbsp;</em> Vehicle Entry</a></li>
			<li class="<?php if($page=="in-vehicle_v") {echo "active";}?>"><a href="in-vehicles_v.php"><em class="fa fa-toggle-on">&nbsp;</em> IN Vehicles</a></li>
            <li class="<?php if($page=="out-vehicle_v") {echo "active";}?>"><a href="out-vehicles_v.php"><em class="fa fa-toggle-off">&nbsp;</em> OUT Vehicles</a></li>
			<li class="<?php if($page=="monthly-pass_v") {echo "active";}?>"><a href="monthlypass_v.php"><em class="fa fa-address-card-o ">&nbsp;</em> Monthly Pass</a></li>
			<li class="<?php if($page=="activepass_v") {echo "active";}?>"><a href="activepass_v.php"><em class="fa fa-address-card ">&nbsp;</em> Active Pass</a></li>
			<li class="<?php if($page=="reports_v") {echo "active";}?>"><a href="reports_v.php"><em class="fa fa-file">&nbsp;</em> View Reports</a></li>
			
			
	
		</ul>
		
	</div><!--/.sidebar-->