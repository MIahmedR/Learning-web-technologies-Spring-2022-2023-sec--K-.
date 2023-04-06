<?php
require_once('../sql/productsModel.php');
if (isset($_POST['submit'])) {
	if (isset($_POST['display'])) {
		$product_name = $_POST['product_name'];
		$product_buying_price = $_POST['product_buying_price'];
		$product_selling_price = $_POST['product_selling_price'];
		$displayStatus = $_POST['display'];

		if ($product_name != "") {
			if ($product_buying_price != "") {
				if ($product_selling_price != "") {

					$product = ['product_name' => $product_name, 'product_buying_price' => $product_buying_price, 'product_selling_price' => $product_selling_price, 'displayable' => $displayStatus];
					$status = addProduct($product);
					if ($status) {
						header('location: ../views/productList.php');
					}
				} else {
					echo "Invalid product selling price";
				}
			} else {
				echo "Product buying price is invalid";
			}
		} else {
			echo "Invalid product name";
		}
	} else {
		$product_name = $_POST['product_name'];
		$product_buying_price = $_POST['product_buying_price'];
		$product_selling_price = $_POST['product_selling_price'];
		$displayStatus = 'No';

		if ($product_name != "") {
			if ($product_buying_price != "") {
				if ($product_selling_price != "") {

					$product = ['product_name' => $product_name, 'product_buying_price' => $product_buying_price, 'product_selling_price' => $product_selling_price, 'displayable' => $displayStatus];
					$status = addProduct($product);
					if ($status) {
						header('location: ../views/productList.php');
					}
				} else {
					echo "Invalid product selling price";
				}
			} else {
				echo "Product buying price is invalid";
			}
		} else {
			echo "Invalid product name";
		}
	}
}
?>

<html>

<head>
	<title>Create New Product Page</title>
</head>

<body>
	<!-- <center>
		<a href="home.php">Back </a> |
		<a href="../controller/logout.php">logout </a>
	</center> -->

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Add Product</legend>
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="product_name" value=""></td>
				</tr>
				<tr>
					<td>Buying Price:</td>
					<td><input type="text" name="product_buying_price" value=""></td>
				</tr>
				<tr>
					<td>Selling Price:</td>
					<td><input type="text" name="product_selling_price" value=""></td>
				</tr>
				<tr>
					<td>

						<input type="checkbox" name="display" id="display" value="Yes">Display

					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>

</html>