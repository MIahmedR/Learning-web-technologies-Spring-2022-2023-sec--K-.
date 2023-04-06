<?php

require_once('../sql/productsModel.php');
$result = getAllProducts();
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product List</title>
</head>

<body>

    <table border="1" align="center">
        <tr>
            <th>NAME</th>
            <th>PROFIT</th>
            <th>&nbsp;</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
            <tr>

                <td><?= $data['product_name'] ?></td>
                <td><?= ((int)$data['product_selling_price'] - (int)$data['product_buying_price']); ?></td>

                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>"> EDIT </a> |
                    <a href="confirm_delete.php?id=<?php echo $data['id']; ?>"> DELETE</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>