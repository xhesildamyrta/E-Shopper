
<!DOCTYPE html>
<html >
<?php include('includes/links.php');?>
<body>
<header id="header">
<?php include('includes/headerTop.php');?>
	<section>
	<?php include('includes/headerBottom.php') ?>
		
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->						
						<h2>Login to your account</h2>
						<form action="checklogin.php" method="POST">
							<input type="email" placeholder="Email" name="email" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" required="required"/>
							<input type="password" placeholder="Password" name="password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>" required="required" />
							<span><input type="checkbox" class="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> /> Remember Me</span>
							<button type="submit" class="btn btn-default" name="submit">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="register.php" method="POST">
							
						<input type="text" placeholder="Full Name" name="full_name" required="required"/>
							<input type="text" placeholder="Username" name="username" required="required"/>
							<input type="email" placeholder="Email Address" name="email" required="required"/>
							<input type="password" placeholder="Password" name="password" required="required"/>
							<button type="submit" class="btn btn-default" name="register">Signup</button>
						</form>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script>
		window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
		</script>
</body>
</html>