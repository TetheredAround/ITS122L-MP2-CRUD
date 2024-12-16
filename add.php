<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['add'])) {
	$uname = $_POST['username'];
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$desc = $_POST['emp_desc'];

	$is_admin = 0;

	if (isset($_POST['admin-priv'])) {
		$is_admin = ($_POST['admin-priv'] === 'true') ? 1 : 0;
	}

	$password = $_POST['password'];
	
	// include database connection file
	include_once("config.php");
			
	// Insert user data into table
	$result = mysqli_query($conn, "INSERT INTO users(username,first_name,last_name,is_admin,email,password,mobile,emp_desc) VALUES('$uname','$first_name','$last_name','$is_admin','$email','$password','$mobile','$desc')");
	
	header('Refresh: 1; URL = viewusers.php');

}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles.css">
    <title> Add User </title>
	<script src="script.js"></script>
</head>
<body class="register">
    <div class="edit-container">
        <h1>Add User</h1>
		<br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="edit-form-grid">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="mobile" placeholder="Mobile Number" required>
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="E-mail Address" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="text" class="emp_desc" name="emp_desc" placeholder="Description" required>
				<label for="admin-priv">Admin Privileges:</label>
				<input type="checkbox" id="admin-priv" name="admin-priv" value="true">
            </div>
			<div class="button-container">
				<a href="viewusers.php" class="logout-btn">Cancel</a>
				<input type="submit" name="add" value="Add" class="add-user-btn" onclick="return confirmAddUser();">
			</div>

            <?php
            if(!empty($login_err)){
                echo '<div class="error-message">' . $login_err . '</div>';
            } 
            ?>
        </form>
    </div>
</body>
</html>