<?php

require_once('db.php');

function addProduct($product)
{
    $con = getConnection();
    $sql = "insert into products values('', '{$product['product_name']}', '{$product['product_buying_price']}', '{$product['product_selling_price']}', '{$product['displayable']}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getAllProducts()
{
    $con = getConnection();
    $sql = "select * from products where displayable='Yes'";
    $result = mysqli_query($con, $sql);
    return $result;
}

function getProductById($id)
{
    $con = getConnection();
    $sql = "select * from products where id={$id}";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function editProduct($product)
{
    $con = getConnection();
    $sql = "update products set product_name='{$product['product_name']}', product_buying_price='{$product['product_buying_price']}', product_selling_price='{$product['product_selling_price']}', displayable='{$product['displayable']}' where id={$product['id']}";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteProduct($id)
{
    $con = getConnection();
    $sql = "delete from products where id={$id}";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}