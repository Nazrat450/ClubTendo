<?php
	include("include/header.php");
	require("mysqli_connect.php");
	
	
	
  


	$display = 8;
	



	
	
	//start//
	if(isset($_GET['np'])){ // Number of pages has already been determined.
			$num_pages = $_GET['np'];
		}else{ // Need to determine number of pages.
			$query = "SELECT count(*) FROM tracking";// Count the number of records
			$result=mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($result);
			$num_records = $row[0];// read and store the rows count
			// Calculate the number of pages.
			if ($num_records > $display) { // More than 1 page.
				$num_pages = ceil ($num_records/$display);
			} else {
				$num_pages = 1;
			}
		}// End  if
		if(isset($_GET['s'])){// Determine position to start returning results.
			$start = $_GET['s'];
		}else{
			$start = 0;
		}
		$query = "SELECT * FROM tracking LIMIT $start,$display";
		$result=mysqli_query($dbc, $query);
		echo "<table border='0' cellpadding='8'>
			<tr>
				<th>Tracking ID</th>
				<th>Tracking Details</th>
				
			</tr>";
		$bg = "#dddddd"; // Set the background color (for alternating row colors).
		while($row = mysqli_fetch_array($result)){ // Fetch records.
			if($bg=="#dddddd"){// Switch the background color.
				$bg = "#ffffff";
			}else{
				$bg="#dddddd";
			} 
			echo "<tr bgcolor='", $bg, "'>";
			echo "	<td align='left'>", $row['trackingID'], "</td>";
			echo "	<td align='left'>", $row['trackingDetails'], "</td>";
			
			echo "</tr>";
		}
		echo "</table>";// close the table
		mysqli_free_result ($result); // Free up the resources.	
		mysqli_close($dbc); // Close the database connection.
		// Make the links to other pages, if necessary.
		if($num_pages > 1){
			echo "<br /><p>";			
			$current_page = ($start/$display) + 1; // Determine what page the script is on.
			// If it's not the first page, make a Previous link.
			if($current_page != 1){
				echo "<a href='viewalltrack.php?s=", ($start - $display), "&np=", $num_pages, "'>< </a> ";
			}else{
				echo "< ";
			}
			for($i = 1; $i <= $num_pages; $i++){// Make all the numbered pages.
				if($i != $current_page){
					echo "<a href='viewalltrack.php?s=", (($display * ($i - 1))), "&np=", $num_pages, "'>", $i, "</a> ";
				}else{
					echo $i, " ";
				}
			}
			if($current_page != $num_pages){ //If it's not the last page, make a Next link.
				echo "<a href='viewalltrack.php?s=", ($start + $display), "&np=", $num_pages, "'> ></a>";
			} else{
				echo " >";
			}
			echo "</p>";
		} // End of links section.




?>