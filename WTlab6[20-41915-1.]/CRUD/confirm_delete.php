<?php

require_once('../model/productsModel.php');

$id = $_REQUEST['id'];
$product = getProductById($id);
?>

<html>

<head>
    <title>DELETE PRODUCT</title>
</head>

<body>

    <form method="post" action="../controller/updateProduct.php">
        <fieldset>
            <legend>DELETE PRODUCT</legend>
            <table>
                <tr>
                    <td>Name: <?= $product['product_name'] ?></td>
                </tr>
                <tr>
                    <td>Product Buying Price: <?= $product['product_buying_price'] ?></td>
                </tr>
                <tr>
                    <td>Product Selling Price: <?= $product['product_selling_price'] ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="display" id="display" <?php if ($product['displayable'] == "Yes") {
                                                                                echo "checked";
                                                                            } ?>>Displayable:
                    </td>

                </tr>
                <tr>
                    <td>
                        <a href="delete.php?id=<?php echo $product['id']; ?>"> DELETE</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>