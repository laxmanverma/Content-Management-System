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
        	<td colspan="8" align="center" bgcolor="#3399FF"><h2>Manage Comments here</h2></td>
        </tr>
        
        <tr>
        	<th>ID</th>
            <th>Comment</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    
    <?php
		include("includes/database.php");
		
		$get_comments = "select * from comments";
		$run_comments = mysql_query($get_comments);
		
		$i=1; //for showing post id from 1 to n starting from 1 otherwise it skips the deleted post id and directly shows the next number 
			  //eg. 1 2 3 5 4 is skipped because it is deleted. i is incrementing when it is printing
		
		while($row_comments = mysql_fetch_array($run_comments)){
			
			$comment_id = $row_comments['comment_id'];
			$comment_name = $row_comments['comment_name'];
			$comment_email = $row_comments['comment_email'];
			$comment_text = $row_comments['comment_text'];
			$status = $row_comments['status'];
			
	?>
        
        <tr align="center">
        	<td><?php echo $i++; ?></td>
            <td><?php echo $comment_text; ?></td>
            <td><?php echo $comment_name; ?></td>
            <td><?php echo $comment_email; ?></td>
            
            <td>
            	<?php
					if($status == 'approve'){
						echo "<a href='index.php?unapprove=$comment_id'>Unapprove</a>";
						}
					else{
						echo "<a href='index.php?approve=$comment_id'>Approve</a>";
						}

				?>
            </td>
            
            <td><a href="index.php?del_comment=<?php echo $comment_id; ?>">Delete</a></td>
        </tr>
        
        <?php } ?>
	</table>

</body>
</html>
<?php } ?>