<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:index.php");
}
elseif(isset($_SESSION['admin']))
{
?>
<div class="brand clearfix" >
	<a href="dashboard.php" style="font-size: 20px; color: darkorange;">E-shopper | Admin Panel</a>  
		<span class="menu-btn" ><i class="fa fa-bars"></i></span>		
		<ul class="ts-profile-nav" >
			<li class="ts-account" >
				<a href="#"><img src="img/avatar.jpg" class="ts-avatar hidden-side" alt="" style="width: 25px;"><?php echo $_SESSION['admin'];?>  <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Change Password</a></li>
					<li><a href="../logout.php">Logout</a></li>
					
				</ul>
			</li>
		</ul>
	</div>
	<?php
}
?>
