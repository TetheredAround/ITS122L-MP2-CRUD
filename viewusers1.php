<?php
//ADMIN SIDE
/**
Crud operation by: Felipe Ante Jr 2023 
*/

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
        <link rel="stylesheet" href="styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title>Homepage</title>

        <script>
            // Function to format and display the current date
            function displayDate() {
                const dateElement = document.getElementById('date-display');
                const now = new Date();
                const formattedDate = now.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                dateElement.textContent = formattedDate;
            }

            // Call the function when the page loads
            window.onload = displayDate;
        </script>

	</head>
	<form method="POST" action="add.php">
		<body class="viewuser">
            <div id="date-display" class="date-display"></div>
            <div class="viewuser-container">
			<h2>Welcome, Employee!</h2>
            <div class="table-container">
			<table class="table table-bordered">
                <thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Mobile Number</th>
					<th>Email Address</th>
				</tr> 
            </thead>
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['first_name']."</td>";
                    echo "<td>".$user_data['last_name']."</td>";
                    echo "<td>".$user_data['mobile']."</td>";
                    echo "<td>".$user_data['email']."</td>";        
                }
                ?>
			</table>
            </div>
            <div class="button-container">
			<a href="logout.php" class="logout-btn">Log out </a>
            </div>
        </div>
		</body>
</html>
