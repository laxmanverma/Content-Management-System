<?php
@session_start();
	if(!isset($_SESSION['user_name'])){
		
		echo "<script>window.open('../login.php?not_authorize=You are not authorize to access!','_self')</script>";
		
		}
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center"> <br /> <br /><br /><br />
	
    <form action="index.php?insert_cat" method="post">
    	
        <b>Insert New Category:</b><input type="text" name="new_cat" />
        <input type="submit" name="insert_cat" value="Insert Category Now" />
        
        
    </form>
</div>

<?php
include("database.php");
	if(isset($_POST['insert_cat'])){
		
		$cat_title = $_POST['new_cat'];
		if($cat_title==''){
			echo "<script>alert('Please insert category name')</script>";
			echo "<script>window.open('index.php?insert_cat','_self')";
			}
		else{
			$insert_cat = "insert into categories (cat_title) values('$cat_title')";
		
			$run_cat = mysql_query($insert_cat);
		
			echo "<script>alert('New Category Added')</script>";
			echo "<script>window.open('index.php?insert_cat','_self')</script>";
		}
		
		}
?>

</body>
</html>
<?php } ?>