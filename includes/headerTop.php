<?php
include('includes/db.php');
if(isset($_POST['save'])){
  $name=$_POST['name'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $user_id=$_SESSION['user_id'];
  $sql="UPDATE users SET full_name='$name',username='$username', email='$email' WHERE id=$user_id";
  $res=mysqli_query($link,$sql);
  if($res){
    $_SESSION['success']="UPDATED !";
  }
}
?>
<?php
 if(isset($_POST['update'])){
   $old =md5($_POST['old']);
   $new  =$_POST['new'];
   $retype  =$_POST['retype'];
   $user_id=$_SESSION['user_id'];
   $_SESSION['old'] = $old;
   $_SESSION['new'] = $new;
   $_SESSION['retype'] = $retype;
   $sql = "SELECT * FROM users WHERE id =$user_id";
   $query = mysqli_query($link,$sql);
   $row = mysqli_fetch_array($query);

   if(md5($old)==md5($row['password'])){    //  check old pass
     if($new == $retype){                 //now check new with confirm
       $password = md5($new);            //now i encrypt retyped pass
       $sql = "UPDATE users SET password = '$password' WHERE id =$user_id";
       if(mysqli_query($link,$sql)){
         $_SESSION['success'] = "Password updated successfully";
         //unset our session since no error occured
         unset($_SESSION['old']);
         unset($_SESSION['new']);
         unset($_SESSION['retype']);
       }
       else{
         $_SESSION['error'] = "Error happened !";
       }
     }
     else{
       $_SESSION['error'] = "New and retype password did not match !";
     }
   }
   else{
     $_SESSION['error'] = "Incorrect Old Password !";
   }
 }
 ?>

 
<DOCTYPE html>
<html>
<head>
	</head>
	<body>
<div class="header_top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="contactinfo">
					<ul class="nav nav-pills">
						<li>
							<a href="#"><i class="fa fa-phone"></i> +355 6465256</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> jessy@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
		</div>
	</div>
</div>
<div class="header-middle">
			<div class="container">      
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="#"><img src="admin/img/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="mainmenu clearfix pull-right">					
							<ul class="nav navbar-nav"><br>
							<li><a href="cart.php"> <i class="fa fa-shopping-cart"></i> Cart </a></li>						
<?php
include('includes/db.php');
if(isset($_SESSION['loggedin'])){                
?>
						  <li class="dropdown"><a href="userProfile.php"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['name']; ?></a>
              <ul  class="sub-menu">
                <li><a href="userProfile.php">My Account </a></li>                                                                                 
								<li><a href="logout.php">Sign Out</a></li> 
                  </ul>
                </li>  
                <li><a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:20px" ></i> Sign out</a></li><!--log out if logged in-->
<?php  }  else   {    ?>
<li><a href="login.php"><i class="fa fa-lock"></i> Login | Register</a></li>
	<?php 
   }
	?>
							</ul><!--nav navbar-nav-->             
						</div>         
					</div>
				</div>
			</div>
		</div><!--/header-middle-->	
	</body>
</html>
		
		