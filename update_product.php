<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    include('db.php');
    

    $product_name = $_POST['product_name'];
    $mrp = $_POST['mrp'];
    $sales_price = $_POST['sales_price'];
    $mfd_date = $_POST['mfd_date'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "UPDATE products SET product_name='$product_name', mrp='$mrp', sales_price='$sales_price', mfd_date='$mfd_date', expiry_date='$expiry_date' WHERE id=$product_id";

    if ($_FILES['image']['name'] != '') {
        $target_dir = "uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Update image path
        $sql = "UPDATE products SET product_name='$product_name', mrp='$mrp', sales_price='$sales_price', image='$image_name', mfd_date='$mfd_date', expiry_date='$expiry_date' WHERE id=$product_id";
    }

    if ($conn->query($sql) === TRUE) {
        //echo "Product updated successfully.";
        echo "<script>
            alert(' Product updated successfully!');
            window.location.href = 'list_product.php'; // Redirect after the alert
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
