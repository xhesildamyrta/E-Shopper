<?php   
 session_start();  

 ?>  
<!DOCTYPE html>
<html lang="en">
<?php include('includes/links.php');?>
<head>
<style>

</style>
</head>
<body>
	
<header id="header">
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
		</div>  <!--/header-bottom-->

		<div class="container">
			<div class="row">
			<?php include('categories.php');?>
			</div>
		</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->					
<?php
include('includes/db.php');
$sql = "SELECT * FROM products  order by name limit 6";
$result=mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
{
 ?>

<div class="col-sm-4">
  	<div class="product-image-wrapper">
	  <form method="POSt" action="cart.php?action=add&pid=<?php echo $row['pid'];?>">
  		<div class="single-products">
  			<div class="productinfo text-center">
  				<a href="product-details.php?pid=<?php echo $row['pid'];?> ">
  					<img src="admin/img/items/<?php echo $row["photo"]; ?>"  alt="photo here" style=" width: 200px; height: 180px;"/>
  				</a>
				<h4><?php echo $row["name"];?> </h4>
  				<h4>$ <?php echo $row["price"];?> </h4>
				<input type="hidden" name="hidden_image" value="<?php echo $row["photo"]; ?>" >
				<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" >  
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" > 
				<input type="hidden" name="quantity" class="form-control" value="1" />								 
				<a class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>
					<button type="submit"  name="add_to_cart" class="xh">Add to cart</button>
				</a>
			</div>
  		</div>
	  </form>
  	</div>
</div>
<?php
}
?>
<!--end of products-->
					</div>
				</div>			
	</section>
	<!--/Footer-->
	<!----------------------------------------------------------------------ekstra by me-------------------------->
	
		<?php include('includes/footer.php'); ?>
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
