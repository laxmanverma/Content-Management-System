<?php
session_start();
	if(!isset($_SESSION['user_name'])){
		
		echo "<script>window.open('login.php?not_authorize=You are not authorize to access!','_self')</script>";
		
		}
	else{
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>

	<div class="wrapper">
    	
    	<a href="index.php"><div class="header"></div></a>
        
        <div class="left">
        	<h2 style="padding:5px; color:#F00">CONTENTS</h2>
        	<a href="index.php?insert_post">Insert New Post</a>
            <a href="index.php?view_posts">View All Post</a>
            <a href="index.php?insert_cat">Insert New Category</a>
            <a href="index.php?view_cats">View all Categories</a>
            <a href="index.php?view_comments">View all Comments</a>
            <a href="logout.php">Admin Logout</a>
        </div>
        
        <div class="right">
        	
            <span style="padding:5px; margin:5px;"><strong>To do tasks:</strong><span style="padding:5px; margin:5px;"><a href="index.php?view_comments" style="text-decoration:none; color:#009">
            Pending comments 
            <?php
				include("includes/database.php");
				
				$get_comments = "select * from comments where status='unapprove'";
				$run_comments = mysql_query($get_comments);
				$count = mysql_num_rows($run_comments);
				echo "(" . $count . ")";
            ?>
            </a></span></span><br /><br />
        
        <h2 style="color:#00F; text-align:center;"><?php echo @$_GET['logged']; ?></h2>
        <span style="font-size:18px;">Welcome<h2 style="color:#F00;"> <?php echo $_SESSION['user_name']; ?></h2></span>
        
        	<?php
		
				if(isset($_GET['insert_post'])){// executed when insert_post is activated/clicked
					include("includes/insert_post.php");
				}
				
				if(isset($_GET['view_posts'])){// same as above
					include("includes/view_posts.php");
				}
				
				if(isset($_GET['edit_post'])){// same as above
					include("includes/edit_post.php");
				}
				
				if(isset($_GET['insert_cat'])){// same as above
					include("includes/insert_cat.php");
				}
				
				if(isset($_GET['view_cats'])){// same as above
					include("includes/view_cats.php");
				}
				
				if(isset($_GET['edit_cat'])){// same as above
					include("includes/edit_cat.php");
				}
				
				if(isset($_GET['view_comments'])){// same as above
					include("includes/view_comments.php");
				}
				
				if(isset($_GET['unapprove'])){// same as above                ;for unapproving a comment
					include("includes/comment_status.php");
				}
				
				if(isset($_GET['approve'])){// same as above                   ;for approving a comment
					include("includes/comment_status.php");
				}
				
				if(isset($_GET['del_comment'])){// same as above                   ;for deleting a comment
					include("includes/del_comment.php");
				}
				
			?>
        
		</div>
    </div>
</body>
</html>

<?php } ?>