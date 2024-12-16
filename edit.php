<?php

include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$first_name=$_POST['firstname'];
	$last_name=$_POST['lastname'];
	$mobile=$_POST['phone'];
	$email=$_POST['email'];
	$desc = $_POST['emp_desc'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE users SET first_name='$first_name',last_name='$last_name', email='$email',mobile='$mobile', username='$username', emp_desc='$desc' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: viewusers.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$first_name = $user_data['first_name'];
	$last_name = $user_data['last_name'];
	$email = $user_data['email'];
	$mobile = $user_data['mobile'];
	$username = $user_data['username'];
	$desc = $user_data['emp_desc'];
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
    <title> Registration Form </title>
</head>
<body class="register">
    <div class="edit-container">
        <h1>Edit User <?php echo $username?></h1>
		<br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="edit-form-grid">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username?>" required>
                <input type="text" name="phone" placeholder="Mobile Number" value="<?php echo $mobile?>" required>
                <input type="text" name="firstname" placeholder="First Name" value="<?php echo $first_name?>" required>
                <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $last_name?>" required>
                <input type="email" name="email" placeholder="E-mail Address" value="<?php echo $email?>" required>
				<input type="text" name="emp_desc" placeholder="Description" value="<?php echo $desc?>" required>
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            </div>
			<div class="button-container">
				<a href="viewusers.php" class="logout-btn">Cancel </a>
				<input type="submit" name="update" value="Update" class="add-user-btn">
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