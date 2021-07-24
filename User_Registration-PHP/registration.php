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

			<h2>Register</h2>

		</div>

		<form action="registration.php" method="post">

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label for="username"> Username: </label>
				<input type="text" name="username" required>
			</div>

			<div class="input-group">
				<label for="email"> Email_id: </label>
				<input type="email" name="email" required>
			</div>

			<div class="input-group">
				<label for="password"> Password: </label>
				<input type="password" name="password_1" required>
			</div>

			<div class="input-group">
				<label for="password"> Confirm Password: </label>
				<input type="password" name="password_2" required>
			</div>

			<button type="submit" name="reg_user" class="btn"> Submit </button>
			<p>Already have an account? <a href="login.php"><b>Log In</b></a></p>
		</form>

	</div>
</body>