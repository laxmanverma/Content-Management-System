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
<style type="text/css">
	th,td,tr,table{padding:0; margin:0;}
	th{ border:2px solid #333;}
	td{border-left:2px solid #999;}
	h2{padding:10px;}
</style>
</head>

<body>

	<table align="center" bgcolor="#FF66FF" width="780">
    	<tr>
        	<td colspan="8" align="center" bgcolor="#3399FF"><h2>View all categories here</h2></td>
        </tr>
        
        <tr>
        	<th>ID</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    
    <?php
		include("includes/database.php");
		
		$get_cats = "select * from categories";
		$run_cats = mysql_query($get_cats);
		
		$i=1; //for showing post id from 1 to n starting from 1 otherwise it skips the deleted post id and directly shows the next number 
			  //eg. 1 2 3 5 4 is skipped because it is deleted. i is incrementing when it is printing
		
		while($row_cats = mysql_fetch_array($run_cats)){
			
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];
			
			
	?>
        
        <tr align="center">
        	<td><?php echo $i++; ?></td>
            <td><?php echo $cat_title; ?></td>
            
            <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
            <td><a href="index.php?view_cats&&delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
        </tr>
        
        <?php } ?>
	</table>
    
    <?php
		if(isset($_GET['delete_cat'])){
			$delete_id = $_GET['delete_cat'];
			$delete_cat = "delete from categories where cat_id='$delete_id'";
			
			$run_delete = mysql_query($delete_cat);
			echo "<script>alert('A Category was Deleted')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
			}
	?>

</body>
</html>
<?php } ?>