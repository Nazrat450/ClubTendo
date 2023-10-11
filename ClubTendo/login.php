<?php
include("include/header.php");
require("mysqli_connect.php");
	if(isset($_POST["Login"])){     //login page//
		$email = $_POST["txtuserEmail"]; 
		$password = $_POST["txtPassword"];
		$errors = "";
			if(empty($email) || empty($password)){
			$errors = "Check Email or Passowrd.";
			
			}
	
			if(empty($errors)){
				$query = "SELECT * FROM accounts WHERE (userEmail = '$email' AND userPassword = SHA('$password'))";
				$result = mysqli_query($dbc, $query); 
				$num = mysqli_num_rows($result);
			if($num==0){
				echo "Email or Password is wrong";
					   }
			if($email == "admin@gmail.com"){         //admin login//
				$row = mysqli_fetch_array($result);
				$_SESSION["admin@gmail.com"] = $row["userEmail"];
				$name = $row["userEmail"];
				setcookie("tendomember", $name, time()+60*10);
				header("location: index.php");
				$tracker = "INSERT INTO tracking(trackingDetails) VALUES ('Login User: $email')";
				$result = mysqli_query($dbc, $tracker);
			}
				
			else{
				$row = mysqli_fetch_array($result);
				$_SESSION["user_Email"] = $row["userEmail"]; //Viewer login//
				$name = $row["userEmail"];
				setcookie("tendomember", $name, time()+60*10);
				header("location: index.php");
				$tracker = "INSERT INTO tracking(trackingDetails) VALUES ('Login User: $email')";
				$result = mysqli_query($dbc, $tracker);
				}		
			}		
		
	}
?>
	<div class="main">
	<h1>Login Form</h1>
	<form action = "login.php" method= "post">
	<fieldset style = "{width: 700px;}">
		Enter Email
		<input type = "text" name = "txtuserEmail" value= "<?php if(isset($_POST['txtuserEmail'])) {echo $_POST['txtuserEmail'];}?>" />
		<span><?php if(!empty($errors)) {echo $errors; } ?></span>
		<p>
		Enter password
		<input type = "password" name = "txtPassword" />
		<input type = "submit" name = "Login" value = "Login" />
		</p>
		<a href="update.php">Change Password</a>
	</fieldset>
	</form>
	</div>
	</div>


	<div id = "footer">© copyright Melbourne Polytechnic</div>	
</body>
		

</html>

