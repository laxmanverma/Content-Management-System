<?php
	
	/* counter */
	//opens count.txt to read the number of visitors
	
	$date = fopen("count.txt","r"); //r is for read
	$count = fgets($date,1000);		//1000 is to read upto 1000 characters
	fclose($date);
	$count=$count+1;
	
	echo "<h2 style='float:right !important; color:black; width:150px; font-size:16px; padding:10px;position:fixed;'>Visitors so Far: $count</h2>";
	
	//opens count.txt to update the value of count
	
	$date = fopen("count.txt","w"); //w for write
	fwrite($date,$count);
	fclose($date);
	
?>