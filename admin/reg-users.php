<?php
session_start();
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
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Registered Users</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Reg Users</div>
							<div class="panel-body">														
								<!--<div class="errorWrap"><strong>ERROR</strong>: </div>
			                     	<div class="succWrap"><strong>SUCCESS</strong>: </div>-->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
										<th> Name</th>
											<th>Username </th>
											<th>Email</th>
										<th>Role</th>
										<th>Password</th>
										<?php if($_SESSION['role']==1) echo"<th>Action</th>";?>
										</tr>
									</thead>
									<tbody>
<?php
include("includes/config.php");
$sql="SELECT * FROM users";
$query=mysqli_query($link,$sql);
$c=0;
while($row=mysqli_fetch_array($query))
{
	$c++;	
?>								
										<tr>
											<td><?php echo $c;?></td>
											<td><?php echo $row['full_name'];?></td>
											<td><?php echo $row['username'];?></td>
											<td><?php echo $row['email'];?></td>
											<?php 
											if($row['role_id']==1){
												$role="Administrator";
											}
											else if ($row['role_id']==2){
												$role="User";
											}
												else
												$role="SubAdmin";

											?>
	                                        <td><?php echo $role;?></td>
											<td><?php echo $row['password'];?></td>	
											<?php if(isset($_SESSION['role'])&& $_SESSION['role']==1&&$row['role_id']==1){?>							
											<td>				
												<a href="edit-admin.php?uid=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                												
											</td>
											<?php }else{ echo "<td> </td>";} ?>
                                            
											
																					
										</tr>
<?php } ?>	
										
									</tbody>
								</table>				
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
</body>
</html>
