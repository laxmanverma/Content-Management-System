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
	<form action="index.php?insert_post" method="post" enctype="multipart/form-data">

		<table width="795" align="center" border="2" bgcolor="#FF66FF">
        	
            <tr bgcolor="#0033FF">
            	<td colspan="6" align="center"><h1>Insert New Post:</h1></td>
            </tr>
            
			<tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Post Title:</strong></td>
                <td><input type="text" name="post_title" size="90" /></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Category:</strong></td>
                <td>
                	<select name="cat">
                    <option value="null">Select a Category</option>
                    <?php
		
						include("includes/database.php");
		
						$get_cats = "select * from categories";
		
						$run_cats = mysql_query($get_cats);
		
						while($cats_row=mysql_fetch_array($run_cats)){
			
							$cat_id=$cats_row['cat_id'];
							$cat_title=$cats_row['cat_title'];
			
							echo "<option value='$cat_id'>$cat_title</option>";
						}
		
					?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Post Author:</strong></td>
                <td><input type="text" name="post_author" size="90"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Keywords:</strong></td>
                <td><input type="text" name="post_keywords" size="90"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Post Image:</strong></td>
                <td><input type="file" name="post_image" size="60"/></td>
            </tr>
            
            <tr>
            	<td align="right" bgcolor="#FF66FF"><strong>Post Content:</strong></td>
                <td><textarea name="post_content" rows="15" cols="20" ></textarea></td>
            </tr>
            
            <tr>
                <td colspan="6" align="center" bgcolor="#FF66FF"><input type="submit" name="submit" value="Publish Now" /></td>
            </tr>

		</table>
	</form>
</body>
</html>

<?php
	if(isset($_POST['submit'])) {
		
		 $post_title = $_POST['post_title'];
		 $post_date = date('m-d-y');
		 $post_cat = $_POST['cat'];
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
			
			$insert_posts = "insert into posts (category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values('$post_cat','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";
			
			$run_posts = mysql_query($insert_posts);
			

			echo "<script>alert('Post has been PUBLISHED!')</script>";
			//bring back to same page
			echo "<script>window.open('index.php?insert_post','_self')</script>";

						
			}
		 
	}
?>
<?php } ?>