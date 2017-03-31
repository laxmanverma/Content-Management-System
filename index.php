<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
<div class="container1">
<!--header starts here-->
	<div class="head">
    <a href="index.php"><img id="logo" src="images/logo.png"/></a>
    </div>
<!--header ends-->


<?php include("counter.php"); ?>

<!--main container starts from here-->
<div class="container">

<!--navigation bar starts-->
    <?php include("includes/navbar.php"); ?>
<!--Navigation bar ends-->
	
    <br /><br />
    
<!--content area start-->    
	<?php include("includes/post_content.php"); ?>
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