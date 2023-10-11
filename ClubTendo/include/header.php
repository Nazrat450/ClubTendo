<!DOCTYPE html>
<?php
	session_start();

	
?>

<html>
<head>
	<title>CLUB TENDO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href = "clubtendo_layout.css" />
	
	<meta charset="UTF-8">
  <meta name="description" content="Nintendo,games">
  <meta name="keywords" content="HTML,Mario,Zelda,pokemon">
  <meta name="author" content="Matthew Hill">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
	<div id = "box"> <!-- Heading Logo BOX -->
		<div id = "header">
		<img src="images/logo.png" alt="logo" id = "logo" />
		<img src="images/mask.png" alt="mask" id = "mask" />
		<img src="images/eevee.jpg" alt="eevee" id = "eevee" />
			
		
		  <h1>CLUB TENDO</h1>
		</div>
	<?php
		//Admin Login
	if(isset($_SESSION["user_Email"]) && isset($_COOKIE["tendomember"])){
		$user = $_SESSION["user_Email"];
		echo "<h2>Logged in as $user</h2>";
	}
		//User Login
	elseif(isset($_SESSION["admin@gmail.com"]) && isset($_COOKIE["tendomember"])){
		$user = $_SESSION["admin@gmail.com"];	
		echo "<h2>Logged in as Admin User</h2>";
	}
		//No Login
	else{
		echo "<p>Please Log IN</p>";
	}
	?>

		<div id = "contents"> <!-- Nav menu -->
		  <div class="menu">
			<a href="index.php">Home</a>
			<a href="registration.php">Register</a>
			<a href="login.php">Login</a>
			<a href="Search.php">Search</a>
			<a href="clubtendo_zelda.php">Legend Of Zelda</a>
			<a href="clubtendo_mario.php">Mario</a>
			<a href="clubtendo_contactus.php">Contact us</a>
			<?php
				//Admin View
				if(isset($_SESSION["admin@gmail.com"]) && isset($_COOKIE["tendomember"])){
					$user = $_SESSION["admin@gmail.com"];
					echo '<a href="viewalltrack.php">Admin Tracking</a>';		
					echo '<a href="logout.php">Logout</a>';
				}
				//User View
				elseif(isset($_SESSION["user_Email"]) && isset($_COOKIE["tendomember"])){
					$user = $_SESSION["user_Email"];
					echo '<a href="logout.php">Logout</a>';
	}
			?>
		 </div>