<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	$email = $_POST["email"]; 
	$password = $_POST["password"]; 

	// Connect to the database 
	$host = "localhost"; 
	$dbname = "eCommerce"; 
	$username_db = "root"; 
	$password_db = ""; 

	try { 
		$db = new PDO( 
			"mysql:host=$host;dbname=$dbname", 
			$username_db, 
			$password_db
		); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

		// Check if the user exists in the database 
		$stmt = $db->prepare("SELECT * FROM users WHERE email = :email"); 
		$stmt->bindParam(":email", $email); 
		$stmt->execute(); 
		$user = $stmt->fetch(PDO::FETCH_ASSOC); 

		if ($user) { 
			// Verify the password 
			if (password_verify($password, $user["password"])) { 
				session_start(); 
				$_SESSION["user"] = $user; 

				echo '<script type="text/javascript"> 
						window.onload = function () { 
							window.location.href = "index.php"; 
						}; 
					</script> 
					'; 
			} else { 
				echo "<h2>Login Failed</h2>"; 
				echo "Invalid email or password."; 
			} 
		} else { 
			echo "<h2>Login Failed</h2>"; 
			echo "User doesn't exist"; 
		} 
	} catch (PDOException $e) { 
		echo "Connection failed: " . $e->getMessage(); 
	} 
} 
?>
