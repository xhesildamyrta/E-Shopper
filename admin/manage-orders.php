<?php
session_start();
 include('includes/config.php');
 if(isset($_REQUEST["del"])){
 $order_id=$_REQUEST["del"];
 $sql = "DELETE FROM order_details  WHERE order_id=$order_id";
 $result=mysqli_query($link,$sql);
 if($result){
	 $_SESSION['success']="Order deleted";
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
					if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-info text-center" id="success-alert">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>
						<h2 class="page-title">Manage Orders</h2>
						

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Order Details</div>
							<div class="panel-body">
							<!--<div class="errorWrap"><strong>ERROR</strong>:</div>
			<div class="succWrap"><strong>SUCCESS</strong>: </div>-->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Buyer</th>
											<th>Product </th>
											<th>Qty </th>
											<th>Price </th>
                                            <th>Total Price </th>
											<th>Order Date </th>
											<th>Delivery Address</th>
                                            <th>Action </th>
										</tr>
									</thead>
									<tbody>
<?php
include("includes/config.php");
$sql="SELECT u.full_name,u.address, p.photo,p.name,p.price,o.order_id, o.dateOfPurchase,o.quantity,o.total_amount  FROM order_details o INNER JOIN users u ON(o.user_id=u.id)
      INNER JOIN products p ON(o.product_id=p.pid)";
$query=mysqli_query($link,$sql);
$c=0;
while($row=mysqli_fetch_array($query))
{
	$c++;	
?>
										<tr>
											<td><?php echo $c;?></td>
                                            <td><?php echo $row['full_name'];?></td>	
                                            <td><?php echo $row['name'];?></td>	
											<td><?php echo $row['quantity'];?></td>	
											<td><?php echo $row['price'];?></td>
											<td><?php echo $row['total_amount'];?></td>	
											<td><?php echo $row['dateOfPurchase'];?></td>	
											<td><?php echo $row['address'];?></td>										
		                                    <td><a href="manage-orders.php?del=<?php echo $row['order_id']; ?>"><i class="fa fa-close"></i></a></td>	
										</tr>
										<?php }
										 ?>	
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
<?php
