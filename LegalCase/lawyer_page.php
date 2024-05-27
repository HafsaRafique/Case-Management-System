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

  <title>Lawyer</title>


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

<body>

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
    <a class="nav-link" href="#">
        <?php 
            // Database connection details
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

            // Check if the fullname parameter is set in the URL
            if (isset($_GET['fullname'])) {
                // Get the full name from the URL parameter
                $fullname = $_GET['fullname'];

                // Prepare SQL statement to fetch lawyerID based on the provided full name
                $sql = "SELECT lawyerID FROM lawyer WHERE Name = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $fullname);

                // Execute the statement
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if a record is found
                if ($result->num_rows > 0) {
                    // Fetch the lawyerID
                    $row = $result->fetch_assoc();
                    $lawyerID = $row["lawyerID"];
                    echo "LawyerID : " . $lawyerID;
                } else {
                    // If no record is found, display a message
                    echo "Lawyer ID: Not Found";
                }

                // Close statement and connection
                $stmt->close();
            } else {
                // If fullname parameter is not set, display a default message
                echo "LawyerID: Not Available";
            }

            // Close connection
            $conn->close();
        ?>
    </a>
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


<div class="form-popup12" id="myForm">
<form class="form-container" method="post">
    <h1>Take a Case</h1>

    <div>
        <label for="first_name"><b>Your Name</b></label>
        <input type="text" name="lawyer_name" id="first_name" class="input-text" placeholder="Your Name" required>
    </div>

    <div>
        <label for="idclient"><b>Client ID</b></label>
        <input type="text" name="clientID" class="idclient" id="idclient" placeholder="Client ID" required>
    </div>

    <div>
        <label for="caseID"><b>Case ID</b></label>
        <input type="text" name="caseID" class="caseID" id="caseID" placeholder="Case ID" required>
    </div>

    <div>
        <label for="billing"><b>Your Billing Hours</b></label>
        <input type="text" name="billing" class="billing" id="billing" placeholder="Billing Info" required>
    </div>

    <button type="submit">Request</button>
    <button type="button" onclick="closeForm()">Close</button>
</form>

</div>

