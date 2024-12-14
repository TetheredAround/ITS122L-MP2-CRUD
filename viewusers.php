<?php
/**
Crud operation by: Felipe Ante Jr 2023
**/

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title>Homepage</title>
	</head>
	<form method="POST" action="add.php">
		<body>
			<h2>Welcome Administrator</h2>
			<br />
			<input type="submit" name="submit" value="Add New User">
			<br />
			<br />
			<table width='80%' border=1>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Operations</th>
				</tr> 
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['first_name']."</td>";
                    echo "<td>".$user_data['last_name']."</td>";
                    echo "<td>".$user_data['mobile']."</td>";
                    echo "<td>".$user_data['email']."</td>";    
                    echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | 
                            <a href='delete.php?id=$user_data[id]'>Delete</a>
                            </td>
                            </tr>";        
                }
                ?>
			</table>
			<a href="logout.php">Log out </a>
		</body>
</html>
