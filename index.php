<?php
include 'connection.php';

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Inventory</title>
</head>
<body>
    <h2>Product List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Barcode</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['barcode']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add New Product</h2>
    <form action="create.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br>
        <label>Barcode:</label><br>
        <input type="text" name="barcode" required><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>

<?php $conn->close(); ?>

