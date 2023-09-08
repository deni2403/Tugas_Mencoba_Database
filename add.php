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

        <form action="add.php" method="POST" name="addProduct">
            <label for="name">Nama Product</label>
            <br>
            <input type="text" name="name" id="name">
            <br>
            <label for="price">Harga</label>
            <br>
            <input type="text" name="price" id="price">
            <br>
            <label for="quantity">Jumlah</label>
            <br>
            <input type="text" name="quantity" id="quantity">
            <br>
            <Button type="submit" name="Submit" value="add" class="submit-button">Submit</Button>
        </form>

        <?php
        if (isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            include_once("connection.php");

            $result = mysqli_query($mysqli, "INSERT INTO products (name,price,quantity) VALUES ('$name', '$price', '$quantity')");

            echo "Succesfully add product. <a class='info' href='index.php'>See Product</a>";
        }
        ?>
    </div>
</body>

</html>