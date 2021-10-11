<?php   
 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "e-shopper");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["pid"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["pid"], 
					 'item_image'            =>      $_POST["hidden_image"],
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],
					 'item_quantity'          =>     $_POST["quantity"]   
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
               $_SESSION['added']="Item Already Added";
              
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["pid"],  
				'item_image'            =>      $_POST["hidden_image"],
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],
				'item_quantity'          =>     $_POST["quantity"] 
          
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["pid"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 } 

    if(isset($_POST['order'])) {
	$user_id=$_SESSION['user_id'];
	 $pid=$_POST['pro_id'];
	 $quantity=$_POST['quantity'];
	 $price=$_POST['tot_price'];	 

	 $sql="INSERT INTO  order_details(user_id,product_id,dateOfPurchase,quantity,total_amount) VALUES($user_id,$pid,NOW(),$quantity,$price)";
$result = mysqli_query($connect,$sql);

if($result)
{
	$_SESSION['ordered']="Order placed";
}

 }
 ?>

<!DOCTYPE html>
<html >
	<head>
<?php include('includes/links.php');?>
<style>
#order-btn{
	background-color: #FFBF00; 
	width:150px;
	border-radius: 15px;
	font-weight: bold;
	font-style: italic;
}
#txt1{
	color: #00457C;

}
#txt2{
	color:  #0079C1;

}
	</style>
	</head>
<body>
	<header id="header"><!--header-->
	<?php include('includes/headerTop.php');?>
	<?php include('includes/headerBottom.php') ?>
	<section id="cart_items">
		<div class="container">
		<?php
				if(isset($_SESSION['ordered'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;" id="success-alert">
						<?php echo $_SESSION['ordered']; ?>
					</div>
					<?php
 
					unset($_SESSION['ordered']);
				}
			?>
			<div id="tbl" class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="quantity">Quantity</td>
							<td class="price">Price</td>
							<td class="total">Total</td>						
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
						  <form method="POST">
						<tr>
							<td class="cart_product">
							<input type="hidden" name="pro_date"  value="<?php echo date("d-m-Y");?>">
							<input type="hidden" name="pro_id" id="pid" value="<?php echo $values["item_id"];?>">
							
								<img src="admin/img/items/<?php echo $values['item_image'];?>" alt="" style="width:80px;">
							</td>
							<td class="cart_description">
								<h3 style="color:orange;"><?php echo $values["item_name"];?></h3>
								<input type="hidden" name="name" id="it_name" value="<?php echo $values["item_name"];?>">
							</td>
							<td class="cart_price">
								<p><?php echo $values["item_quantity"];?></p>
								<input type="hidden" name="quantity" id="quantity" value="<?php echo $values["item_quantity"];?>">
							</td>
							<td class="cart_price">
								<p><?php echo $values["item_price"]; ?></p>
								<input type="hidden"  id="price" value="<?php echo $values["item_price"];?>">
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
								<input type="hidden" name="tot_price" id="toltal_price" value="<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>">
							
							</td>
							<td class="cart_delete">
							<a href="cart.php?action=delete&pid=<?php echo $values["item_id"]; ?>"><span class="text-danger">X</span></a>							
							</td>
						</tr>
						<?php 
						      $total = $total + ($values["item_quantity"] * $values["item_price"]); 
							   }
							
							   ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Grand Total</td>
										<td> $ <?php echo number_format($total, 2); ?></td>
										<input type="hidden" id="sub_total_price" value="<?php echo number_format($total, 2); ?>">									
									</tr>
									<?php   }  ?>
								</table>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<?php 
							if(isset($_SESSION['loggedin'])&& !empty($_SESSION["shopping_cart"])){
							?>
							<td colspan="2" >
							<button type="submit" class="btn btn-fefault cart" name="order" id="order-btn"><span id="txt1">Cash On</span><span id="txt2"> Delivery</span></button>
								<div id="paypal-payment-button" style="width: 30px;"></div>
							</td>
						<?php } ?>
						</tr>
						  </form>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	</header>
	<?php include('includes/footer.php'); ?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script>
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(300);
});
		</script>
	<script src="https://www.paypal.com/sdk/js?client-id=Ac20AHpQSimWcuNOwlUHnGRkmdX2eNucXgjHwIz4VbS9GmKmxblvzIhiuZLuJ-0PGT3hbKPLZJtcKFr5&disable-funding=credit,card"></script>
	<script>
	paypal.Buttons({
    style : {      
        shape: 'pill',
		


    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: document.getElementById("sub_total_price").value
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("http://localhost/eshopper/success.php?pay='+order.id")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost/eshopper/cart.php")
    }
}).render('#paypal-payment-button');
</script>
</body>
</html>