<?php
	include("include/header.php");
	require("mysqli_connect.php");
	if(isset($_POST["submit"])){
		$username = $_POST["txtUsername"];
		$oldpass = $_POST["txtUpdate"];
		$newpass = $_POST["txtCon"];
		$errors = "";
	if(empty($username) || empty($oldpass) || empty($newpass)){
		$errors = "Check your information.";
	}
	
		if(empty($errors)){

		if($username==isset($row['username'])){
		$query = "SELECT * FROM accounts (userEmail,userPassword) VALUES ('$username',SHA('$password'))";
		$result = mysqli_query($dbc,$query);
		}
		if($newpass == $oldpass){
			echo "You cannot use the same password";
		}
		else{
		$query = "UPDATE accounts SET userPassword = SHA('$newpass') 
		WHERE userEmail = '$username' and userPassword =  SHA('$oldpass')";
		$result = mysqli_query($dbc, $query);
		echo "Password Updated";
	}
		}
		else{
			echo $errors;
		}
	}
?>
	<div class="main">
	<h1>Change Password</h1>
	<form action = "update.php" method= "post">
	<fieldset style = "{width: 700px;}">
		Enter Email
		<input type = "text" name = "txtUsername" />
		<p>
		Current password
		<input type = "password" name = "txtUpdate" />
		New password
		<input type = "password" name = "txtCon" />
		</p>
		<input type = "submit" name = "submit" value = "Register" />
		
	</fieldset>
	</form>
</div>
		</div>

		<div id = "footer">© copyright Melbourne Polytechnic</div>
	</div>
</body>
</html>

