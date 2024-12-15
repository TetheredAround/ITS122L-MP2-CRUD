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
    $phone = $_POST["phone"]; 

    // Insert the user into the database
    $sql = "INSERT INTO users (username, first_name, last_name, password, email, phone) VALUES ('$username', '$firstname','$lastname','$password', '$email', '$phone')";
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
	<link rel="stylesheet" href="styles.css">
    <title> Registration Form </title>
</head>
<body class="register">
    <div class="register-container">
        <h1>Register Now</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-grid">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="submit">Register</button>

            <?php
            if(!empty($login_err)){
                echo '<div class="error-message">' . $login_err . '</div>';
            } 
            ?>

            <a href="login.php">Already have an account? Log-in!</a>
        </form>
    </div>
</body>
</html>
