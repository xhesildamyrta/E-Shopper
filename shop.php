<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
<?php include('includes/links.php');?>
	</head>
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
						<h2 class="title text-center">Features Items</h2>
		


<?php
include('includes/db.php');
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 6;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM products ");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($link,"SELECT * FROM products LIMIT $offset, $total_records_per_page");
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

<br>

<ul class="pagination" style="margin-left: 200px;" >
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
</li>

<?php 
	if ($total_no_of_pages <= 6){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 6){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
							
    </ul>				
					</div><!--features_items-->
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