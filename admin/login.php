<?php
session_start();                 //must start in the begning
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="style_login.css" media="all" />

</head>

<body>
<h2 style="color:#FFF; text-align:center;"><?php echo @$_GET['not_authorize']; ?></h2>

	<div class="login">
  		<div class="login-triangle"></div>
  
  			<h2 class="login-header">Admin Login</h2>

 		 	<form method="post" action="login.php" class="login-container">
    			<p><input type="text" name="user_name" placeholder="Username" required="required"></p>
    			<p><input type="password" name="user_pass" placeholder="Password"></p>
    			<p><input type="submit" name="login" value="Log in"></p>
  			</form>
	</div>
    
</body>
</html>

<?php
include("includes/database.php");
	if(isset($_POST['login'])){
		$user_name = mysql_real_escape_string($_POST['user_name']);
		$user_pass = mysql_real_escape_string($_POST['user_pass']);
		
		//$encrypt = md5($user_pass);            google it
		
		$select_user = "select * from users where user_name='$user_name' AND user_password='$user_pass'";
		
		$run_user = mysql_query($select_user);
		
		if(mysql_num_rows($run_user)>0){
			
			$_SESSION['user_name']=$user_name;
			
			echo "<script>window.open('index.php?logged=You have successfully Logged In!','_self')</script>";
			}
		else{
			echo "<script>alert('username or password is incorrect')</script>";
			}
	}
?>