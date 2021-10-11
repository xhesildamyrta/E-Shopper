<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
		{	
			if($row['role_id']==1)
			{
                $_SESSION['admin']=$row['full_name'];
				$_SESSION['ad_id']=$row['id'];
                header("location: dashboard.php");
                exit();
}
}
}
 else{
  
  echo "<script>alert('Invalid Details');</script>";

}
}



?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/title.jpg" />
	<title>E-Shopper</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/log-img.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Email </label>
									<input type="email" placeholder="Email Address" name="email" required="required"  class="form-control mb"/> 

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

								

									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
						<div class="text-center text-light" style="font-size: 17px;">
							<a href="#" class="text-light">Forgot password?</a> &nbsp;&nbsp;&nbsp;|&nbsp; &nbsp;&nbsp;
							<a href="../index.php"  class="text-light">Go to users dashboard</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>