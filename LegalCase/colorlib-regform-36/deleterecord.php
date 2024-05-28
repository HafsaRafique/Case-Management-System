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
// Check if clientID parameter is set in the URL
if(isset($_GET['clientID'])) {
    // Sanitize the input to prevent SQL injection
    $clientID = intval($_GET['clientID']);

   

    // Prepare SQL statement to delete the record
    $sql = "DELETE FROM client WHERE clientID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $clientID);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Record deleted successfully, redirect to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    // If clientID parameter is not set, redirect to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
