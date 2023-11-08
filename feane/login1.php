<!DOCTYPE html> 
<html> 

<head> 
	<title>Login Page</title> 
	<link rel="stylesheet" type="text/css" href="css/style 2.css"> 
</head> 

<body> 
	<div class="container"> 
		<h1>Login Page</h1> 
		<form method="post" action="login.php"> 
			<label for="username">Email:</label> 
			<input type="email" id="email" name="email" required> 

			<label for="password">Password:</label> 
			<input type="password" id="password" name="password" required> 

			<input type="submit" value="Login"> 
		</form> 
		<br><br> 
		<p> Does not have an account? 
			<a href="register1.php">Click Here</a> 
		</p> 
	</div> 
</body> 

</html>
