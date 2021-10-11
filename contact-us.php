<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/links.php');?>
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<header id="header"><!--header-->
	<?php include('includes/headerTop.php');?>
	<?php include('includes/headerBottom.php') ?>
	<div id="contact-page" class="container">
		<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
					<h2 class="title text-center">Contact <strong>Us</strong></h2>
					<div id="gmap" class="contact-map"></div>
				</div>			 		
			</div>    	
			<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
						<div class="status alert alert-success" style="display: none"></div>
						<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
							<div class="form-group col-md-6">
								<input type="text" name="name" class="form-control" required="required" placeholder="Name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
				<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>Albania 3001 Unknown Street</p>
							<p>Tirana Alb</p>
							<p>Mobile: +355 67 34 567 </p>
							<p>Fax: 1-234-567-8910</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com/sklep.eshopper/"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://twitter.com/eshopperstv"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://play.google.com/store/apps/details?id=com.mcc.eshopper&hl=en&gl=US"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="https://www.youtube.com/watch?v=ErrDctrZUyk"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
</header>
<?php include('includes/footer.php'); ?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>