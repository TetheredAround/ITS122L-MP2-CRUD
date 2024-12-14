<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database credentials
    $host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'test';
    
    // Connect to the database
    $conn = mysqli_connect($host, $db_username, $db_password, $database);
    
    // Check for errors
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    // Check if user exists in database
    $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
   

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row["is_admin"] == 1) {
        $_SESSION['username'] = $username;
        header('Location: viewusers.php');
    } else {
        echo "User is not an administrator.";
        $_SESSION['username'] = $username;
        header('Location: viewusers1.php');
    }
} else {
    echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);

}

?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			body {
				background-color: powderblue;
			}

			h1 {
				color: blue;
			}

			p {
				color: red;
			}
		</style>
		<title>Login</title>
	</head>
	<body>
        <center>
		<h1>Login Now</h1>
            <form method="post" action="
                            <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <label>Username (must be email):</label>
                <input type="text" name="username">
                <br>
                <br>
                <label>Password:</label>
                <input type="password" name="password">
                <br>
                <br>
                <input type="submit" value="Login">
                <br>
                <br>
                <h4>No Account Yet? <a href="registernow.php">Register Now</a>
                </h4>
            </form>
        </center>
	</body>
</html>
