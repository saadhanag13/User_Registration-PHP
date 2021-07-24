<?php  include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">

		<div class="header">

			<h2>LogIn</h2>

		</div>

		<form action="login.php" method="post">

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label for="username"> Username: </label>
				<input type="text" name="username" required>
			</div>

			<div class="input-group">
				<label for="password"> Password: </label>
				<input type="password" name="password" required>
			</div>

			<button type="submit" name="login" class="btn"> Log In </button>
			<p> Not a User? <a href="registration.php"><b> Register </b></a></p>
		</form>

	</div>
</body>