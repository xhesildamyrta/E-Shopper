<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/links.php');?>
<body>
	<header id="header"><!--header-->
	<?php include('includes/headerTop.php');?>
	<?php include('includes/headerBottom.php') ?>
	<section>
		<div class="container">
			<div class="row">
				<?php include('categories.php') ?>
			</div>
		</div>
		<?php 
		include('includes/db.php');
		if(isset($_GET['pid'])) {
			$pid=mysqli_real_escape_string($link,$_GET['pid']);
			$sql_query="SELECT p.pid,p.photo,p.name,p.rating,p.description,p.price,s.sub_name from products p 
			INNER JOIN subcategory s ON(p.subcategory_id=s.sid) where pid=$pid" ;
			$result=mysqli_query($link,$sql_query) or die( mysqli_error($link));
			while($row=mysqli_fetch_array($result)){
			?>
			<div class="col-sm-9 padding-right">
			<form method="POSt" action="cart.php?action=add&pid=<?php echo $row['pid'];?>">
				<div class="col-sm-5">
					<div class="view-product">
						<img src="admin/img/items/<?php echo $row["photo"]; ?>" name="img" alt="photo_here" >
					</div>
				</div>
				<div class="col-sm-7">
					<div class="product-information" ><!--/product-information-->
					<h2> <?php echo $row["name"]; ?></h2>
					<p>Rating: <?php echo $row["rating"]; ?></p>
					<p>Description: <?php echo $row["description"]; ?></p>
					<span>
						<span>US <?php echo $row["price"]; ?></span>
						<label>Quantity:  </label>
						<input type="text" name="quantity" value="1" />						
						<input type="hidden" name="hidden_image" value="<?php echo $row["photo"]; ?>" >
			         	<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" >  
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" >
						<button type="submit" class="btn btn-fefault cart" name="add_to_cart">
							<i class="fa fa-shopping-cart"></i>Add to cart
						</button>
						
					</span>
					<p><b>Availability:</b> In Stock</p>
					<p><b>Category: <?php echo $row["sub_name"]; ?></p>
					<p><b>Brand:</b> E-SHOPPER</p>
				</div><!--/product-information-->				
			</div>
			</form>
		</div><!--/product-details-->
	<?php 
		} 
	}
	else {
		echo "No Records.";
	}
	?>
	</div>
</div>
</div>
</section>
<?php include('includes/footer.php'); ?>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>