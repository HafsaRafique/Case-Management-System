<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register as Lawyer</title>
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
					
					<div class="form-group">
        <label for="speciality" style="margin-left:70px;">Speciality:</label>
        <select name="speciality[]" id="speciality" multiple>
            <option value="Family Law">Family Law</option>
            <option value="Criminal Law">Criminal Law</option>
            <option value="Corporate Law">Corporate Law</option>
			<option value="Real Estate Law">Real Estate Law</option>
            <!-- Add more options for other specialties -->
        </select>
    </div>

					
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="street" class="street" id="address" placeholder="Address" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="zip" class="zip" id="zipcode" placeholder="Zip Code" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="state" class="state" id="state" placeholder="State" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="phone" class="phone" id="telephone" placeholder="Telephone" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="city" id="city" class="input-text" placeholder="City">
					</div>
					<div class="form-row">
						<input type="text" name="Password" id="password" class="input-text" placeholder="Password">
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
    // Establish a connection to your database
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

    // Prepare SQL INSERT statement for the lawyer table
    $name = $_POST["first_name"];
    $address = $_POST["street"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $telephone = $_POST["phone"];
    $zipcode = $_POST["zip"];
    $password = $_POST["Password"];

    // Prepare SQL INSERT statement for the lawyer table
    $sql_lawyer = "INSERT INTO lawyer (Name, Address, State, City, Telephone, Zipcode, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_lawyer = $conn->prepare($sql_lawyer);
    $stmt_lawyer->bind_param("sssssss", $name, $address, $state, $city, $telephone, $zipcode, $password);

    // Execute the statement for the lawyer table
    if ($stmt_lawyer->execute()) {
        echo "New lawyer record inserted successfully.";
        // Get the ID of the inserted lawyer
        $lawyerID = $stmt_lawyer->insert_id;

        // Handle multiple specialties
        if (isset($_POST["speciality"]) && is_array($_POST["speciality"])) {
            // Prepare SQL INSERT statement for the lawyer_speciality table
            $sql_speciality = "INSERT INTO lawyer_speciality (lawyerID, speciality) VALUES (?, ?)";
            $stmt_speciality = $conn->prepare($sql_speciality);

            // Bind parameters for the lawyer_speciality table
            $stmt_speciality->bind_param("is", $lawyerID, $speciality);

            // Insert each selected specialty into the lawyer_speciality table
            foreach ($_POST["speciality"] as $selected_speciality) {
                $speciality = $selected_speciality;
                if ($stmt_speciality->execute()) {
                    echo "Speciality record inserted successfully.";
                } else {
                    echo "Error: " . $stmt_speciality->error;
                }
            }

            // Close the prepared statement for lawyer_speciality
            $stmt_speciality->close();
        } else {
            echo "No specialties selected.";
        }
    } else {
        echo "Error: " . $stmt_lawyer->error;
    }

    // Close the prepared statement for lawyer
    $stmt_lawyer->close();

    // Close database connection
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