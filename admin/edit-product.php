<?php
session_start();
include('includes/config.php');
if(isset($_POST["edit"])){
	$pid=$_REQUEST["pid"];
	$p_description=$_POST["description"];
	$p_rating=$_POST["rating"];
	$p_rel=$_POST["release_year"];
	$p_price=$_POST["price"];
	$p_name=$_POST["prod_name"];
	if(isset($_FILES["img1"]["name"]))
	{
	$product_picture = $_FILES["img1"]["name"];
	$sql="UPDATE products SET description='$p_description',rating=$p_rating,yearOfRelease='$p_rel',photo='$product_picture',price=$p_price,name='$p_name' WHERE pid=$pid";
	$target_dir = "img/items/";
	$target_file = $target_dir . basename($_FILES["img1"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	move_uploaded_file($_FILES["img1"]["tmp_name"],$target_file);
	}
	else{
		$sql="UPDATE products SET description='$p_description',rating=$p_rating,yearOfRelease='$p_rel',price=$p_price,name='$p_name' WHERE pid=$pid";

	}
	$res=mysqli_query($link,$sql);
        if($res)
        {
            $_SESSION['success']="Product successfully updated !";
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
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
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
									<div class="panel-heading"><h4>EDIT PRODUCT</h4></div>
									<div class="panel-body"><!--9-->
<?php

include('includes/config.php');
if(isset($_GET['pid'])){
$pid=mysqli_real_escape_string($link,$_GET['pid']);           
$sql_query="SELECT * from products where pid=$pid" ;
$result=mysqli_query($link,$sql_query) or die( mysqli_error($link));
	while($rows=mysqli_fetch_array($result)){
	
?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Product name<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="prod_name" class="form-control" value="<?php echo $rows['name'];?>" required>
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label"><a href="changeimage.php?imgid=<?php echo htmlentities($rows['pid'])?>">Change Image </a><span style="color:red">*</span></label>

<div class="col-sm-3">

<img src="img/items/<?php echo $rows['photo'];?>" style="width: 200px;" id="blah"><br><br>
<input type="file" name="img1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
</div>

<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea class="form-control" name="description" rows="7" required><?php echo $rows['description'];?>     </textarea>
</div>
</div>

<div class="hr-dashed"></div>

<div class="form-group">
<label class="col-sm-2 control-label">Price <span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="price" class="form-control" value=" <?php echo $rows['price'];?>" required >
</div>
<label class="col-sm-2 control-label">Rating<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="rating" class="form-control" value="<?php echo $rows['rating'];?> " required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Release Year<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="release_year" class="form-control" value="<?php echo $rows['yearOfRelease'];?>" required>
</div>
<?php }	 }?>	
<label class="col-sm-2 control-label">Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="brand" class="form-control" value="E-shopper" required>
</div>
</div>

<div class="hr-dashed"></div>	
<div class="form-group">											
<div class="col-sm-8 col-sm-offset-8">
<a href="dashboard.php"> 
<button type="submit" class="btn btn-primary" name="cancel"  id="xhb">Cancel</button>
</a>
<button type="submit" class="btn btn-primary" name="edit"  id="xhb">Save</button>
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
