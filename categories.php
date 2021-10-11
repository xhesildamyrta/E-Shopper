<!DOCTYPE html>
<html>
<head>
	<title>Hello, world!</title>
</head>
<body>
	<div class="col-sm-3">
		<div class="left-sidebar">
			<h2>Category</h2>
		<div class="category-products"  ><!--category-products-->
		<?php
		include('includes/db.php');
		$sql_cat = "SELECT * FROM category";
		$categories = mysqli_query($link, $sql_cat) or die( mysqli_error($link)); 
		$c=0;
		while($row = mysqli_fetch_array($categories)){
		$c++;
		?>
		<div class="panel panel-default">
			<div class="panel-heading"> <!--dont-->
			<h4 class="panel-title">
				<a  href="">
				<span class="badge pull-right"><i class="fa fa-plus" ></i></span>
				<?php echo $c."-"; ?>
				<?php echo $row['cat_name']; ?>
                </a>
			</h4>
		</div>
		<div><!--subcategories toogle-->
		<ul>                             
			<?php
			$sql_subcat = "SELECT * FROM subcategory WHERE category_id = ".$row['cid'] ;
			//$sql_subcat1="SELECT sub_name from subcategory s inner join category c ON(c.id=s.category_id) WHERE category_id = ".$row['id'];
			$subcategories = mysqli_query($link, $sql_subcat);
			while($row_result = mysqli_fetch_array($subcategories)) {
				?>
				<li >
					<a href="subcategories.php?sid=<?php echo $row_result['sid'];?>&subcategory=<?php echo $row_result['sub_name'];?>"><?php echo $row_result['sub_name'];?> </a>
				</li>
				<?php
			}
			?>
		</ul>
	    </div>
	</div>
<?php } ?>
</div><!--category-products-->
</body>
</html>