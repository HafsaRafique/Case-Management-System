<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve form data
$fullname = $_POST['first_name'];
$dob = $_POST['dob'];
$address = $_POST['street'];
$clientID = $_POST['clientID'];
$city = $_POST['city'];
$telephone = $_POST['phone'];

// Update query
// Escape variables to prevent SQL injection
$fullname = $conn->real_escape_string($fullname);
$dob = $conn->real_escape_string($dob);
$address = $conn->real_escape_string($address);
$state = $conn->real_escape_string($state);
$city = $conn->real_escape_string($city);
$telephone = $conn->real_escape_string($telephone);
$sql = "UPDATE client SET FullName='$fullname', DOB='$dob', Address='$address', City='$city', Telephone='$telephone' WHERE ClientID=$clientID";

if ($conn->query($sql) === TRUE) {
    // Records updated successfully
    // Redirect to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    // Display JavaScript alert
    echo "<script>alert('Records updated successfully.')</script>";
    exit();
} else {
    echo "Error updating client record: " . $conn->error;
}
// Close the connection
$conn->close();

