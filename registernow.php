<?php

include_once("config.php");

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Insert the user into the database
    $sql = "INSERT INTO users (username, first_name, last_name, password, email) VALUES ('$username', '$firstname','$lastname','$password', '$email')";
    if (mysqli_query($conn, $sql)) {

   echo "<b>Registration successful!<b>";
   header('Refresh: 1; URL = login.php');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="stylesheet.css">
		<title> Registration Form </title>
	</head>
	<body>
		<form method="post" action="">
			<h1>Register Now</h1>
			<br>
			<br>
			<label>Username:</label>
			<input type="text" name="username">
			<br>
			<label>Firstname:</label>
			<input type="text" name="firstname">
			<br>
			<label>Lastname:</label>
			<input type="text" name="lastname">
			<br>
			<label>Password:</label>
			<input type="password" name="password">
			<br>
			<label>Email:</label>
			<input type="email" name="email">
			<br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</head>