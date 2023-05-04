<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			color: #333;
		}

		form {
			margin: auto;
			width: 50%;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #333;
		}

		input[type="text"], input[type="email"], input[type="password"] {
			display: block;
			width: 100%;
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}

		input[type="submit"]:hover {
			background-color: #333;
			color: #fff;
		}

		p {
			text-align: center;
			margin-top: 20px;
			color: #333;
		}

		a {
			color: #4CAF50;
			text-decoration: none;
		}

		a:hover {
			color: #333;
		}

		.error {
			color: red;
			margin-bottom: 10px;
		}

		.success {
			color: green;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1>Signup Page</h1>
<form method="POST" onsubmit="return validateForm()">

		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" onkeyup="checkPassword()" required><br><br>
		<span id="password-strength"></span>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" id="confirm_password" onkeyup="checkPassword()" required><br><br>
		<span id="password-match"></span>

		<input type="submit" name="submit" value="Signup">
		<input type="button" value="Clear" onclick="clearForm()">
	</form>
	<p>Already have an account? <a href="logincheck.php">Log in</a></p>

	<script>
	function checkPassword() {
		var password = document.getElementById("password").value;
		var confirm_password = document.getElementById("confirm_password").value;
		var password_strength = document.getElementById("password-strength");
		var password_match = document.getElementById("password-match");

		if (password.length < 8) {
			password_strength.innerHTML = "Password strength: weak";
		} else if (password.length < 12) {
			password_strength.innerHTML = "Password strength: medium";
		} else {
			password_strength.innerHTML = "Password strength: strong";
		}

		if (password == confirm_password) {
			password_match.innerHTML = "Passwords match";
			password_match.style.color = "green";
		} else {
			password_match.innerHTML = "Passwords do not match";
			password_match.style.color = "red";
		}
	}

	function validateForm() {
		var password = document.getElementById("password").value;
		var confirm_password = document.getElementById("confirm_password").value;

		if (password.length < 8) {
			alert("Password must be at least 8 characters long");
			return false;
		}

		if (password != confirm_password) {
			alert("Passwords do not match");
			return false;
		}

		var email = document.getElementById("email").value;
		var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		if (!email_regex.test(email)) {
			alert("Invalid email format");
			return false;
		}

		return true;
	}

	function clearForm() {
		document.getElementById("name").value = "";
		document.getElementById("email").value = "";
		document.getElementById("password").value = "";
		document.getElementById("confirm_password").value = "";
		document.getElementById("password-strength").innerHTML = "";
		document.getElementById("password-match").innerHTML = "";
	}
document.addEventListener('DOMContentLoaded', function() {
document.getElementById("signup-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var form_data = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    alert("Signup successful!");
                    clearForm();
                } else {
                    alert(response.message);
                }
            } else {
                alert("Error: " + xhr.status);
            }
        }
    };
    xhr.open("POST", "signup.php");
    xhr.send(form_data);
});
});

</script>


	<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<p style='color:red;'>Please fill all fields!</p>";
    } elseif ($password != $confirm_password) {
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO sign_up (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === true) {
            echo "<p style='color:green;'>Signup successful!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    
    $conn->close();
}
?>



</body>
</html>
