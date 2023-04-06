<?php


require_once('../sql/productsModel.php');

if (deleteProduct($_GET['id'])) {
    header('location: productList.php');
}
