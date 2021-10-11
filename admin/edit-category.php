<?php
session_start();
include('includes/config.php');
if(isset($_POST["edit"])){
	$cid=$_REQUEST["cid"];
	$c_name=$_REQUEST["category_name"];
	$sql="UPDATE category SET cat_name='$c_name' WHERE cid=$cid";
	$result = mysqli_query($link,$sql);
	if($result){
		$_SESSION['success']="Category succesfully updated";
	  
		
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
						<h2 class="page-title">Change category name</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
									


										<form method="post" name="chngpwd" class="form-horizontal" >	
<?php
include('includes/config.php');
if(isset($_GET['cid'])){
$cid=mysqli_real_escape_string($link,$_GET['cid']);           
$sql_query="SELECT * from category where cid=$cid" ;
$result=mysqli_query($link,$sql_query) or die( mysqli_error($link));
	while($rows=mysqli_fetch_array($result)){
	
?>						
											<div class="form-group">
												<label class="col-sm-4 control-label">Category Name</label>
												<div class="col-sm-8">
                                               
													<input type="text" class="form-control" name="category_name" value="<?php echo $rows['cat_name']; ?>"  required>
												
												</div>
											</div>

											<div class="hr-dashed"></div>
<?php 
	} }
?>											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								                
													<button class="btn btn-primary" name="edit" type="submit" style="background-color: darkorange; width: 80px; font-size:13px;">Submit</button>
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
