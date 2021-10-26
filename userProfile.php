<?php
session_start();
include('includes/db.php');
if(isset($_POST['save1'])){
  if(!empty($_POST['email'])){
  $name=$_POST['name'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $user_id=$_SESSION['user_id'];
  $sql="UPDATE users SET full_name='$name',username='$username', email='$email', address='$address' WHERE id=$user_id";
  $res=mysqli_query($link,$sql);
  if($res){
    $_SESSION['success']="Your profile details are successfully updated !";
  }
}
else{
  $_SESSION['error']="Be careful email empty not allowed .Neded for contact!";
}
  }
  elseif(isset($_POST['save2'])){
		$old =md5($_POST['old']);
		$new  =$_POST['new'];
		$retype  =$_POST['retype'];
		$user_id=$_SESSION['user_id'];
		$_SESSION['old'] = $old;
		$_SESSION['new'] = $new;
		$_SESSION['retype'] = $retype;
		$sql = "SELECT * FROM users WHERE id =$user_id";
		$query = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($query);

		if(md5($old)==md5($row['password'])){    //  check old pass
			if($new == $retype){                 //now check new with confirm
				$password = md5($new);            //now i encrypt retyped pass
				$sql = "UPDATE users SET password = '$password' WHERE id =$user_id";
				if(mysqli_query($link,$sql)){
					$_SESSION['success'] = "Password updated successfully";
					//unset our session since no error occured
					unset($_SESSION['old']);
					unset($_SESSION['new']);
					unset($_SESSION['retype']);
				}
				else{
					$_SESSION['error'] = "Error happened !";
				}
			}
			else{
				$_SESSION['error'] = "New and retype password did not match !";
			}
		}
		else{
			$_SESSION['error'] = "Incorrect Old Password !";
		}
	}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="admin/img/items/title.jpg" />
  	<title>E-Shopper</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/userStyle.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
      #xhb{
        width:120px;
        height:40px;
        border-radius: 5px;
      }
     #xhb:hover {background-color:orange;
      
    }
    #xhb:active {
  background-color: gray;
}
#tbl {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbl td, #tbl th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbl tr:nth-child(even){background-color: white;}

#tbl tr:hover {background-color: #f2f2f2;}

#tbl th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f2f2f2;
  
}
</style>
</head>
<body>
<!--extra from headerMiddle.php-->
<div class="container light-style flex-grow-1 container-p-y" >
  <table>
    <td>
    <div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img src="admin/img/logo.png" alt="logo.png" /></a>
						</div>
					</div>
        </div>
      </div>
    </div>
    </td>
  </table>
    <h4 class="font-weight-bold py-3 mb-4" style="color: darkorange;">
       My Account Settings
    </h4>
    <?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;" id="success-alert">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php
 
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;" id="success-alert">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>
<form  method="POST">
    <div class="card overflow-hidden" >
      <div class="row no-gutters row-bordered row-border-light" >
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links" >
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-my-booking">My Purchases</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
    <!--General-->
            <div class="tab-pane fade active show" id="account-general">
              <hr class="border-light m-0">
              <div class="card-body">
              <?php
                  include('includes/db.php');                 
                    $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'";
                    $query=mysqli_query($link,$sql);
                    while($row=mysqli_fetch_array($query)){
                  ?>  
                <div class="form-group">            
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $row['full_name'] ;?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ;?>">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" name="email" value="<?php echo $row['email'] ;?>">    
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <textarea rows="3"  name="address" style="background-color: white; border:solid 1px orange"><?php echo $row['address'] ;?></textarea>   
                </div>
                <?php }  ?>  
                <div class="text-right mt-3">
                  <button type="submit" class="btn btn-primary" id="xhb"><a href="index.php" style="color: white; text-decoration:none">Cancel</a></button>
                  <button type="submit" class="btn btn-primary" name="save1" id="xhb">Save</button>
                </div>
              </div>
            </div>
<!--change password-->
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control" name="old" >
                </div>

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control" name="new">
                </div>
                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control" name="retype">                
                </div>
                <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary" id="xhb"><a href="index.php" style="color: white; text-decoration:none">Cancel</a></button>
                  <button type="submit" class="btn btn-primary" name="save2" id="xhb">Save</button>
                </div>
              </div>
            </div>      
<!--My purchases-->
            <div class="tab-pane fade" id="account-my-booking">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Order History</label>        
                  <table  id="tbl">
                    <tr>
                      <th>Product</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                    <?php
                    include('includes/db.php');              
                    $sql = "SELECT p.photo,p.name,p.price,o.dateOfPurchase,o.quantity,o.total_amount FROM order_details o INNER JOIN products p ON(o.product_id=p.pid)
                    INNER JOIN users u ON(o.user_id=u.id) WHERE user_id='".$_SESSION['user_id']."'";
                    $query=mysqli_query($link,$sql);
                    while($row=mysqli_fetch_array($query)){
                  ?>
                    <tr>
                      <td><img src="admin/img/items/<?php echo $row['photo'];?>" style="width:70px; height:50px;"></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['dateOfPurchase'];?></td>
                      <td><?php echo $row['quantity'];?></td>
                      <td> <?php echo $row['price'];?></td>
                      <td><?php echo $row['total_amount'];?> </td>
                    </tr>
                    <?php } ?>
                  </table>
                  
                </div>
                <div class="text-right mt-3">
                  <button type="submit" class="btn btn-primary" id="xhb"><a href="index.php" style="color: white; text-decoration:none">Cancel</a></button>
                  <button type="submit" class="btn btn-primary" name="save3" id="xhb">Save</button>
                </div>
              </div>
            </div> 
   <!--my purchases-->   
          </div>
        </div>
      </div>
    </div>
</form>  
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(300);
});
		</script>
</body>
</html>
