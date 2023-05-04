<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Techshop</title>
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

		ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
			display: flex;
			justify-content: center;
		}

		li {
			margin: 0 10px;
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
	<h1>Welcome to Techshop</h1>
	<p>You have successfully logged in!</p>
	<ul>
		<li><a href="order_placement.php">Order Placement</a></li>
		<li><a href="settings.php">Settings</a></li>
	</ul>

	<script>
		
		$('a').click(function(e) {
			e.preventDefault(); 
			var href = $(this).attr('href'); 
			
			alert("You clicked the link: " + href);
		});
	</script>
</body>

</html>
