<!DOCTYPE html> 
<html> 

<head> 
	<title>Registration Page</title> 
	<link rel="stylesheet" type="text/css" href="css/style 2.css"> 
	<link rel="shortcut icon" href="images/favicon.png" type="">
</head> 

<body> 
	<div class="container"> 
		<h1>Registration Page</h1> 
		<form method="post" action="register.php"> 

			<label for="username"> Username: </label> 
			<input type="text" id="username" name="username" required> 

			<label for="email">Email:</label> 
			<input type="email" id="email" name="email" required> 

			<label for="password">Password:</label> 
			<input type="password" id="password" name="password" required> 

			<input type="submit" value="Register"> 
		</form> 
		<p> Already have an account?</p> 
		<a href="login1.php">Click Here</a> 
	</div> 
	<br> 
</body> 

</html>