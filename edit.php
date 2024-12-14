<?php

include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE users SET first_name='$first_name',last_name='$last_name', email='$email',mobile='$mobile' WHERE id=$id");
	
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
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title>Edit User Data</title>
	</head>
	<body>
		<a href="viewusers.php">Home</a>
		<br />
		<br />
		<form name="update_user" method="post" action="edit.php">
			<table border="0">
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="first_name" value=<?php echo $first_name;?>>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" name="last_name" value=<?php echo $last_name;?>>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" name="email" value=<?php echo $email;?>>
					</td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td>
						<input type="text" name="mobile" value=<?php echo $mobile;?>>
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					</td>
					<td>
						<input type="submit" name="update" value="Update">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>