<?php
require 'dbconnect.php';
$pid = $_GET['pid'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $available = $_POST['available'];

    $stmt = mysqli_prepare($con, "UPDATE products SET Title=?, Author=?, Price=?, Available=? WHERE PID=?");
    mysqli_stmt_bind_param($stmt, "ssdss", $title, $author, $price, $available, $pid);
    mysqli_stmt_execute($stmt);
    header("Location: admin_dashboard.php");
    exit();
}

$result = mysqli_query($con, "SELECT * FROM products WHERE PID='$pid'");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
<h2>Edit Product: <?php echo $product['Title']; ?></h2>
<form method="POST">
    Title: <input type="text" name="title" value="<?php echo $product['Title']; ?>"><br><br>
    Author: <input type="text" name="author" value="<?php echo $product['Author']; ?>"><br><br>
    Price: <input type="text" name="price" value="<?php echo $product['Price']; ?>"><br><br>
    Available: <input type="number" name="available" value="<?php echo $product['Available']; ?>"><br><br>
    <input type="submit" value="Update Product">
</form>
</body>
</html>