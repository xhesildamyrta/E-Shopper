<?php
session_start();
include('includes/config.php');
if(isset($_POST['create']))
{
	$p_description=$_POST['description'];
	$p_rating=$_POST['rating'];
	$p_release=$_POST['release_year'];
	$p_price=$_POST['price'];
	$product_picture = $_FILES["img1"]["name"];
    $p_name=$_POST['prod_name'];
	$p_cat=$_POST['cat_id'];
	$p_subcat=$_POST['subcat_id'];
	$sql="INSERT INTO products(category_id,subcategory_id,description,rating,yearOfRelease,photo,price,name) VALUES($p_cat,$p_subcat,'$p_description',$p_rating,'$p_release','$product_picture',$p_price,'$p_name')";
	$target_dir = "img/items/";
        $target_file = $target_dir . basename($_FILES["img1"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["img1"]["tmp_name"],$target_file);
        $res=mysqli_query($link,$sql);
        if($res)
        {
            $_SESSION['success']="Product successfully created !";
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
									<div class="panel-heading"><h4>CREATE PRODUCT</h4></div>
									<div class="panel-body">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Product name<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="prod_name" class="form-control" value="" required>
</div>
</div>	
<div class="form-group">
<label class="col-sm-2 control-label">Photo<span style="color:red">*</span></label>
<div class="col-sm-3">
	<img src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" id="blah" style="height:200px;width:220px;"> <br><br>
	<input type="file" name="img1" enctype="multipart/form-data" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

</div>
<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea class="form-control" name="description" rows="7" required>     </textarea>
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Category <span style="color:red">*</span></label>
<div class="col-sm-3">
<select class="selectpicker" name="cat_id" required>
<option value=""> Select category </option>
<?php
include('includes/config.php');
$sql="SELECT * FROM category";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['cat_name']);?></option>
<?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">Subcategory<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="subcat_id" required>
<option value=""> Select subcategory </option>
<?php
include('includes/config.php');

$sql="SELECT * FROM subcategory s inner join category c ON(s.category_id=c.cid)";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo htmlentities($row['sid']);?>"> <?php echo htmlentities($row['sub_name']);?></option>
<?php

}
?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Price <span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="price" class="form-control" value="" required>
</div>
<label class="col-sm-2 control-label">Rating<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="rating" class="form-control" value=" " required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Release Year<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" name="release_year" class="form-control" value="" required>
</div>
<label class="col-sm-2 control-label">Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="brand" class="form-control" value="E-shopper" required>
</div>
</div>
<div class="hr-dashed"></div>

<div class="form-group">										
<div class="col-sm-8 col-sm-offset-8">
<a href="manage-products.php" > 
<buttom type="submit" class="btn btn-primary" name="cancel" id="xhb" >Cancel</buttom></a>
</a>
<button type="submit" class="btn btn-primary" name="create"  id="xhb">Create</button>
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
