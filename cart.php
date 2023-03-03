<?php

require 'includes/connect.php';

require 'function/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <img src="" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contct</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i> <sup><?php count_cart_items(); ?></sup> </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php cart(); ?>

<!-- second nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
  </ul>
</nav>


<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>


<div class="container">
    <div class="row">
        <table class="table table-boarderd text-center">
          <thead>
            <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Shirt</td>
              <td><img src="" alt=""></td>
              <td><input type="text" name="" id=""></td>
              <td>9000</td>
              <td><input type="checkbox"></td>
              <td>
              <p>Update</p>
              <p>Remove</p>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
</div>





<!-- include footer -->
<?php include 'includes/footer.php'; ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

