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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data for lawyer table
    $lawyerID = $_POST['lawyerID'];
    $name = $_POST['first_name'];
    $address = $_POST['street'];
    $city = $_POST['city'];
    $telephone = $_POST['phone'];


    $sqlLawyer = "UPDATE lawyer SET Name='$name', Address='$address', City='$city', Telephone='$telephone' WHERE lawyerID=$lawyerID";

    if ($conn->query($sqlLawyer) === TRUE) {
        echo "Record updated successfully in lawyer table";
    } else {
        echo "Error updating record in lawyer table: " . $conn->error;
    }

    // Extract form data for lawyer_speciality table
    $speciality = $_POST['speciality'];

    // Update query for lawyer_speciality table
    $sqlSpeciality = "UPDATE lawyer_speciality SET speciality='$speciality' WHERE lawyerID=$lawyerID";

    if ($conn->query($sqlSpeciality) === TRUE) {
        echo "<script>alert('Record updated successfully in lawyer_speciality table')</script>";
    } else {
        echo "Error updating record in lawyer_speciality table: " . $conn->error;
    }
}

// Close the connection
$conn->close();
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
