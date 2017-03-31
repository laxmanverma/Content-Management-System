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

<?php
include("database.php");
	if(isset($_GET['edit_cat'])){
		$edit_id = $_GET['edit_cat'];
		$get_cat = "select * from categories where cat_id='$edit_id'";
		$run_cat_new = mysql_query($get_cat);
		while($row_cat= mysql_fetch_array($run_cat_new)){
			$cat_id = $row_cat['cat_id'];
			$cat_title = $row_cat['cat_title'];
			}
		}
?>

<div align="center"> <br /> <br /><br /><br />
	
    <form action="" method="post">
    	
        <b>Update the Category:</b><input type="text" name="new_cat" value="<?php echo $cat_title; ?>" />
        <input type="submit" name="update_cat" value="Update Category" />
        
        
    </form>
</div>

<?php
include("database.php");
	if(isset($_POST['update_cat'])){
		
		$cat_title = $_POST['new_cat'];
		if($cat_title==''){
			echo "<script>alert('Please insert category name')</script>";
			echo "<script>window.open('index.php?insert_cat','_self')";
			}
		else{
			$update_cat = "update categories set cat_title='$cat_title' where cat_id='$cat_id'";
		
			$run_update = mysql_query($update_cat);
		
			echo "<script>alert('Category Updated!')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
		
		}
?>

</body>
</html>
<?php } ?>