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

					<div class="nav-option option5"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report"> 
							<a href="panel_lawyer.php">
						<h3> Lawyers</h3> 
							</a>
					</div> 

					<div class="nav-option option1"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="institution"> 
							
						<h3> Cases</h3> 
							
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

					<div class="nav-option option3"> 
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

// SQL query to fetch data from the "contacts" table with joins to retrieve additional information
$sql = "SELECT c.lawyerID, l.Name AS lawyer_name, c.courtID, a.caseID, a.clientID, cl.FullName AS client_name, cd.description
        FROM contacts c
        LEFT JOIN assignment a ON c.lawyerID = a.lawyerID
        LEFT JOIN client cl ON a.clientID = cl.clientID
        LEFT JOIN lawyer l ON c.lawyerID = l.lawyerID
        LEFT JOIN cases ca ON a.caseID = ca.caseID
        LEFT JOIN case_description cd ON ca.caseID = cd.caseID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="contacts-table">';
    echo '<tr>';
    echo '<th>Lawyer ID</th>';
    echo '<th>Lawyer Name</th>';
    echo '<th>Client ID</th>';
    echo '<th>Client Name</th>';
    echo '<th>Case ID</th>';
    echo '<th>Case Description</th>';
    echo '</tr>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="contacts-column">' . $row["lawyerID"] . '</td>';
        echo '<td class="contacts-column">' . $row["lawyer_name"] . '</td>';
        echo '<td class="contacts-column">' . $row["clientID"] . '</td>';
        echo '<td class="contacts-column">' . $row["client_name"] . '</td>';
        echo '<td class="contacts-column">' . $row["caseID"] . '</td>';
        echo '<td class="contacts-column">' . $row["description"] . '</td>';
        echo '<td class="contacts-column">';
        echo '<form method="post">';
        echo '<input type="hidden" name="caseID" value="' . $row["caseID"] . '">';
        echo '<button type="submit" name="delete" class="btn-delete">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}

// Close the connection
$conn->close();

// Process delete action
if(isset($_POST['delete'])) {
    // Database connection details
    $servername = "localhost"; // Change this to your MySQL server address
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "project"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the case ID to delete
    $caseID = $_POST['caseID'];

    // Prepare and execute deletion queries
    $deleteQueries = [
        "DELETE FROM assignment WHERE caseID = $caseID",
        "DELETE FROM contacts WHERE caseID = $caseID",
        "DELETE FROM case_description WHERE caseID = $caseID",
        "DELETE FROM cases WHERE caseID = $caseID"
    ];

    foreach($deleteQueries as $query) {
        if ($conn->query($query) !== TRUE) {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>



					</div> 
				</div> 
			</div> 
		</div> 
	</div>
	<div class="form-popup" id="myForm">
	<form action="updatethetable.php" class="form-container" method="post">
    <h1>Update</h1>

    <label for="first_name"><b>Full Name</b></label>
    <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Full Name" required>
						

    <label for="DOB"><b>DOB</b></label>
    <input type="text" name="dob" id="dob" class="input-text" placeholder="DOB" required>

	<label for="street"><b>Address</b></label>
    <input type="text" name="street" class="street" id="street" placeholder="Address" required>

	<label for="clientID"><b>Client ID</b></label>
	<input type="text" name="clientID" class="clientID" id="clientID" placeholder="ID" required>
	<label for="city"><b>City</b></label>
	<input type="text" name="city" id="city" class="input-text" placeholder="City">
					
	<label for="telephone"><b>Telephone</b></label>
	<input type="text" name="phone" class="phone" id="phone" placeholder="Telephone" required>

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
function confirmDelete(clientID) {
    var confirmDelete = confirm("Are you sure you want to delete this record?");
    if (confirmDelete) {
        // If user confirms, redirect to PHP script to handle deletion
        window.location.href = "deleteRecord.php?clientID=" + clientID;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

	</script>
 
	
	<script src="./index.js"></script> 
</body> 
</html>
