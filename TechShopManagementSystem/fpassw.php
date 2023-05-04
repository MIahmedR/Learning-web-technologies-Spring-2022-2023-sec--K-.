<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			max-width: 500px;
			margin: auto;
			padding: 20px;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			color: #333333;
		}
		form {
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #aaaaaa;
		}
		label {
			display: inline-block;
			margin-bottom: 10px;
			color: #333333;
		}
		input[type="email"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #aaaaaa;
		}
		input[type="submit"] {
			background-color: #007bff;
			color: #ffffff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			cursor: pointer;
			transition: background-color 0.3s;
		}
		input[type="submit"]:hover {
			background-color: #0062cc;
		}
		p {
			margin-top: 20px;
			font-size: 14px;
			color: #333333;
			text-align: center;
		}
		p a {
			color: #007bff;
			text-decoration: none;
		}
		p a:hover {
			text-decoration: underline;
		}
		p.error {
			color: red;
			font-weight: bold;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Forgot Password Page</h1>
	<form method="POST">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>

		<input type="submit" name="submit" value="Reset Password">
	</form>

	<?php
if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_info";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $valid_user = false;
    $sql = "SELECT * FROM sign_up WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $valid_user = true;
    }

    if ($valid_user) {
       
        $token = md5(uniqid());

        
        $sql = "INSERT INTO reset_tokens (email, token, timestamp) VALUES ('$email', '$token', " . time() . ")";
        if ($conn->query($sql) === true) {
            
            header("Location: respsw.php?email=$email&token=$token");
            exit();
        } else {
            echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid email!</p>";
    }

    
    $conn->close();
}
?>

</body>
</html>
