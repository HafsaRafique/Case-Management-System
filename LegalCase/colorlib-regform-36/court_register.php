<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Court</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/responsive.css" rel="stylesheet" />


</head>


	<body>
	<div class="page-content">
    <div class="form-v10-content">
        <form class="form-detail" method="post" id="myform">
            <div class="form-left">
                <h2>General Information</h2>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="Name" id="Name" class="input-text" placeholder="Court Name" required>
                    </div>
                </div>
               
                
            </div>
            <div class="form-right">
                <h2>Contact Details</h2>

                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="Zip" id="Zip" class="input-text" placeholder="Zip Code" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="City" id="City" class="input-text" placeholder="City">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="Address" id="Address" class="input-text" placeholder="Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="pass" id="pass" class="input-text" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Register">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
$courtName = $_POST['Name'];
$address = $_POST['Address'];
$city = $_POST['City'];
$zip = $_POST['Zip'];
$pass= $_POST['pass'];

// Check if court already exists
$sql_check = "SELECT * FROM court";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Court already registered
    die("<script>alert('Court already registered.')</script>");
} else {
    // Insert court information into the database
    $sql_insert = "INSERT INTO court (Name, Address, City, Zipcode, Password) VALUES ('$courtName', '$address', '$city', '$zip', '$pass')";
    
    if ($conn->query($sql_insert) === TRUE) {
        // Court registered successfully
        echo "alert('Court registered successfully.');";
    } else {
        echo "alert('Error: " . $conn->error . "');";
    }
}
// Close connection
$conn->close();
}
?>

	
</body>
</html>