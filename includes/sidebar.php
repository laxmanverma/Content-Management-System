<div class="sidebar">
	<div id="stitle">Recent Posts</div>
    <?php
			$get_posts = "select * from posts order by 1 DESC LIMIT 0,5";
			$run_posts = mysql_query($get_posts);
			while ($row_posts = mysql_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$post_title = $row_posts['post_title'];
				$post_image = $row_posts['post_image'];
				
				echo "
				<br />
				<div class='recent_posts'>
				<h2><a href='details.php?post=$post_id'>$post_title</a></h2>
				<img src='admin/news_images/$post_image' width='100' height='100' />
				</div>
				";     
				}
    	?>

     <div id="stitle">lets get in touch!</div>
    	<div id="social">
        	<a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.jpg" /></a>
            <a href="https://plus.google.com" target="_blank"><img src="images/google.jpg" /></a>
            <a href="https://twitter.com/?lang=en" target="_blank"><img src="images/twitter.png" /></a>
            <a href="https://github.com/" target="_blank"><img src="images/github.jpg" /></a>
        </div>
        
	</div>