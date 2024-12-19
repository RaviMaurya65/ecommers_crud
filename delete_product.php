<?php
include('db.php');
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Get product details to delete the image
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    // Delete image from the uploads folder
    $image_path = "uploads/" . $product['image'];
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Delete product from database
    $sql = "DELETE FROM products WHERE id = $product_id";
    if ($conn->query($sql) === TRUE) {
        
        echo "<script>
            alert(' Product deleted successfully!');
            window.location.href = 'list_product.php'; // Redirect after the alert
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
