<?php
session_start();
include('includes/config.php');
if (isset($_POST['update'])) {
    $pid=$_GET['imgid'];
    if(isset($_FILES["img1"]["name"]))
    {
        $product_picture = $_FILES["img1"]["name"];
        $sql = "UPDATE products Set photo='$product_picture' Where pid=$pid";
        $target_dir = "img/items/";
        $target_file = $target_dir . basename($_FILES["img1"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["img1"]["tmp_name"],$target_file);
        $res=mysqli_query($link,$sql);
        if($res)
        {
            $_SESSION['success']="Photo successfully updated !";
        }
      
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
<style> 
#xhb{
outline: none;	
background-color: darkorange; 
width: 100px; 
font-size:13px;
}
</style>
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
						<h2 class="page-title">Product Image </h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
         

<div class="form-group">
												<label class="col-sm-4 control-label">Current Image</label>
<?php 
include('includes/config.php');
$pid=intval($_GET['imgid']);
$sql ="SELECT photo from products where pid=$pid";
$query=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($query)){
?>
<div class="col-sm-8">
<img src="img/items/<?php echo htmlentities($row['photo']);?>" width="300" height="200" style="border:solid 1px #000">
</div>
<?php }?>
</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image <span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="img1" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="update" type="submit" id="xhb">Update</button>
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