<?php
// Check if the form is submitted
if (isset($_POST['billing'])){
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

    // Prepare SQL statement to fetch lawyerID based on the provided lawyer name
    $sql = "SELECT lawyerID FROM lawyer WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $lawyer_name);

    // Get form data
    $lawyer_name = $_POST["lawyer_name"];
    $clientID = $_POST["clientID"];
    $caseID = $_POST["caseID"];
    $billinghours = $_POST["billing"];

    // Execute the statement to fetch lawyerID
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch lawyerID
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lawyerID = $row["lawyerID"];

        // Check if the case already has a lawyer assigned
        $sql_check_assignment = "SELECT * FROM assignment WHERE caseID = ?";
        $stmt_check_assignment = $conn->prepare($sql_check_assignment);
        $stmt_check_assignment->bind_param("i", $caseID);
        $stmt_check_assignment->execute();
        $result_check_assignment = $stmt_check_assignment->get_result();

        if ($result_check_assignment->num_rows > 0) {
            echo "<script>alert('This case already has a lawyer assigned to it.')</script>";
        } else {
            // Prepare SQL statement to insert data into the assignment table
            $sql_insert_assignment = "INSERT INTO assignment (clientID, lawyerID, caseID, billinghours) VALUES (?, ?, ?, ?)";
            $stmt_insert_assignment = $conn->prepare($sql_insert_assignment);
            $stmt_insert_assignment->bind_param("iiis", $clientID, $lawyerID, $caseID, $billinghours);

            // Execute the statement to insert into the assignment table
            if ($stmt_insert_assignment->execute()) {
                echo "<script>alert('Request Sent')</script>";
            } else {
                echo "Error: " . $sql_insert_assignment . "<br>" . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Lawyer not found.')</script>";
    }

    // Close statements and connection
    $stmt->close();
    $stmt_check_assignment->close();
    $stmt_insert_assignment->close();
    $conn->close();
}
?>

<div class="form-popup13" id="myForm">
    <form  method="post">
      <h2>Find Available Cases</h2>
  <label for="speciality">Find Cases:</label>
  <button type="submit" name="special">Enter</button>
 </form>
</div>


<?php
if (isset($_POST['special'])){
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

    // Query to fetch all cases along with client information and description
    $sql = "SELECT cases.caseID, cases.date, case_description.description, client.FullName AS client_name, client.ClientID AS client_ID
            FROM cases
            INNER JOIN case_description ON cases.caseID = case_description.caseID
            INNER JOIN client ON cases.clientID = client.clientID
            WHERE cases.caseID NOT IN (SELECT caseID FROM assignment)";

    $result = $conn->query($sql);

    // Check if there are any cases
    if ($result->num_rows > 0) {
        echo "<div class='case-container'>";
        echo "<table class='case-table'>";
        echo "<tr><th>Case ID</th><th>Date</th><th>Description</th><th>Client</th><th>ClientID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["caseID"]. "</td><td>" . $row["date"]. "</td><td>" . $row["description"]. "</td><td>" . $row["client_name"]. "</td><td>" . $row["client_ID"]. "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No cases found.";
    }

    // Close database connection
    $conn->close();
}
?>

<div class="form-popup123" id="myForm">
    <h2>Cases You Have Taken Currently</h2>
    <form method="POST">
        <label for="lawID">Lawyer ID:</label>
        <input type="text" id="lawID" name="lawID">
        <button type="submit">Show Cases</button>
    </form>
</div>
<?php
    if(isset($_POST['lawID'])) {
        $lawyerID = $_POST['lawID'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to fetch cases associated with the specified lawyerID
        $sql = "SELECT cases.caseID, case_description.description, cases.clientID
                FROM cases
                INNER JOIN case_description ON cases.caseID = case_description.caseID
                INNER JOIN assignment ON cases.caseID = assignment.caseID
                WHERE assignment.lawyerID = ?";

        // Prepare and bind parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $lawyerID);

        // Execute query
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Display the table header
            echo "<table class='takencase'>";
            echo "<tr><th>Case ID</th><th>Description</th><th>Client ID</th></tr>";

            // Fetch rows and display them in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["caseID"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["clientID"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No cases found for the specified Lawyer ID.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } 

?>
<div class="form-popup14" id="myForm">
<h2>Check for any client requests</h2>
<form method="post">
    <label for="lawyerName">Your Name:</label>
    <input type="text" id="lawyerName" name="lawyer_Name" required><br><br>

    <button type="submit">Refresh</button>
</form>
</div> 

<?php
// Check if the form is submitted
if (isset($_POST['lawyer_Name'])) {
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

    // Get the lawyer's name from the form
    $lawyer_name = $_POST["lawyer_Name"]; // Change this to the name of the lawyer

    // Prepare SQL statement to fetch lawyerID based on the provided lawyer name
    $sql = "SELECT lawyerID FROM lawyer WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $lawyer_name);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the lawyer was found
    if ($result->num_rows > 0) {
        // Fetch the lawyerID
        while ($row = $result->fetch_assoc()) {
            $lawyerID = $row["lawyerID"];
    
            // Prepare SQL statement to fetch assignment table data along with lawyer's name, case ID, and case description based on lawyerID
            $sql = "SELECT a.*, l.Name AS lawyerName, c.caseID, cd.description AS caseDescription
        FROM assignment a
        INNER JOIN lawyer l ON a.lawyerID = l.lawyerID
        INNER JOIN cases c ON a.caseID = c.caseID
        INNER JOIN case_description cd ON c.caseID = cd.caseID
        LEFT JOIN contacts con ON a.lawyerID = con.lawyerID
        WHERE con.lawyerID IS NULL
        AND a.lawyerID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $lawyerID);
    
            // Execute the statement
            $stmt->execute();
            $result_assignment = $stmt->get_result();
    
            // Display the assignment table data along with lawyer's name, case ID, and case description
            if ($result_assignment->num_rows > 0) {
                echo "<table class='assignment-table-lawyer'>";
                echo "<tr><th>ClientID</th><th>Lawyer Name</th><th>Case ID</th><th>Case Description</th><th>Billing Hours</th><th>Action</th></tr>";
                while ($row_assignment = $result_assignment->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row_assignment["clientID"] . "</td>";
                    echo "<td>" . $row_assignment["lawyerName"] . "</td>";
                    echo "<td>" . $row_assignment["caseID"] . "</td>";
                    echo "<td>" . $row_assignment["caseDescription"] . "</td>";
                    echo "<td>" . $row_assignment["billinghours"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='clientID' value='" . $row_assignment["clientID"] . "'>";
                    echo "<input type='hidden' name='lawyerID' value='" . $row_assignment["lawyerID"] . "'>";
                    echo "<input type='hidden' name='caseID' value='" . $row_assignment["caseID"] . "'>";
                    echo "<button type='submit' name='reject' value='" . $row_assignment["clientID"] . "-" . $row_assignment["lawyerID"] . "-" . $row_assignment["caseID"] . "' class='btn-reject'>Reject</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<script>alert('Not Found')</script>";
            }
        }
    } else {
        echo "No available lawyers without contacts found.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}


// Check if the reject button is clicked
if (isset($_POST['reject'])) {
    
    // Split the value to get clientID, lawyerID, and caseID
    $values = explode("-", $_POST['reject']);
    $clientID = $values[0];
    $lawyerID = $values[1];
    $caseID = $values[2];

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

    // Prepare SQL statement to delete the assignment entry
    $sql = "DELETE FROM assignment WHERE clientID = ? AND lawyerID = ? AND caseID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $clientID, $lawyerID, $caseID);
    $stmt->execute();

    // Check if the assignment entry is deleted
    if ($stmt->affected_rows > 0) {
        echo "Assignment rejected successfully.";
    } else {
        echo "Error: Unable to reject assignment.";
    }

    // Close connection
    $conn->close();
}
// Check if the approve button is clicked
if (isset($_POST['approve'])) {
    // Split the value to get clientID, lawyerID, and caseID
    $values = explode("-", $_POST['approve']);
    $clientID = $values[0];
    $lawyerID = $values[1];
    $caseID = $values[2];

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

    // Display JavaScript alert
    echo "<script>alert('Assignment approved successfully.');</script>";
    // Close connection
    $conn->close();
}
?>
<div class="form-popup15" id="myForm">
    <h2>Insert Case Status</h2>
    <p>After recieving a request, if you wish to take the case then you must register it. If you have sent a request, and within three days you find that the case is not showing in available cases, then you must register it.</p>
    <form method="post">
        <label for="lawyerID">Lawyer ID:</label>
        <input type="text" id="lawyerID" name="lawyerID" required><br><br>

        <label for="courtID">Court ID:</label>
        <input type="text" id="courtID" name="casestatID" required><br><br>

        <button type="submit">Submit</button>
    </form>
</div>


<?php
if (isset($_POST['casestatID'])){
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

    // Get form data
    $lawyerID = $_POST["lawyerID"];
    $courtID = $_POST["casestatID"];

    // Default value for casestatus
    $casestatus = "pending";

    // Check if the combination of lawyerID and courtID already exists in the contacts table
    $sql_check = "SELECT * FROM contacts WHERE lawyerID = ? AND courtID = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $lawyerID, $courtID);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // If the combination exists, update the status
        $sql_update = "UPDATE contacts SET casestatus = ? WHERE lawyerID = ? AND courtID = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sii", $casestatus, $lawyerID, $courtID);
        if ($stmt_update->execute()) {
            echo "<script>alert('Status updated successfully.')</script>";
        } else {
            echo "<script>alert('Error updating case status.')</script>" . $conn->error;
        }
    } else {
        // If the combination doesn't exist, insert a new entry with default casestatus
        $sql_insert = "INSERT INTO contacts (lawyerID, courtID, casestatus) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iis", $lawyerID, $courtID, $casestatus);
        if ($stmt_insert->execute()) {
            echo "<script>alert('New status reported to court successfully.')</script>";
        } else {
            echo "<script>alert('Error reporting case status.')</script>" . $conn->error;
        }
    }

    // Close statement and connection
    $stmt_check->close();
    $stmt_update->close();
    $stmt_insert->close();
    $conn->close();
}
?>



</div>
  </div>
</body>
