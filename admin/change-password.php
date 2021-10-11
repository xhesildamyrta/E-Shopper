<?php
session_start();
 include('includes/config.php');
	if(isset($_POST['update'])){
		$old =md5($_POST['old']);
		$new  =$_POST['new'];
		$retype  =$_POST['retype'];
		$admin_id=$_SESSION['ad_id'];
		$_SESSION['old'] = $old;
		$_SESSION['new'] = $new;
		$_SESSION['retype'] = $retype;
		$sql = "SELECT * FROM users WHERE id =$admin_id";
		$query = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($query);

		if(md5($old)==md5($row['password'])){    //  check old pass
			if($new == $retype){                 //now check new with confirm
				$password = md5($new);            //now i encrypt retyped pass
				$sql = "UPDATE users SET password = '$password' WHERE id =$admin_id";
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
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
 
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
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;" id="success-alert">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php
 
					unset($_SESSION['error']);
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
									<div class="panel-heading">Form fields</div>
									<div class="panel-body"><!--9-->
											<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
										
																<div class="form-group">
																	<label  class="col-sm-4 control-label">Current Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" name="old" id="password" required>
																	</div>
																</div>
																<div class="hr-dashed"></div>
																
																<div class="form-group">
																	<label class="col-sm-4 control-label">New Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" name="new" id="newpassword" required>
																	</div>
																</div>
																<div class="hr-dashed"></div>
					
																<div class="form-group">
																	<label class="col-sm-4 control-label">Confirm Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" name="retype" id="confirmpassword" required>
																	</div>
																</div>
																<div class="hr-dashed"></div>
															
													
																
																<div class="form-group">
																	<div class="col-sm-8 col-sm-offset-4">
													
																		<button class="btn btn-primary" name="update" type="submit" id="xhb">Save</button>
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
