<?php
session_start();

$login_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database credentials
    $host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'test';
    
    // Connect to the database
    $conn = mysqli_connect($host, $db_username, $db_password, $database, null, '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
    
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
        //echo "User is not an administrator.";
        $_SESSION['username'] = $username;
        header('Location: viewusers1.php');
    }
} else {
    //echo "Invalid username or password.";
    $login_err = "Invalid username or password!";
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
        <link rel="stylesheet" href="styles.css"
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title>Login Page</title>
	</head>
	<body class="register">
        <div class="login-container">
		<h1>Welcome Guest!</h1>
        <h1>Login Now</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="username" placeholder="E-mail/Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
                    <?php
                    if(!empty($login_err)){
                        echo '<div class="error-message">' . $login_err . '</div>';
                    } 
                    ?>
                <a href="registernow.php">Register Now!</a>
            </form>
        </div>
	</body>
</html>
