<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    include('db.php');

    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 card p-3 " style="width:400px;">
    <?php
        // Display product details
        echo "<p class='display-4' style='font-size: 20px;'>" . $product['product_name'] . "</p>";
        echo "<img style='width: 200px;'src='uploads/" . $product['image'] . "' alt='" . $product['product_name'] . "' class='img-fluid mb-3'>";
        echo "<p><strong>Category:</strong> " . $product['category'] . "</p>";
        echo "<p><strong>Subcategory:</strong> " . $product['subcategory'] . "</p>";
        echo "<p><strong>MRP:</strong> ₹" . $product['mrp'] . "</p>";
        echo "<p><strong>Sales Price:</strong> ₹" . $product['sales_price'] . "</p>";
        echo "<p><strong>MFD Date:</strong> " . date('d M Y', strtotime($product['mfd_date'])) . "</p>";
        echo "<p><strong>Expiry Date:</strong> " . date('d M Y', strtotime($product['expiry_date'])) . "</p>";

        // Add to cart button
        echo "<form method='POST' action='add_to_cart.php'>
                <button type='submit' name='add_to_cart' value='" . $product['id'] . "' class='btn btn-primary btn-lg'>Add to Cart</button>
              </form>";
}
        // Close connection
        $conn->close();
    ?>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>


