<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   header('Refresh: 1; URL = logoutredirect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <title>Logging out...</title>
</head>
<body class="register">
<div class="login-container">
		<h1>Logging out...</h1>
      <div class="progress-bar">
         <span></span>
      </div>
</div>
</body>
</html>