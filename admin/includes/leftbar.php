	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			<?php
		$today=date("d-m-Y");
		?>
				<li class="ts-label"><?php echo $today;?></li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
<li><a href="#"><i class="fa fa-files-o"></i> Categories</a>
<ul>
<li><a href="create-category.php">Create Category</a></li>
<li><a href="manage-categories.php">Manage Categories</a></li>
</ul>
</li>

<li><a href="#"><i class="fa fa-files-o"></i> Subcategories</a>
<ul>
<li><a href="create-subcategory.php">Create Subcategory</a></li>
<li><a href="manage-subcategories.php">Manage Subcategories</a></li>
</ul>
</li>

<li><a href="#"><i class="fa fa-sitemap"></i> Items List</a>
					<ul>
						<li><a href="create-product.php">Create Item</a></li>
						<li><a href="manage-products.php">Manage items</a></li>
					</ul>
				</li>
				<li><a href="manage-orders.php"><i class="fa fa-users"></i> Manage Orders</a></li>
                <li><a href="reg-users.php"><i class="fa fa-users"></i> Reg Users</a></li>
				<li><a href=""><i class="fa fa-table"></i> Manage Emails</a></li>			    
			</ul>
		</nav>