
<?php
session_start();
require('includes/db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['register']))
{
        // removes backslashes
    $full_name=$_REQUEST['full_name'];
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($link,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($link,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($link,$password);

    $check_email_query="select * from users WHERE email='$email'";  
    $run_query=mysqli_query($link,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";  
echo "<script>window.open('login.php','_self')</script>";
exit();  
    } 
        $query = "INSERT into users (role_id,full_name,username,email, password)VALUES (2,' $full_name','$username', '$email', '".md5($password)." ')";
        $result = mysqli_query($link,$query);
        if($result)
        {
            $message="Success";
            header('Location:login.php');
            exit();
        }
    else{
        echo "<script>alert('Username $username is already exist in our database, Please try another one!')</script>"; 
        echo "<script>window.open('login.php','_self')</script>";
        
    }
}
?>