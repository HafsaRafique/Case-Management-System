<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Welcome</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet"
		href="panelstyle.css"> 
	<link rel="stylesheet"
		href="responsivepanel.css"> 

</head>

  <div class="hero_area1">
     <!-- header section strats -->
     <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="job.html">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="LandingPage.html">
                  <span>
                    Logout
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="colorlib-regform-36/Register.html">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                  <?php 
                // Check if the fullname parameter is set in the URL
                if (isset($_GET['fullname'])) {
                    // Get the full name from the URL parameter and display it
                    echo htmlspecialchars($_GET['fullname']);
                } else {
                    // If fullname parameter is not set, display a default value
                    echo "User";
                }
            ?>
                  </span>
                </a>
              </li>
              
              <form class="form-inline">
                <button class="btn   nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
     </header>
     <body class="bodyclient">
 
  <div class="form-popup1" id="myForm">
  <h2 class="header1">Register a Case</h2>
    <form method="post" name="create_case">
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required><br><br>

      <label for="fullname">Client Full Name:</label>
      <input type="text" id="fullname" name="first_name" required><br><br>

      <label for="court">Court ID(1):</label><br>
    <input type="text" id="court" name="courtID" required><br><br>

      <label for="description">Description:</label><br>
      <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>


      <button type="submit">Register</button>
    </form>
  </div>


  <div class="form-popup2" id="myForm">
    <h2>Find Lawyers by Speciality</h2>

    <form method="post" name="lawyer_speciality">
      <label for="speciality">Speciality:</label>
      <input type="text" id="speciality" name="speciality">
      <button type="submit">Search</button>
    </form>
  </div>

  
  <div class="form-popup3" id="myForm">
    <h2>Request a Lawyer</h2>
    <p>If no lawyer has accepted your case yet, you can find lawyer by their speciality and send them a request.</p>
    <form method="post" name="lawyer_ask">
    <div>
  <label for="first_name"><b>Your Name</b></label>
  <input type="text" name="client_name" id="first_name" class="input-text" placeholder="Your Name" required>
</div>

<div>
  <label for="idlawyer"><b>Lawyer ID</b></label>
  <input type="text" name="lawyerID" class="idlawyer" id="idlawyer" placeholder="Lawyer ID" required>
</div>

<div>
  <label for="caseID"><b>Case ID</b></label>
  <input type="text" name="caseID" class="caseID" id="caseID" placeholder="Case ID" required>
</div>

<div>
  <label for="billing"><b>Suggest Billing per hour</b></label>
  <input type="text" name="billing" class="billing" id="billing" placeholder="Billing(mention per hour)" required>
</div>

      <button type="submit">Request Lawyer</button>
    </form>
  </div>

  <div class="form-popup5" id="myForm">
    <form method="post" >
        <div>
            <h2>Remove your Case</h2> <!-- Properly closed h2 tag -->

            <label for="idclient"><b>CaseID</b></label>
            <input type="text" name="caseid" class="caseid" id="caseid" placeholder="Case ID" required>
            <button type="submit">Enter</button>
        </div>
    </form>
</div>

