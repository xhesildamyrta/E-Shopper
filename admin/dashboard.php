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
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
	<?php 
	include('includes/config.php');
	$sql="SELECT id FROM users";
	$query=mysqli_query($link,$sql);
	$result=mysqli_num_rows($query);
	?>											

													<div class="stat-panel-number h1 "><?php echo $result?></div>
													<div class="stat-panel-title text-uppercase">Users</div>
												</div>
											</div>
											<a href="reg-users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
	<?php 
	include('includes/config.php');
	$sql="SELECT cid FROM category";
	$query=mysqli_query($link,$sql);
	$result=mysqli_num_rows($query);
	?>											
													<div class="stat-panel-number h1 "><?php echo $result?></div>
													<div class="stat-panel-title text-uppercase"> Categories</div>
												</div>
											</div>
											<a href="manage-categories.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
	<?php 
	include('includes/config.php');
	$sql="SELECT sid FROM subcategory";
	$query=mysqli_query($link,$sql);
	$result=mysqli_num_rows($query);
	?>
													<div class="stat-panel-number h1 "><?php echo $result?></div>
													<div class="stat-panel-title text-uppercase">Subcategories</div>
												</div>
											</div>
											<a href="manage-subcategories.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
	<?php 
	include('includes/config.php');
	$sql="SELECT * FROM products";
	$query=mysqli_query($link,$sql);
	$result=mysqli_num_rows($query);
	?>										
													<div class="stat-panel-number h1 "><?php echo $result?></div>
													<div class="stat-panel-title text-uppercase">Products</div>
												</div>
											</div>
											<a href="manage-products.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



<div class="row">
					<div class="col-md-12">				
						<div class="row">
							<div class="col-md-12">
								<div class="row">
<!--------------------------------------------------------------------->									
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?php 
	include('includes/config.php');
	$sql="SELECT * FROM order_details";
	$query=mysqli_query($link,$sql);
	$result=mysqli_num_rows($query);
	?>
													<div class="stat-panel-number h1 "><?php echo $result;?></div>
													<div class="stat-panel-title text-uppercase">Orders</div>
												
												</div>
											</div>
											<a href="manage-orders.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

<!--------------------------------------------------------------------->
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">												
													<div class="stat-panel-number h1 ">Not done</div>
													<div class="stat-panel-title text-uppercase">Emails</div>
												</div>
											</div>
											<a href=" " class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<!--------------------------------------------------------------------->									
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

													<div class="stat-panel-number h1 ">Not done</div>
													<div class="stat-panel-title text-uppercase">ec moo</div>
												</div>
											</div>
											<a href=" " class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<!--------------------------------------------------------------------->	

                                    <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">									
													<div class="stat-panel-number h1 ">Not done</div>
													<div class="stat-panel-title text-uppercase">Products</div>
												</div>
											</div>
											<a href="manage-products.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<!--------------------------------------------------------------------->
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
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
