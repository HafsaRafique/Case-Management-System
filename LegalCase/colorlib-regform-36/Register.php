<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register as client</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
<link href="css/responsive.css" rel="stylesheet" />
<link href="styles.css" rel="stylesheet" />


</head>


	<body>
		<button class="btn1">Back</button>
	<div class="page-content">
	
		<div class="form-v10-content">
			<form class="form-detail" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>
					

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="first_name" id="first_name" class="input-text" placeholder="Full Name" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="dob" id="dob" class="input-text" placeholder="DOB" required>
						</div>
					</div>
					
					
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="street" class="street" id="street" placeholder="Address" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="zip" class="zip" id="zip" placeholder="Zip Code" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="state" class="state" id="state" placeholder="State" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="phone" class="phone" id="phone" placeholder="Telephone" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="city" id="city" class="input-text" placeholder="City">
					</div>
					<div class="form-row">
						<input type="text" name="password" id="password" class="input-text" placeholder="Password">
					</div>
					
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Register">
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   //make sure the entry is same as name, and binding must be correct
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO client (FullName, Address, State, City, Telephone, Zipcode, DOB, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss",$fullname, $address, $state, $city, $telephone, $zipcode, $dob, $password);

    // Set parameters
    $fullname = $_POST["first_name"];
    $address = $_POST["street"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $telephone = $_POST["phone"];
    $zipcode = $_POST["zip"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>

</body>
<script>
	function handleSelectionChange() {
		var selectedValue = document.getElementById('title').value;
		var specialityField = document.getElementById('speciality-field');
		
		if (selectedValue === 'lawyer') {
			specialityField.style.display = 'block';
		} else {
			specialityField.style.display = 'none';
		}
	}
</script><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>