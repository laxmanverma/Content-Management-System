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
<!--for adding text editor-->
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});</script>
<!--text editor ends -->
<style type="text/css">
td, tr {padding:0px; margin:0px;}

</style>
</head>

<body>
	
    <?php
		include("database.php");
		if(isset($_GET['edit_post'])){
			
			$edit_id = $_GET['edit_post'];
			$select_post = "select * from posts where post_id='$edit_id'";
			$run_query = mysql_query($select_post);
			
			while($row_post=mysql_fetch_array($run_query)){
				
				$post_id = $row_post['post_id'];
				$title = $row_post['post_title'];
				$post_cat = $row_post['category_id'];
				$author = $row_post['post_author'];
				$keywords = $row_post['post_keywords'];
				$image = $row_post['post_image'];
				$content = $row_post['post_content'];
					
			}
		}
		
	?>
    
	<form action="" method="post" enctype="multipart/form-data">

		<table width="795" align="center" border="2" bgcolor="#66FF66">
        	
            <tr bgcolor="#66FF66">
            	<td colspan="6" align="center"><h1>Update this Post:</h1></td>
            </tr>
            
			<tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Title:</strong></td>
                <td><input type="text" name="post_title" size="60" value="<?php echo $title; ?>"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Category:</strong></td>
                <td>
                	<select name="cat">
                    
                    <?php
		
						$get_cats = "select * from categories where cat_id='$post_cat'";
		
						$run_cats = mysql_query($get_cats);
		
						while($cats_row=mysql_fetch_array($run_cats)){
			
							$cat_id=$cats_row['cat_id'];
							$cat_title=$cats_row['cat_title'];
			
							echo "<option value='$cat_id'>$cat_title</option>";
							
							$get_more_cats = "select * from categories";
							$run_more_cats = mysql_query($get_more_cats);
							while($row_more_cats=mysql_fetch_array($run_more_cats)){
								$cat_id=$row_more_cats['cat_id'];
								$cat_title=$row_more_cats['cat_title'];
			
								echo "<option value='$cat_id'>$cat_title</option>";
							}
						}
		
					?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Author:</strong></td>
                <td><input type="text" name="post_author" size="60" value="<?php echo $author; ?>"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Keywords:</strong></td>
                <td><input type="text" name="post_keywords" size="60" value="<?php echo $keywords; ?>"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Image:</strong></td>
                <td><input type="file" name="post_image" size="60" /><img src="news_images/<?php echo $image; ?>" width="60" height="60" /></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#66FF66"><strong>Post Content:</strong></td>
                <td><textarea name="post_content" rows="15" cols="40" ><?php echo $content; ?></textarea></td>
            </tr>
            
            <tr>
                <td colspan="6" align="center" bgcolor="#66FF66"><input type="submit" name="update" value="Update Now" /></td>
            </tr>

		</table>
	</form>
</body>
</html>

<?php
	if(isset($_POST['update'])) {
		
		 $update_id= $_GET['edit_post'];
		 $post_title = $_POST['post_title'];
		 $post_date = date('m-d-y');
		 $post_cat1 = $_POST['cat'];
		 $post_author = $_POST['post_author'];
		 $post_keywords = $_POST['post_keywords'];
		 $post_image = $_FILES['post_image']['name'];
		 $post_image_tmp = $_FILES['post_image']['tmp_name'];
		 $post_content = $_POST['post_content'];
		 
		if($post_title=='' OR $post_cat=='null' OR $post_author=='' OR $post_keywords=='' OR $post_image=='' OR $post_content==''){
			 echo "<script>alert('Please fill in all fields')</script>";
			 exit();
			 }
		else{//this transfers the uploaded files and data into the database
			
			move_uploaded_file($post_image_tmp,"news_images/$post_image");
			
			$update_query = "UPDATE posts SET category_id='$post_cat1',post_title='$post_title',post_date='$post_date',post_author='$post_author',post_keywords='$post_keywords',  post_image='$post_image',post_content='$post_content' WHERE post_id='$update_id'";
			
			$run_update = mysql_query($update_query);
			

			echo "<script>alert('Post has been UPDATED!')</script>";
			//bring back to same page
			echo "<script>window.open('index.php?view_posts','_self')</script>";

						
			}
		 
	}
?>
<?php } ?>