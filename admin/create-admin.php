<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<link rel="shortcut icon" href="img/title.jpg" />
	<title>E-Shopper</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
#xhb{
outline: none;	
background-color: darkorange; 
width: 100px; 
font-size:13px;
}

		</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">	
<?php
include('includes/config.php');
if(isset($_POST['create'])){
    $name=$_POST['full_name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $sql="INSERT INTO users(role_id,full_name,username,email,password) VALUES(3,'$name', '$username', '$email', '$pass')";
  $res=mysqli_query($link,$sql);
  if($res){
    $_SESSION['success']="New administrator successfully created !";
  }
    
}
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;" id="success-alert">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>
            

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">New administrator</div>
									<div class="panel-body"><!--9-->
											<form method="POST"  class="form-horizontal" >	                                         						
															<div class="form-group">
																	<label  class="col-sm-4 control-label">Full Name</label>
																	<div class="col-sm-8">
																		<input type="text" class="form-control" name="full_name" placeholder="Enter full name" >
																	</div>
																</div>
																<div class="hr-dashed"></div>	
																<div class="form-group">
																	<label class="col-sm-4 control-label">Username</label>
																	<div class="col-sm-8">
																		<input type="text" class="form-control" name="username"  placeholder="Enter username">
																	</div>
																</div>
																<div class="hr-dashed"></div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Email</label>
																	<div class="col-sm-8">
																		<input type="email" class="form-control" name="email" placeholder="Enter email" required>
																	</div>
																</div> 
                                                                <div class="hr-dashed"></div>	
																<div class="form-group">
																	<label class="col-sm-4 control-label">Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" name="password"  placeholder="Enter password" required>
																	</div>
																</div>                                                             
																<div class="hr-dashed"></div>
																<div class="form-group">
																	<div class="col-sm-8 col-sm-offset-4">
													
																		<button class="btn btn-primary" name="create" type="submit" id="xhb">Save</button>
																	</div>
																</div>				
															</form>
									</div>
								</div>
							</div>
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
	<script>
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(300);
});
		</script>
</body>
</html>