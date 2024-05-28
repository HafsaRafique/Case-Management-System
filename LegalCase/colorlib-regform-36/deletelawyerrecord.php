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

// Check if lawyerID parameter is set and not empty in the URL
if (isset($_GET['lawyerID']) && !empty($_GET['lawyerID'])) {
    // Sanitize the input to prevent SQL injection
    $lawyerID = intval($_GET['lawyerID']);

    // Delete related records in lawyer_speciality table
    $sqlDeleteSpeciality = "DELETE FROM lawyer_speciality WHERE lawyerID = $lawyerID";
    if ($conn->query($sqlDeleteSpeciality) === FALSE) {
        echo "Error deleting related records from lawyer_speciality: " . $conn->error;
        exit();
    }

    // Delete related records in assignment table
    $sqlDeleteAssignment = "DELETE FROM assignment WHERE lawyerID = $lawyerID";
    if ($conn->query($sqlDeleteAssignment) === FALSE) {
        echo "Error deleting related records from assignment: " . $conn->error;
        exit();
    }

    // Prepare SQL statement to delete the lawyer record
    $sqlDeleteLawyer = "DELETE FROM lawyer WHERE lawyerID = ?";
    $stmt = $conn->prepare($sqlDeleteLawyer);
    $stmt->bind_param("i", $lawyerID);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Records deleted successfully
        // Redirect to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        // Display JavaScript alert
        echo "<script>alert('Records deleted successfully.')</script>";
        exit();
    } else {
        echo "Error deleting lawyer record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
    // Close the connection
    $conn->close();
} else {
    // If lawyerID parameter is not set or empty, redirect to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>