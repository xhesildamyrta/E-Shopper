<?php
session_start();
 include('includes/config.php');
 if(isset($_REQUEST["del"])){
 $pid=$_REQUEST["del"];
 $sql = "DELETE FROM products  WHERE pid=$pid";
 $result=mysqli_query($link,$sql);
 if($result){
	 $_SESSION['success']="Product succesfully deleted";
 }
 mysqli_close($link);
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
					if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-info text-center" id="success-alert">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>
						<h2 class="page-title">Manage Products</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Listed  Products</div>
							<div class="panel-body">
							<!--<div class="errorWrap"><strong>ERROR</strong>: </div>
				            <div class="succWrap"><strong>SUCCESS</strong>: </div>-->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                            <th>Photo</th>
											<th>Name</th>
											<th>Description</th>
                                            <th>Price</th>
                                            <th>Rating</th>
                                            <th>Release</th>
                                            <th>Subcategory</th>
                                            <th>Category</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
<?php
include("includes/config.php");
$sql="SELECT * FROM products p  INNER JOIN category c ON(p.category_id=c.cid) INNER JOIN subcategory s ON(p.subcategory_id=s.sid) ";
$query=mysqli_query($link,$sql);
$c=0;
while($row=mysqli_fetch_array($query))
{
	$c++;	
?>    

									
										<tr>
                                            <td><?php echo $c;?></td>
                                            <td><img style="width: 60px; height:50px" src="img/items/<?php echo $row['photo'];?> "></td>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['price'];?></td>
											<td><?php echo $row['rating'];?></td>
                                            <td><?php echo $row['yearOfRelease'];?></td>
                                            <td><?php echo $row['sub_name'];?></td>
                                            <td><?php echo $row['cat_name'];?></td>                                           
<td><a href="edit-product.php?pid=<?php echo $row['pid'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-products.php?del=<?php echo $row['pid']; ?>"><i class="fa fa-close"></i></a></td>
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
	<script>
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(300);
});
		</script>
</body>
</html>

