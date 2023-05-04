<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
			color: #333;
		}

		form {
			width: 400px;
			margin: 0 auto;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.3);
			padding: 20px;
			box-sizing: border-box;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #333;
		}

		input[type="email"],
		input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-bottom: 20px;
			box-sizing: border-box;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		p {
			text-align: center;
			margin-top: 20px;
			font-size: 14px;
			color: #333;
			text-decoration: none;
		}

		a {
			color: #4CAF50;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		.error {
			color: red;
			font-size: 14px;
			margin-top: 10px;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Login Page</h1>
	<form method="POST" id="login-form">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br><br>

		<input type="submit" name="submit" value="Login">
	</form>
	<p>Forgot your password? <a href="fpassw.php">Click here</a></p>

	<script>
	  function validateForm() {
	    var email = document.getElementById("email").value;
	    var password = document.getElementById("password").value;

	    
	    if (email == "" || password == "") {
	      alert("Please enter email and password.");
	      return false;
	    }

	  
	    var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	    if (!email_regex.test(email)) {
	      alert("Please enter a valid email address.");
	      return false;
	    }

	    
	    return true;
	  }

	  
	  document.getElementById("login-form").addEventListener("submit", function(event) {
	    if (!validateForm()) {
	      event.preventDefault();
	    }
	  });
	</script>
	<?php
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "user_info";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM sign_up WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            header("Location: landingpage.php");
            exit;
        } else {
            echo "<p style='color:red;'>Invalid email or password!</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid email or password!</p>";
    }

    $conn->close();
}
?>

</body>
</html>