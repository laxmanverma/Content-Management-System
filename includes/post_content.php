<div class="post_area">
    
    	<?php
		
		if(!isset($_GET['cat'])){//if category link is not activated this condition runs else(if activated) not
			$get_posts = "select * from posts order by rand() LIMIT 0,5";
			$run_posts = mysql_query($get_posts);
			while ($row_posts = mysql_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$post_title = $row_posts['post_title'];
				$post_date = $row_posts['post_date'];
				$post_author = $row_posts['post_author'];
				$post_image = $row_posts['post_image'];
				$post_content = substr($row_posts['post_content'],0,300);
				
				echo "
				<div>
				<h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
				<span><i>Posted by</i> <b>$post_author &nbsp; On $post_date</b></span><span style='color:brown;'></span>
				<a href='admin/news_images/$post_image'><img src='admin/news_images/$post_image' width='100' height='100' /></a>
				<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a></div></div><br></br><br></br>
				";     //rmlink is for read more
				}
		}
		
		
		if(isset($_GET['cat'])){//if above condition not execute then it executed i.e., when some category link is activated
			
			$cat_id = $_GET['cat'];
			
			$get_posts = "select * from posts where category_id='$cat_id'";
			$run_posts = mysql_query($get_posts);
			while ($row_posts = mysql_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$post_title = $row_posts['post_title'];
				$post_date = $row_posts['post_date'];
				$post_author = $row_posts['post_author'];
				$post_image = $row_posts['post_image'];
				$post_content = substr($row_posts['post_content'],0,300);
				
				echo "
				<div>
				<h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
				<span><i>Posted by</i> <b>$post_author &nbsp; On $post_date</b></span><span style='color:brown;'></span>
				<img src='admin/news_images/$post_image' width='100' height='100' />
				<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a></div></div><br></br>
				";     //rmlink is for read more
				}
		}
    	?>
	
</div>