<?php 

session_start();

//initializing the variables
$username="";
$email="";

$errors= array();

//connect to database
$db=mysqli_connect('localhost','root','','practice') or die('could not connect to database');

//register users
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//form validation
if (empty($username)) {array_push($errors, 'Username is required');}
if (empty($email)) {array_push($errors, 'Email is required');}
if (empty($password_1)) {array_push($errors, 'Password is required');}
if ($password_1 != $password_2) {array_push($errors, 'Passwords do not match');}


//check whether the user already have an existing account
$user_check_query = "SELECT * FROM user WHERE username  = '$username' or email = '$email' LIMIT 1";

$results=mysqli_query($db, $user_check_query);
$user=mysqli_fetch_assoc($results);

if ($user) {
	if($user['username'] === $username){array_push($errors, "Username already exist");}
	if($user['email'] === $email){array_push($errors, "Email Id already been used");}
}

//Registering the user if no error
if (count($errors) == 0) {
	$password = md5($password_1); //this will encrypt the password
	$query = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";

	mysqli_query($db, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in";
	header('location: index.php');

}
}
//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}

//Login user 
if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //to ensure that all the fields are filled
    if (empty($username)) {array_push($errors, 'Username is required');}
    if (empty($password)) {array_push($errors, 'Password is required');}

    if (count($errors) == 0) {
    	$password = md5($password); //this will encrypt the password
	    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
	    $results = mysqli_query($db, $query);

	    if (mysqli_num_rows($results)) {
	    	$_SESSION['username'] = $username;
	    	$_SESSION['success'] = "Logged in sucessfully";
	    	header('location: index.php');
	    }
	    else{
	    	array_push($errors, "Wrong username or password. Please try again!");
	    }

    }
}


 ?>
