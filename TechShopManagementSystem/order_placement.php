<!DOCTYPE html>
<html>
<head>
	<title>Order Placement</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
			color: #008080;
			font-size: 36px;
		}

		form {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		label {
			margin-right: 10px;
			color: #008080;
			font-weight: bold;
		}

		input[type="text"],
		select {
			padding: 5px;
			border-radius: 5px;
			border: none;
			box-shadow: 1px 1px 5px #ddd;
			margin-right: 10px;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #008080;
			color: white;
			padding: 5px 15px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			font-size: 16px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 30px;
		}

		table th,
		table td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		table th {
			background-color: #008080;
			color: white;
			font-weight: normal;
		}

		button {
			background-color: #008080;
			color: white;
			padding: 5px 15px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			font-size: 16px;
		}

		button:hover,
		input[type="submit"]:hover {
			background-color: #006666;
		}

	</style>
</head>
<body>
	<h1>Order Placement</h1>

	<form method="GET">
		<label for="search">Search:</label>
		<input type="text" name="search" id="search">
		<input type="submit" name="submit" value="Search">
	</form>

	<form method="GET">
		<label for="sort">Sort by:</label>
		<select name="sort" id="sort">
			<option value="price_asc">Price (Low to High)</option>
			<option value="price_desc">Price (High to Low)</option>
			<option value="name_asc">Name (A-Z)</option>
			<option value="type">Product Type</option>
		</select>
		<input type="submit" name="submit" value="Sort">
	</form>

	<form method="GET">
		<label for="category">Category:</label>
		<select name="category" id="category">
			<option value="">All</option>
			<option value="laptop">Laptop</option>
			<option value="smartphone">Smartphone</option>
			<option value="tablet">Tablet</option>
			<option value="MicroController">MicroController</option>
		</select>
		<input type="submit" name="submit" value="Filter">
	</form>

	<?php
	
	$products = array(
		array("name"=>"Apple Macbook Pro", "price"=>1399.99, "type"=>"laptop"),
		array("name"=>"Dell XPS 13", "price"=>1099.99, "type"=>"laptop"),
		array("name"=>"Microsoft Surface Laptop 3", "price"=>999.99, "type"=>"laptop"),
		array("name"=>"Apple iPhone 12", "price"=>699.99, "type"=>"smartphone"),
		array("name"=>"Samsung Galaxy S21", "price"=>799.99, "type"=>"smartphone"),
		array("name"=>"Google Pixel 6", "price"=>899.99, "type"=>"smartphone"),
		array("name"=>"Apple iPad Air", "price"=>599.99, "type"=>"tablet"),
		array("name"=>"Samsung Galaxy Tab S7", "price"=>649.99, "type"=>"tablet"),
		array("name"=>"Microsoft Surface Pro 8", "price"=>899.99, "type"=>"tablet"),
		array("name"=>"Arduino UNO R3", "price"=>1899.99, "type"=>"MicroController"),
	);
	
	
	
	function add_to_cart($product_id) {
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

	
	
	if(isset($_GET['search'])) {
		$search_query = strtolower($_GET['search']);
		$products = array_filter($products, function($product) use ($search_query) {
			return strpos(strtolower($product['name']), $search_query) !== false;
		});
	}

	
	if(isset($_GET['category']) && !empty($_GET['category'])) {
		$category_query = strtolower($_GET['category']);
		$products = array_filter($products, function($product) use ($category_query) {
			return strtolower($product['type']) == $category_query;
		});
	}

	
	if(isset($_GET['sort'])) {
    $sort_query = $_GET['sort'];
    switch($sort_query) {
        case 'price_asc':
            usort($products, function($a, $b) {
                return $a['price'] - $b['price'];
            });
            break;
        case 'price_desc':
            usort($products, function($a, $b) {
                return $b['price'] - $a['price'];
            });
            break;
        case 'name_asc':
            usort($products, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            break;
        case 'type' :
            usort($products, function($a, $b) {
                return strcmp($a['type'], $b['type']);
            });
            break;
    }
}
if(isset($_POST['product_id'])) {
    add_to_cart($_POST['product_id']);
}
?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Type</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $index => $product) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['type']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="product_id" value="<?php echo $index; ?>">
                        <button type="submit">Add to cart</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php if (isset($_SESSION['cart'])) { ?>
    <h2>Cart Items</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $cart_item) {
				 ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['type']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<p>To complete your order, please select a payment method:</p>
	<ul>
		<li><a href="https://www.paypal.com">PayPal</a></li>
		<li><a href="https://www.stripe.com">Stripe</a></li>
		
	</ul>
	<p>After completing the payment, please select a delivery method:</p>
	<ul>
		<li><a href="https://www.fedex.com">FedEx</a></li>
		<li><a href="https://www.ups.com">UPS</a></li>
		
	</ul>
</body>
</html>