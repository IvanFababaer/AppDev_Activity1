<?php
include 'connection.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity', barcode='$barcode' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: index.php");
}

// Fetch product data
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form action="update.php?id=<?php echo $product['id']; ?>" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        <label>Description:</label><br>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br>
        <label>Barcode:</label><br>
        <input type="text" name="barcode" value="<?php echo $product['barcode']; ?>" required><br><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
