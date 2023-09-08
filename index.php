<?php

include_once("connection.php");

$result = mysqli_query($mysqli, 'SELECT * FROM products');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tugas Mencoba Database</title>
</head>

<body>
    <div class="app-container">
        <button class="add-button"><a href="add.php">Tambah Product</a></button>

        <table>
            <tr>
                <th>Nama Product</th>
                <th>Harga Product</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($product_data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?= $product_data['name'] ?>
                    </td>
                    <td>
                        <?= $product_data['price'] ?>
                    </td>
                    <td>
                        <?= $product_data['quantity'] ?>
                    </td>
                    <td>
                        <button class="edit-button"><a href="edit.php?id=<?= $product_data['id']; ?>">Edit</a></button>
                        <button class="delete-button"><a href="delete.php?id=<?= $product_data['id']; ?>">Delete</a></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>