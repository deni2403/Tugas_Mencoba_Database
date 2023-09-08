<?php

include_once("connection.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $query = mysqli_query(
            $mysqli,
            "UPDATE products SET name='$name', price='$price', quantity='$quantity' WHERE id='$id' "
        );

        header('Location: index.php');
    }

    $query = mysqli_query($mysqli, "SELECT * FROM products WHERE id='$id'");

    if ($product_data = mysqli_fetch_array($query)) {
        $name = $product_data['name'];
        $price = $product_data['price'];
        $quantity = $product_data['quantity'];
    } else {
        echo "Produk dengan ID tersebut tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan dalam URL.";
}

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
        <button class="back-button"><a href="index.php">Back</a></button>

        <form action="edit.php?id=<?= $id ?>" method="POST" name="editUser">
            <label for="name">Nama Product</label>
            <br>
            <input type="text" name="name" id="name" value="<?= $name ?>">
            <br>
            <label for="price">Harga</label>
            <br>
            <input type="text" name="price" id="price" value="<?= $price ?>">
            <br>
            <label for="quantity">Jumlah</label>
            <br>
            <input type="text" name="quantity" id="quantity" value="<?= $quantity ?>">
            <br>
            <Button type="submit" name="update" value="Update" class="submit-button">Update</Button>
        </form>
    </div>
</body>

</html>