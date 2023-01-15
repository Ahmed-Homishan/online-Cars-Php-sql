<?php 
if(isset($_COOKIE['maxwheelsu'])){  
    $auth["user"] =json_decode($_COOKIE['maxwheelsu'],true);
}
?>
<div class="brand clearfix">
	<a href="index.php" style="font-size: 20px; color:white;padding:2rem;position:absolute;top:-0.8rem;">Max Wheels | Admin Panel</a>  
	<span class="menu-btn"><i class="fa fa-bars"></i></span>
	<ul class="ts-profile-nav">
		
		<li class="ts-account">
			<div class="profile" style="width:5rem;height:5rem; padding:10px; margin-top:2px;">
				<img src="../image/user.png"style="width:3rem;height:3rem;" alt="">
			</div>
			<ul>
				<li><a href="change-password.php">Change Password</a></li>
				<li><a href="logout.php" onclick="return confirm('Do you want to leave ..?');">Logout</a></li>
			</ul>
		</li>
	</ul>
</div>
