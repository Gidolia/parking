<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">User</div>
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
			<li><a href="index.php"><em class="fa fa-university">&nbsp;</em>Home</a></li>
			<li class="<?php if($page=="profile") {echo "active";}?>"><a href="userpannel.php"><em class="fa fa-dashboard">&nbsp;</em> Profile</a></li>
			<li class="<?php if($page=="bookslot") {echo "active";}?>"><a href="bookslot.php"><em class="fa fa-adn">&nbsp;</em> Add Slot Booking</a></li>	
			<li class="<?php if($page=="present") {echo "active";}?>"><a href="present_status.php"><em class="fa fa-check">&nbsp;</em>Current Status</a></li>	
			<li class="<?php if($page=="curr_status") {echo "active";}?>"><a href="curr_status.php"><em class="fa fa-bell">&nbsp;</em>Pending Request</a></li>	
			<li class="<?php if($page=="show_status") {echo "active";}?>"><a href="show_status.php"><em class="fa fa-address-book">&nbsp;</em>Booking History</a></li>	
			<li><a href="login.php"><em class="fa fa-lock">&nbsp;</em>Logout</a></li>	
			
		
			
		</ul>
		
	</div><!--/.sidebar-->