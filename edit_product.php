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
    <title>Update Product</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 card p-4">
        <h2>Update Product</h2>
        <form method="POST" action="update_product.php?id=<?= $product_id ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="<?= $product['product_name'] ?>"
                        required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="mrp" class="form-label">MRP</label>
                    <input type="text" class="form-control" name="mrp" value="<?= $product['mrp'] ?>" required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="sales_price" class="form-label">Sales Price</label>
                    <input type="text" class="form-control" name="sales_price" value="<?= $product['sales_price'] ?>"
                        required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="mfd_date" class="form-label">Manufacturing Date</label>
                    <input type="date" class="form-control" name="mfd_date" value="<?= $product['mfd_date'] ?>"
                        required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" name="expiry_date" value="<?= $product['expiry_date'] ?>"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>


<?php
    $conn->close();
}
?>