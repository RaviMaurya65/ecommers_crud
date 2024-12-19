
<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $product_name = $_POST['product_name'];
    $mrp = $_POST['mrp'];
    $sales_price = $_POST['sales_price'];
    $mfd_date = $_POST['mfd_date'];
    $expiry_date = $_POST['expiry_date'];

    // File upload handling
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert product data into database
    $sql = "INSERT INTO products (category, subcategory, product_name, mrp, sales_price, image, mfd_date, expiry_date)
            VALUES ('$category', '$subcategory', '$product_name', '$mrp', '$sales_price', '$image_name', '$mfd_date', '$expiry_date')";
    
    if ($conn->query($sql) === TRUE) {
       
        echo "<script>
                alert('Product added successfully');
               </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 card p-5">
    <form method="POST" action="add_product.php" enctype="multipart/form-data">
        <center><h1>Product Add</h1></center>
        <div class="row mb-3 ">
            <div class="col-md-4">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="subcategory" class="form-label">Subcategory</label>
                <select name="subcategory" class="form-select" required>
                    <option value="">Select Subcategory</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Laptop">Laptop</option>
                </select>
            </div>
        
            <div class="col-md-4">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="col-md-4">
                <label for="mrp" class="form-label">MRP</label>
                <input type="text" name="mrp" class="form-control" placeholder="MRP" required>
            </div>
       
            <div class="col-md-4">
                <label for="sales_price" class="form-label">Sales Price</label>
                <input type="text" name="sales_price" class="form-control" placeholder="Sales Price" required>
            </div>
            <div class="col-md-4">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
        
            <div class="col-md-4">
                <label for="mfd_date" class="form-label">Manufacturing Date</label>
                <input type="date" name="mfd_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" name="expiry_date" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="list_product.php"><button type="button" class="btn btn-success">All Product</button></a>
    </form>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
