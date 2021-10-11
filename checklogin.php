<?php
 session_start();
include('includes/db.php');
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	mysqli_real_escape_string($link, $email);
	mysqli_real_escape_string($link, $password);

	$password=md5($password);
	//$sql="SELECT * FROM login WHERE username='".$username."' AND password='".$password."'";
	$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{	
			if($row['role_id']==2)
			{
				$_SESSION['loggedin'] =true;
				$_SESSION['user_id']=$row['id'];
				$_SESSION['name']=$row['full_name'];
				$_SESSION['email']=$row['email'];
				if(!empty($_POST["remember"])) 
				{
					setcookie ("user_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60),'sameSite=None');

				    setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60),'sameSite=None');
				} else {

					if(isset($_COOKIE["user_login"])) {
	
						setcookie ("user_login","");
	
					}
					if(isset($_COOKIE["userpassword"])) {

						setcookie ("userpassword","");
	
					}
				}
				header("location:index.php");
				exit();

			}
			else
	            {
	                $_SESSION['admin']=$row['full_name'];
					$_SESSION['ad_id']=$row['id'];
					$_SESSION['role']=$row['role_id'];
		            header("location: admin/dashboard.php");
					exit();
	            }
				

		}

	}
	else
	{
		header("location:login.php?error=Invalid_Username_Or_Password");
		
		
	}
	
}
?>
