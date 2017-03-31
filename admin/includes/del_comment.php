<?php
@session_start();
	if(!isset($_SESSION['user_name'])){
		
		echo "<script>window.open('../login.php?not_authorize=You are not authorize to access!','_self')</script>";
		
		}
	else{
?>
<?php
	include("database.php");
		if(isset($_GET['del_comment'])){
			$delete_id = $_GET['del_comment'];
			$delete_comment = "delete from comments where comment_id='$delete_id'";
			
			$run_delete = mysql_query($delete_comment);
			echo "<script>alert('A Comment was Deleted')</script>";
			echo "<script>window.open('index.php?view_comments','_self')</script>";
			}
?>
<?php } ?>