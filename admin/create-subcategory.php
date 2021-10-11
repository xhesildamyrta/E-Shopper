<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$subcat=$_REQUEST['subcat'];
$p_cat=$_POST['category_id'];
	$p_catt = preg_replace('/[^0-9]/', '', $p_cat);
	$p_cat_id=(int)$p_catt;
$sql="INSERT INTO  subcategory(category_id,sub_name) VALUES($p_cat_id,'$subcat')";
$result = mysqli_query($link,$sql);

if($result)
{
	$_SESSION['success']="Subcategory succesfully created";
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
						<h2 class="page-title">Create Subcategory</h2>

						<div class="row" >
							<div class="col-md-10">
								<div class="panel panel-default" style="height: 350px;">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" >							
		
											<div class="form-group">
												<label class="col-sm-3 control-label">Subcategory Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="subcat"  required>
												</div>
											</div>
   	
                                            <div class="form-group">
												<label class="col-sm-3 control-label">Select Category</label>
												<div class="col-sm-8">
                                                
<select class="selectpicker" name="category_id" required>
<option value=""> Select </option>
<?php
include("includes/config.php");
$sql="SELECT * FROM category";
$query=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($query))
{
	
?>
    <option value="<?php echo $row['cid'];?>"><?php echo  $row['cid'];?>- <?php echo $row['cat_name'];?></option>
    
    <?php } ?>
</select>

												</div>
											</div>


											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-3">
													<button class="btn btn-primary" name="submit" type="submit" style="background-color: darkorange; 
                                                    width: 80px; font-size:13px;">Submit</button>
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
