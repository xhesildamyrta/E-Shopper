<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/links.php');?>
<body>
<header id="header"><!--header-->
<?php include('includes/headerTop.php');?>
	<section>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li> 
								<li><a href="shop.php" >All Products</a></li> 
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="search_box pull-right ">
							<form action="search.php" method="GET">
							<input type="text"  placeholder="Search" name="search_text" />
							</form>
						</div>
					</div>

				</div>
			</div>
		</div> <!--/header-bottom-->

		<div class="container">
			<div class="row">
				<?php include('categories.php');?>
			</div>
		</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
<?php 
if (isset($_GET['search_text'])) {
	$find=$_GET['search_text'];
}
include('includes/db.php');
$query="SELECT * FROM products WHERE name LIKE '%$find%' ";
$result=mysqli_query($link,$query);
$rows=mysqli_num_rows($result);

if($rows>0){
	echo '<div class="alert alert-info" role="alert">';
	echo $rows." result(s) found !";           
	echo '</div>';
while ($row=mysqli_fetch_array($result)) 
{	
?>
<div class="col-sm-4">
  	<div class="product-image-wrapper">
  		<div class="single-products">
  			<div class="productinfo text-center">
			  <a href="product-details.php?pid=<?php echo $row['pid'];?> ">
  					<img src="admin/img/items/<?php echo $row["photo"]; ?>"  alt="photo here"  style=" width: 200px; height: 180px;"/>
  				</a>
  				 <h4>$ <?php echo $row["price"];?> </h4>
  				 <h4> <?php echo $row["name"];?> </h4>
  				 <a href="cart.php?pid=<?php echo $row['pid'];?> " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
  				</div>
  			</div>
  		</div>
  	</div>
 <?php
}
}
else{
	echo '<div class="alert alert-danger" role="alert"> 0 results found </div>';
}
?>
            </div>
		</div>			
	</section>
	
	<!--/Footer-->
	<?php include('includes/footer.php'); ?>
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
