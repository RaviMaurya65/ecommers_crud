<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Buttons Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Product</h2>
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <a href="add_product.php"><button class="btn btn-primary btn-block">Add Product</button></a>
        </div>
        <div class="col-md-3 mb-3">
           <a href="list_product.php"><button class="btn btn-success btn-block">List Product</button></a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="view_cart.php"><button class="btn btn-danger btn-block">View cart</button></a>
        </div>
       
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
