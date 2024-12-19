<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['add_to_cart'];

    // Add product to session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    array_push($_SESSION['cart'], $product_id);

    //echo "Product added to cart. <a href='view_cart.php'>View Cart</a>";
    echo "<script>
            alert(' Product added to cart!');
            window.location.href = 'view_cart.php'; // Redirect after the alert
        </script>";
}
?>
