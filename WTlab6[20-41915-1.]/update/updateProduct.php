<?php

require_once('../sql/productsModel.php');

$product_name = $_REQUEST['product_name'];
$product_buying_price = $_REQUEST['product_buying_price'];
$product_selling_price = $_REQUEST['product_selling_price'];
$id = $_REQUEST['id'];

if (isset($_POST['display'])) {
    $displayStatus = $_POST['display'];
} else {
    $displayStatus = "No";
}

$product = ['id' => $id, 'product_name' => $product_name, 'product_buying_price' => $product_buying_price, 'product_selling_price' => $product_selling_price, 'displayable' => $displayStatus];
$status = editProduct($product);

if ($status) {
    header('location: ../CRUD/productList.php');
} else {
    header('location: ../CRUD/edit.php?id={$id}');
}