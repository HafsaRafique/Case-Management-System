<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge"> 
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0"> 
	<title>Court Admin</title> 
	<link rel="stylesheet"
		href="panelstyle.css"> 
	<link rel="stylesheet"
		href="responsivepanel.css"> 
		<script>
        // JavaScript function to display the modal
        function displayModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }
    </script>
</head> 

<body> 
	
	<!-- for header part -->
	<header> 

		<div class="logosec"> 
			<div class="logo">Lahore High Court</div> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon"> 
		</div> 

		<div class="searchbar"> 
			<input type="text"
				placeholder="Search"> 
			<div class="searchbtn"> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
					class="icn srchicn"
					alt="search-icon"> 
			</div> 
		</div> 

		<div class="message"> 
			<div class="circle"></div> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
				class="icn"
				alt=""> 
			<div class="dp"> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp"> 
			</div> 
		</div> 

	</header> 

	<div class="main-container"> 
		<div class="navcontainer"> 
			<nav class="nav"> 
				<div class="nav-upper-options"> 
					<div class="nav-option option2"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
							class="nav-img"
							alt="articles"> 
							<a href="panel.php">
						<h3> Clients</h3> 
							</a>
					</div> 

					<div class="nav-option option1"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report"> 
							
						<h3> Lawyers</h3> 
							
					</div> 

					<div class="nav-option option3"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="institution"> 
							<a href="panel_cases.php">
						<h3> Cases</h3> 
							</a>
					</div> 

					<div class="nav-option option4"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
							class="nav-img"
							alt="blog"> 
							<a href="panel_assignment.php">
						<h3> Assignment</h3> 
							</a>
					</div> 

					<div class="nav-option option5"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
							class="nav-img"
							alt="settings"> 
							<a href="panel_contacts.php">
						<h3> Contacts</h3> 
							</a>
					</div> 
					<div class="nav-option option6"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report"> 
							<a href="panel_casestatus.php">
						<h3> Case Status Update</h3> 
							</a>
					</div> 

					<div class="nav-option logout"> 
    
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
             class="nav-img"
             alt="logout"> 
			 <a href="..\LandingPage.html">
    <h3>Logout</h3> 
	</a>
</div>

				</div> 
			</nav> 
		</div> 
		<div class="main"> 

			<div class="searchbar2"> 
				<input type="text"
					name=""
					id=""
					placeholder="Search"> 
				<div class="searchbtn"> 
				<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button"> 
				</div> 
			</div> 

			<div class="box-container"> 

			
				

				
			</div> 

			<div class="report-container"> 
				

				<div class="report-body"> 
					<div class="report-topic-heading"> 
						
                       

					</div> 
					<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to delete a lawyer and related entries
function deleteLawyer($conn, $lawyerID) {
    // Delete related entries from other tables
    $sql_delete_speciality = "DELETE FROM lawyer_speciality WHERE lawyerID = $lawyerID";
    $sql_delete_assignment = "DELETE FROM assignment WHERE lawyerID = $lawyerID";
    $sql_delete_contacts = "DELETE FROM contacts WHERE lawyerID = $lawyerID";
    
    // Execute deletion queries
    $conn->query($sql_delete_speciality);
    $conn->query($sql_delete_assignment);
    $conn->query($sql_delete_contacts);
    
    // Delete the lawyer from the main table
    $sql_delete_lawyer = "DELETE FROM lawyer WHERE lawyerID = $lawyerID";

    if ($conn->query($sql_delete_lawyer) === TRUE) {
        echo "<script>alert('Lawyer and related entries deleted successfully')</script>";
    } else {
        echo "<script>alert('Error deleting')</script>"  . $conn->error;
    }
}


// SQL query to fetch data from the "lawyer" and "lawyer_speciality" tables
$sql = "SELECT lawyer.*, lawyer_speciality.speciality FROM lawyer LEFT JOIN lawyer_speciality ON lawyer.lawyerID = lawyer_speciality.lawyerID";
$result = $conn->query($sql);

// Display data in a table with margins around columns
if ($result->num_rows > 0) {
    echo '<table class="lawyer-table">';
    echo '<tr>';
    echo '<th>LawyerID</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>State</th>';
    echo '<th>City</th>';
    echo '<th>Telephone</th>';
    echo '<th>Zipcode</th>';
    echo '<th>Speciality</th>';
    echo '</tr>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="lawyer-column">' . $row["lawyerID"] . '</td>';
        echo '<td class="lawyer-column">' . $row["Name"] . '</td>';
        echo '<td class="lawyer-column">' . $row["Address"] . '</td>';
        echo '<td class="lawyer-column">' . $row["State"] . '</td>';
        echo '<td class="lawyer-column">' . $row["City"] . '</td>';
        echo '<td class="lawyer-column">' . $row["Telephone"] . '</td>';
        echo '<td class="lawyer-column">' . $row["Zipcode"] . '</td>';
        echo '<td class="lawyer-column">' . $row["speciality"] . '</td>';
        echo '<td>';
        echo '<button class="update-button" onclick="openForm()">Update</button>';
        echo '<button class="delete-button" onclick="confirmDelete(' . $row["lawyerID"] . ')">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}

$conn->close();
?>






					</div> 
				</div> 
			</div> 
		</div> 
	</div>
	<div class="form-popup" id="myForm">
	<form action="updatelawyertable.php" class="form-container" method="post">
    <h1>Update</h1>

    <label for="first_name"><b>Full Name</b></label>
    <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Full Name" required>
						

	<label for="street"><b>Address</b></label>
    <input type="text" name="street" class="street" id="street" placeholder="Address" required>

	<label for="lawyerID"><b>Lawyer ID</b></label>
	<input type="text" name="lawyerID" class="lawyerID" id="lawyerID" placeholder="ID" required>
	<label for="city"><b>City</b></label>
	<input type="text" name="city" id="city" class="input-text" placeholder="City">
					
	<label for="telephone"><b>Telephone</b></label>
	<input type="text" name="phone" class="phone" id="phone" placeholder="Telephone" required>

    <label for="speciality"><b>Speciality</b></label>
	<input type="text" name="speciality" class="speciality" id="speciality" placeholder="Speciality" required>

    <button type="submit" class="btn">Update</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function confirmDelete(lawyerID) {
    var confirmDelete = confirm("Are you sure you want to delete this record?");
    if (confirmDelete) {
        // If user confirms, redirect to PHP script to handle deletion
        window.location.href = "deletelawyerrecord.php?lawyerID=" + lawyerID;
    } else {
        // If user cancels, do nothing
        return false;
    }
}



	</script>
 
	
	<script src="./index.js"></script> 
</body> 
</html>
