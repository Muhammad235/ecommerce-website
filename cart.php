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
<style>
  .cart image{
    width: 80px;
    height: 80px;
    object-fit: contain;
  }
</style>
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
          <a class="nav-link" href="#">Contact</a>
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
        <table class="table table-bordered text-center">
          <thead>
            <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan="2">Operations</th>
            </tr>
          </thead>
          <form action="" method='POST'>
          <tbody>
            <!-- php code to display cart products -->
            <?php 

              // get a particular user ip address
              $ipAddress = getIpAddress();

              $total_price = 0;

              //select all the products_id of the user with the ip address gotten above from cart_details
              $sql = "SELECT * FROM cart_details WHERE ip_address  = '$ipAddress'";
              $result = mysqli_query($con, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];

                //using the product_id gotten above, select all product with the id 
                $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
                $product_result = mysqli_query($con, $sql);

                while ($row_cart_product = mysqli_fetch_array($product_result)) {

                  $product_price = $row_cart_product['product_price'];
                  $product_title = $row_cart_product['product_title'];
                  $product_image = $row_cart_product['product_image1'];

                  // get the price of the selected product from the products table
                  $cart_product_price = array($row_cart_product['product_price']);

                  $product_values = array_sum($cart_product_price);

                  $total_price += $product_values;

                  
                 ?>

                  <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src='admin/product_images/<?= $product_image?>' class='cart image' width='100'></td>
                    <td><input type='text' id='' class='form-input w-50' name='quantity'></td>
                    <?php

                       // get a particular user ip address
                        $ipAddress = getIpAddress();

                      if (isset($_POST['update_cart'])) {
                            $product_quantity = $_POST['quantity'];

                            $update_cart_quantity = "UPDATE cart_details set quantity=$product_quantity WHERE ip_address= '$ipAddress'";
                            $quantity_result = mysqli_query($con, $update_cart_quantity);

                            $total_price = $total_price * $product_quantity;

                      }



                    ?>
                    <td><?= $product_price?> </td>
                    <td><input type='checkbox'></td>
                    <td>
                    <button class='bg-info p-3 py-2 border-0 text-light' name='update_cart'>Update</button>
                    <button class='bg-info p-3 py-2 border-0 text-light'>Remove</button>
                    </td>
                  </tr>
             
      <!-- end while loop -->
     <?php }}  ?>
          
          </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
          <h4 class="px-3">Subtotal: <strong class="text-info"><?=$total_price ?>/-</strong> </h4>
          <a href="index.php"><button class="bg-info border-0 px-3 py-2 mx-3">Continue Shopping</button></a>
          <a href="#"><button class="bg-secondary p-3 py-2 border-0 text-light"> Checkout</button></a>
        </div>
    </div>
</div>
</form>




<!-- include footer -->
<?php include 'includes/footer.php'; ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

