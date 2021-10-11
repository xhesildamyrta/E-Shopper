<?php
session_start();
 include('includes/config.php');
	if(isset($_POST['save2'])){
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