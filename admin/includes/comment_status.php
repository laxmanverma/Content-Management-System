<?php
@session_start();
	if(!isset($_SESSION['user_name'])){
		
		echo "<script>window.open('../login.php?not_authorize=You are not authorize to access!','_self')</script>";
		
		}
	else{
?>
<?php
	include("database.php");

		if(isset($_GET['unapprove'])){
			$unapprove_id = $_GET['unapprove'];
			$unapprove_comment = "update comments set status='unapprove' where comment_id='$unapprove_id'";
			
			$run_unapprove_comment = mysql_query($unapprove_comment);
			echo "<script>alert('Comment has been unapproved')</script>";
			echo "<script>window.open('index.php?view_comments','_self')</script>";
			}
			
		if(isset($_GET['approve'])){
			$approve_id = $_GET['approve'];
			$approve_comment = "update comments set status='approve' where comment_id='$approve_id'";
			
			$run_approve_comment = mysql_query($approve_comment);
			echo "<script>alert('Comment has been approved')</script>";
			echo "<script>window.open('index.php?view_comments','_self')</script>";
			}
			
?>
<?php } ?>