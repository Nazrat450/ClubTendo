<?php
	session_start();
	session_destroy();
	setcookie("tendomember", "", time()-60);
	header("Location: index.php");
	
?>