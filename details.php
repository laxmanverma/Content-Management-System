<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A news platform</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
<div class="container1">
<!--header starts here-->
	<div class="head">
    <a href="index.php"><img id="logo" src="images/logo.png"/></a>
    </div>
<!--header ends-->

<!--main container starts from here-->
<div class="container">

<!--navigation bar starts-->
    <?php include("includes/navbar.php"); ?>
<!--Navigation bar ends-->
<br /><br />
<!--content area start-->    
	<div class="post_area">
    
    	<?php
		
		if(isset($_GET['post'])){
			$post_id = $_GET['post'];
		
			$get_posts = "select * from posts where post_id=$post_id";
			$run_posts = mysql_query($get_posts);
			while ($row_posts = mysql_fetch_array($run_posts)){
				
				$post_title = $row_posts['post_title'];
				$post_date = $row_posts['post_date'];
				$post_author = $row_posts['post_author'];
				$post_image = $row_posts['post_image'];
				$post_content = $row_posts['post_content'];
				
				echo "
				<h2>$post_title</h2>
				<span><i>Posted by</i> <b>$post_author &nbsp; On $post_date</b></span><span style='color:brown;'></span><br /><br />
				<a href='admin/news_images/$post_image'><img src='admin/news_images/$post_image' width='400' height='400' /></a>
				<div>$post_content</div>
				";     //rmlink is for read more
				}
		}
    	?>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <?php 
			include("includes/comment_form.php");
		?>
	</div>
<!--content area ends-->

<!-- sidebar starts -->    
    <?php include("includes/sidebar.php"); ?>
<!-- sidebar end -->

<!-- footer area starts -->   
    <div class="footer_area">
    <h1 style="padding:20px; text-align:center">&copy; All Rights Reserved 2016 - LXNCreations</h1>
    </div>
<!-- footer area ends --> 
      
</body>
</html>