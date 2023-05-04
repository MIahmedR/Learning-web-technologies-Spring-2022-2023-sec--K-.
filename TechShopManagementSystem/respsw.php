<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<style>
		body {
			background-color: #F3F3F3;
			font-family: Arial, sans-serif;
			color: #333333;
			margin: 0;
			padding: 0;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
		}
		form {
			background-color: #FFFFFF;
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
			width: 400px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="email"],
		input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #CCCCCC;
			margin-bottom: 20px;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #FFFFFF;
			border: none;
			padding: 10px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			transition: background-color 0.3s;
		}
		input[type="submit"]:hover {
			background-color: #3E8E41;
		}
		p {
			text-align: center;
			margin-top: 20px;
		}
		p.error {
			color: #FF0000;
		}
		p.success {
			color: #008000;
		}
	</style>
</head>
<body>
	<h1>Reset Password</h1>

	<?php
	if(isset($_GET['token'])) {
		$token = $_GET['token'];
		$email = $_GET['email'];

		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "user_info";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		
		$sql = "SELECT * FROM reset_tokens WHERE email='$email' AND token='$token'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$valid_token = true;
		} else {
			$valid_token = false;
		}

		if($valid_token) {
			echo "<form method='POST'>";
			echo "<label for='new_password'>New Password:</label>";
			echo "<input type='password' name='new_password' id='new_password' required><br><br>";
			echo "<label for='confirm_password'>Confirm Password:</label>";
			echo "<input type='password' name='confirm_password' id='confirm_password' required><br><br>";
			echo "<input type='hidden' name='token' value='$token'>";
			echo "<input type='hidden' name='email' value='$email'>";
			echo "<input type='submit' name='submit' value='Reset Password'>";
			echo "</form>";

			if(isset($_POST['submit'])) {
				$new_password = $_POST['new_password'];
				$confirm_password = $_POST['confirm_password'];
				$token = $_POST['token'];
				$email = $_POST['email'];

				if($new_password != $confirm_password) {
					echo "<p style='color:red;'>Passwords do not match!</p>";
				} else {
					
					$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

					
					$sql = "UPDATE sign_up SET password='$hashed_password' WHERE email='$email'";
					if ($conn->query($sql) === TRUE) {
						
						$sql = "DELETE FROM reset_tokens WHERE email='$email' AND token='$token'";
						if ($conn->query($sql) === TRUE) {
							echo "<p style='color:green;'>Password reset successfully!</p>";
						} else {
							echo "<p style='color:red;'>Error deleting token: " . $conn->error . "</p>";
						}
					} else {
						echo "<p style='color:red;'>Error updating password: " . $conn->error . "</p>";
					}
				}
			}

		} else {
			echo "<p style='color:red;'>Invalid or expired token!</p>";
		}

		
		$conn->close();

	} else {
		echo "<p style='color:red;'>Email not found!</p>";
	}
?>

</body>
</html>
