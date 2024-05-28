<!doctype html>
<html lang="en">
  <head>
  	<title>Login For Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
<link href="css/responsive.css" rel="stylesheet" />


</head>

<body>


	</head>
	<body class="bi1">
    
	<section class="ftco-section"  >
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"  style="color: white">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Check if the form is submitted and the fullname and password are provided
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fullname"]) && isset($_POST["password"])) {
        // Prepare a SQL statement to verify login based on FullName and Password
        $sql = "SELECT * FROM Court WHERE Name = ? AND Password = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $_POST["fullname"], $_POST["password"]);
        $stmt->execute();

        if ($stmt->error) {
            die("Error executing statement: " . $stmt->error);
        }

        $result = $stmt->get_result();

        // Check if a matching record is found
        if ($result->num_rows == 1) {
            // Fetch the user's full name
            $row = $result->fetch_assoc();
            $fullname = $row["Name"];

            // Redirect to the home page with welcome message
            header("Location: ..\colorlib-regform-36\panel.php?fullname=" . urlencode($fullname));
            exit(); // Stop further execution
        } else {
            // Set error message for incorrect credentials
            $error = 'wrong_credentials';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Invalid request";
    }

    // Close the connection
    $conn->close();
}
?>

<form class="login-form" method="post">
    <div class="form-group">
        <input type="text" class="form-control rounded-left" name="fullname" id="fullname" placeholder="Username" required>
    </div>
    <div class="form-group d-flex">
        <input type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
        <?php if (isset($error) && $error === 'wrong_credentials'): ?>
            <div class="alert alert-danger" role="alert">
                Wrong username and password combination. Please try again.
            </div>
        <?php endif; ?>
    </div>
</form>

	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>



	</body>
</html>