<div class="form-popup4" id="myForm">

    <h2>Check If a Lawyer Wants your Case</h2>
    <form method="post">
      <label for="Name">Your Name:</label>
      <input type="text" id="clientName" name="client_Name" required><br><br>

      <button type="submit">Refresh </button>
    </form>
  </div>
  <div class="form-popup16" id="myForm">

    <h2>Reject a Case Request</h2>
    <form method="post">
      <label for="clientid">Client ID:</label>
      <input type="text" id="clientID" name="cliID" required><br><br>
      <label for="lawyerid">Lawyer ID:</label>
      <input type="text" id="lawyerID" name="lawID" required><br><br>
      <label for="caseid">Case ID:</label>
      <input type="text" id="caseID" name="casID" required><br><br>

      <button type="submit">Reject </button>
    </form>
  </div>
  <div class="form-popup17" id="myForm">
    <h2>Cases You've Registered</h2>
    
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve full name from URL
    if (isset($_GET['fullname'])) {
      // Get the full name from the URL parameter
      $fullName = $_GET['fullname'];
  
      // Prepare SQL statement to fetch clientID based on the provided full name
      $sql_id = "SELECT clientID FROM client WHERE FullName = ?";
      $stmt_id = $conn->prepare($sql_id);
      $stmt_id->bind_param("s", $fullName);
     
      // Execute the statement
      $stmt_id->execute();
      $result_id = $stmt_id->get_result();
  
      // Check if a record is found
      if ($result_id->num_rows > 0) {
          // Fetch the clientID
          $row_id = $result_id->fetch_assoc();
          $clientID = $row_id["clientID"];
         
          // Prepare and execute SQL query to fetch caseIDs and case descriptions associated with the clientID
          $sql_cases = "SELECT c.caseID, cd.description FROM cases c
          INNER JOIN case_description cd ON c.caseID = cd.caseID
          WHERE c.clientID = ?";
$stmt_cases = $conn->prepare($sql_cases);
$stmt_cases->bind_param("i", $clientID);
$stmt_cases->execute();
$result_cases = $stmt_cases->get_result();

// Check if cases are found for this client
if ($result_cases->num_rows > 0) {
// Display table header


echo '<style>
    /* Style for the table */
    .custom-table {
        width: 100%;
        padding-right:10px;
        margin-top: 4px;
    }
    
    /* Style for table header */
    .custom-table th {
        background-color: #f2f2f2;
        text-align: left;
        padding: 8px;
    }
    
    /* Style for table cells */
    .custom-table td {
        border-bottom: 1px solid #ddd;
        padding: 8px;
    }
    
    /* Style for alternate rows */
    .custom-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    /* Style for table container */
    .custom-table-container {
        margin-top: 5px;
        overflow-x: auto;
    }
</style>';

echo '<div class="custom-table-container">';
echo '<table class="custom-table">';
echo '<tr>';
echo '<th>Case ID</th>';
echo '<th>Description</th>';
echo '</tr>';

// Display caseIDs and case descriptions
while($row = $result_cases->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row["caseID"] . '</td>';
    echo '<td>' . $row["description"] . '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';
} else {
echo "No cases found for this client.";
}

// Close statement and result set
$stmt_cases->close();
} else {
// If no record is found, display a message
echo "Client not found.";
}
  
      // Close statement and connection
      $stmt_id->close();
    } else {
        // If fullname parameter is not set, display a default message
        echo "Full name not provided.";
    }

  // Close the connection
  $conn->close();
  ?>
  </div>

  </div>


<!---case remove --->

<?php
if (isset($_POST['caseid'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<script>alert('Connection failed: " . $conn->connect_error . "');</script>");
    }

    // Check if caseID is provided via POST method
    if (isset($_POST['caseid'])) {
        $caseID = $_POST['caseid'];

        // Delete associated entries from the assignment table
        $sql_delete_assignment = "DELETE FROM assignment WHERE caseID = ?";
        $stmt_delete_assignment = $conn->prepare($sql_delete_assignment);
        $stmt_delete_assignment->bind_param("i", $caseID);
        $stmt_delete_assignment->execute();

        // Delete associated entries from the case_description table
        $sql_delete_description = "DELETE FROM case_description WHERE caseID = ?";
        $stmt_delete_description = $conn->prepare($sql_delete_description);
        $stmt_delete_description->bind_param("i", $caseID);
        $stmt_delete_description->execute();

        // Prepare and execute SQL query to delete the case from the cases table
        $sql_delete_case = "DELETE FROM cases WHERE caseID = ?";
        $stmt_delete_case = $conn->prepare($sql_delete_case);
        $stmt_delete_case->bind_param("i", $caseID);
        $stmt_delete_case->execute();

        // Check if deletion was successful
        if ($stmt_delete_case->affected_rows > 0) {
            echo "<script>alert('Your Case with ID $caseID has been deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error deleting your case with ID $caseID: " . $conn->error . "');</script>";
        }

        // Close prepared statements
        $stmt_delete_assignment->close();
        $stmt_delete_description->close();
        $stmt_delete_case->close();
    } else {
        echo "<script>alert('No caseID provided.');</script>";
    }

    // Close database connection
    $conn->close();
}
?>







    <?php
// Check if the form is submitted
if (isset($_POST['lawyerID'])) {
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

    // Get form data
    $lawyerID = $_POST["lawyerID"];
    $clientName = $_POST["client_name"];
    $caseID = $_POST["caseID"];
    $billinghours = $_POST["billing"];

    // Prepare SQL statement to fetch clientID based on the provided client name
    $sql = "SELECT clientID FROM client WHERE FullName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $clientName);
    $stmt->execute();
    $stmt->bind_result($clientID);
    $stmt->fetch();
    $stmt->close();

    // Prepare SQL statement to insert data into the assignment table
    $sql = "INSERT INTO assignment (clientID, lawyerID, caseID, billinghours) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $clientID, $lawyerID, $caseID, $billinghours);

    // Execute the statement to insert into the assignment table
    if ($stmt->execute()) {
        echo "<script>alert('Request Sent')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>




<!--check if lawyer posted a request -->


<?php

// Check if the form is submitted
if (isset($_POST['client_Name'])){
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

  // Get the client's name from the form
  $client_name = $_POST["client_Name"]; // Change this to the name of the client

  // Prepare SQL statement to fetch clientID based on the provided client name
  $sql = "SELECT clientID FROM client WHERE FullName = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $client_name);

  // Execute the statement
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the client was found
  if ($result->num_rows > 0) {
      // Fetch the clientID
      $row = $result->fetch_assoc();
      $clientID = $row["clientID"];

      // Prepare SQL statement to fetch assignment table data along with lawyer's name, case ID, and case description based on clientID
      $sql = "SELECT a.*, l.lawyerID, l.Name AS lawyerName, c.caseID, cd.description AS caseDescription
      FROM assignment a
      INNER JOIN lawyer l ON a.lawyerID = l.lawyerID
      INNER JOIN cases c ON a.caseID = c.caseID
      INNER JOIN case_description cd ON c.caseID = cd.caseID
      WHERE a.clientID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $clientID);

      // Execute the statement
      $stmt->execute();
      $result = $stmt->get_result();

      // Display the assignment table data along with lawyer's name, case ID, and case description
      if ($result->num_rows > 0) {
          echo "<div style='overflow-x:auto;'>";
          
          echo "<table class='assignment-table'>";
          echo "<tr><th>ClientID</th><th>Lawyer Name</th><th>Lawyer ID</th><th>Case ID</th><th>Case Description</th><th>Billing Hours</th><</tr>";
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["clientID"] . "</td>";
            echo "<td>" . $row["lawyerName"] . "</td>";
            echo "<td>" . $row["lawyerID"] . "</td>";
            echo "<td>" . $row["caseID"] . "</td>";
            echo "<td>" . $row["caseDescription"] . "</td>";
            echo "<td>" . $row["billinghours"] . "</td>";
            echo "</td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";
         
      } else {
          echo "No assignment data found for Client: $client_name";
      }
  }
}

?>

<?php

// Check if the form is submitted
if (isset($_POST['cliID'])){
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

    // Get clientID, lawyerID, and caseID from the form
    $clientID = $_POST['cliID'];
    $lawyerID = $_POST['lawID'];
    $caseID = $_POST['casID'];

    // Prepare SQL statement to delete the assignment entry
    $sql_delete = "DELETE FROM assignment WHERE clientID = ? AND lawyerID = ? AND caseID = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("iii", $clientID, $lawyerID, $caseID);
    $stmt_delete->execute();

    // Check if the assignment entry is deleted
    if ($stmt_delete->affected_rows > 0) {
        echo "<script>alert('Assignment rejected successfully.')</script>";
    } else {
        echo "Error: Unable to reject assignment.";
    }

    // Close connection
    $conn->close();
}

?>

 <!-- find lawyers based on speciality-->


<?php
if (isset($_POST['speciality'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the speciality from the POST request
$speciality = $_POST['speciality'];

// Prepare SQL statement to fetch lawyers by speciality
$sql = "SELECT lawyer.lawyerID, lawyer.Name, lawyer_speciality.speciality
        FROM lawyer
        INNER JOIN lawyer_speciality ON lawyer.lawyerID = lawyer_speciality.lawyerID
        WHERE lawyer_speciality.speciality = ?";

// Prepare and bind parameter
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $speciality);

// Execute query
$stmt->execute();

// Get result
$result = $stmt->get_result();


// Check if any rows were returned
if ($result->num_rows > 0) {
    // Open a div for centering the table
    echo "<div class='custom-table-container' style='margin-top: 400px;'>";
        echo "<table class='custom-table'>";
        echo "<tr><th>Lawyer ID</th><th>Name</th><th>Speciality</th></tr>";

        // Fetch rows and display them in the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["lawyerID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["speciality"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    // Close the div for centering
    echo "</div>";
}

// Close statement and connection
$stmt->close();
$conn->close();
}
?>


 <!-- Insert cases -->

 <?php
// Check if form is submitted
if (isset($_POST['description'])) {
    // Form fields
    $date = $_POST['date'];
    $fullname = $_POST['first_name'];
    $description = $_POST['description'];
    $courtID = $_POST['courtID']; // Assuming courtID is also submitted from the form

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve clientID based on first_name
    $sql = "SELECT clientID FROM client WHERE FullName = ?";

    // Prepare and bind parameter
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fullname);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($clientID);

    // Fetch result
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Prepare SQL statement to insert data into the cases table
    $sql = "INSERT INTO cases (date, clientID, courtID) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $date, $clientID, $courtID);

    // Execute statement to insert data into cases table
    $stmt->execute();

    // Get the ID of the last inserted case
    $last_case_id = $conn->insert_id;

    // Close statement
    $stmt->close();

    // Prepare SQL statement to insert data into the case_description table
    $sql = "INSERT INTO case_description (caseID, description) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $last_case_id, $description);

    // Execute statement to insert data into case_description table
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Show success message
    echo "<script>alert('Case Inserted .');</script>";
}
?>

</body>

</html>
