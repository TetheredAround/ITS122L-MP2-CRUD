<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>Add Users</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>FirstName</td>
				<td><input type="text" name="first_name"></td></tr>

				<tr>	
					<td>LastName</td>
				<td><input type="text" name="last_name"></td>
			</tr>

			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>

			<tr> 
				<td>Mobile</td>
				<td><input type="text" name="mobile"></td>
			</tr>

			<tr> 
				<td>Description</td>
				<td><input type="text" name="description"></td>
			</tr>

			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>

		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$desc = $_POST['description'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO users(first_name,last_name,email,mobile,emp_desc) VALUES('$first_name','$last_name','$email','$mobile','$desc')");
		
		// Show message when user added
		echo "User added successfully. <a href='viewusers.php'>View Users</a>";
	}
	?>
</body>
</html>
