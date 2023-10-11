<?php
	include("include/header.php");
	require("mysqli_connect.php");
?>

		
		<?php
		 if(isset($_POST["submit"])){
		$username = $_POST["txtUsername"];
		$userpass = $_POST["txtPassword"];
		$passcon = $_POST["txtRepass"];
		$country = $_POST["txtCountry"];
		$error1 = "";
		$error2 = "";
		$error3 = "";
		
		

	
	if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      
   
	
		$query = "SELECT * FROM accounts WHERE (userEmail = '$username')";
		$result = mysqli_query($dbc, $query);
		$num = mysqli_num_rows($result);
	if(empty($username) || empty($userpass) || empty($passcon)){
		$error1 = "Check your username.";
		$error2 = "Check your password.";
		$error3 = "Check your confirmation.";
		 }
	
	
		if(($num==0) && empty($error1) && empty($error2) && empty($error3)){
		if($userpass == $passcon){
		$query = "INSERT INTO accounts(userEmail,userPassword,userCountry) VALUES ('$username', SHA('$userpass'),'$country')";
		$result = mysqli_query($dbc, $query);
		echo "Registration Successful!";		
								}
								else{
		$error2 = "Check your password.";
		$error3 = "Check your confirmation.";
		
		}
		
		
		}
		elseif(($num==1)){
			echo "You are already Registered";
		}
	
	
		$tracker = "INSERT INTO tracking(trackingDetails) VALUES ('Registered User: $username')";
		$result = mysqli_query($dbc, $tracker);
			}
			else{
				$error4 = "Please Enter Valid Email";
				
			}
		 }									
		
?>
	<div class="main">
	<h2>Register Form</h2>
	<form action = "registration.php" method= "post">
	<fieldset style = "{width: 700px;}">
		Enter Email
		<input type = "text" name = "txtUsername" value= "<?php if(isset($_POST['txtUsername'])) {echo $_POST['txtUsername'];}?>" />
		<span><?php if(!empty($error1)) {echo $error1; }
					if(!empty($error4)) {echo $error4; }		?></span>
		<p>
		Create password
		<input type = "password" name = "txtPassword" minlength="4"/>
		<span><?php if(!empty($error2)) {echo $error2; } ?></span>
		</p><p>
		Confirm password
		<input type = "password" name = "txtRepass" minlength="4"/> 
		<span><?php if(!empty($error3)) {echo $error3; } ?></span>
		</p>
		<p>
		Enter Country
		<input type = "text" name = "txtCountry" 
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
