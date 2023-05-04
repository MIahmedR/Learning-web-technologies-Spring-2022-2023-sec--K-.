<!DOCTYPE html>
<html>
<head>
	<title>Techshop Management System</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			padding: 50px 0;
			color: #333;
		}

		a {
			text-decoration: none;
			color: #fff;
			padding: 10px 20px;
			border-radius: 4px;
			background-color: #4CAF50;
			transition: background-color 0.3s ease;
		}

		a:hover {
			background-color: #3e8e41;
		}

		p {
			text-align: center;
			font-size: 18px;
			color: #666;
			margin: 0;
			padding: 20px 0;
		}
	</style>
</head>
<body>
	<h1 id="greeting"></h1>

	<p>If you are a new user, please <a href="signup.php">signup</a> to create an account.</p>

	<p>If you are an existing user, please <a href="logincheck.php">login</a> to access your account.</p>

	<script>
		
		var today = new Date();
		var hourNow = today.getHours();

		
		var greeting;
		if (hourNow >= 18) {
			greeting = "Good evening!";
		} else if (hourNow >= 12) {
			greeting = "Good afternoon!";
		} else if (hourNow >= 0) {
			greeting = "Good morning!";
		} else {
			greeting = "Hello!";
		}

		
		document.getElementById("greeting").textContent = greeting;
	</script>
</body>

</html>
