
	<?php
	$dbc = mysqli_connect  ('localhost','matthew','p@ssw0rd','matthewhill');
	
	if (mysqli_connect_errno()) { 
    	echo "FATAL ERROR:</br></br>Database Connection Failed: ", mysqli_connect_error() ; 
    	exit(); 
	} 
?>

