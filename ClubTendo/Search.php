<?php
	include("include/header.php");
	require("mysqli_connect.php");
	?>
	<div class="main">
	<h1>Search Form</h1>
	<form action = "Search.php" method= "post">
	<fieldset style = "{width: 700px;}">
		Search Product Name
		<input type = "text" name = "txtproductname" />
		<p>
		</p>
		<input type = "submit" name = "Search" value = "Search" />
		
	</fieldset>
	</form>
	
	
	<?php
	if(isset($_POST["Search"])){
		$proname = $_POST["txtproductname"];
		$searchterm = $_POST["txtproductname"];
		$errors = "";
		
	if(empty($proname)){
		$errors = "Fill the search field.";
	}
	
		if(empty($errors)){
		$product= "SELECT * FROM products WHERE (productName  LIKE '%$searchterm%')";
		$result = mysqli_query($dbc,$product);
		$num = mysqli_num_rows($result);
		if($num==0){
			echo "Product do not exist";
				   }
		else{
			echo "<table border=1>";
			echo "<th> Product ID </th><th> Product Name</th><th> Description</th><th>Image</th>";
			
			while ($row = mysqli_fetch_array($result)){
				
				echo "<tr>";
				echo "<td>" . $row["productId"] . "</td>";
				echo "<td>" . $row["productName"] . "</td>";
				echo "<td>" . $row["productDescription"] . "</td>"; 
				echo "<td>" . "<img class= 'searchImage' src= 'images/" . $row["productImg"] . "'/>". "</td>";
				echo "</tr>";
			};
			echo "</table>";
			
			
		}
		
		}
		$tracker = "INSERT INTO tracking(trackingDetails) VALUES ('Searched: $searchterm')";
		$result = mysqli_query($dbc, $tracker);
	}
	
	?>
	
	</div>
	

	<div id = "footer">Search Our Stock</div>	
</body>
		

</html>