<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <title>Admin dashoard</title>
</head>
<style>
    .admin_image{
    width: 100px;
    object-fit: fit;
    }

</style>
<body>
     <!-- navbar -->
     <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
         <div class="container-fluid">
          <img src="" alt="">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                </li>
            </ul>
          </nav>
    </div>
    </nav>

    
        <div class="bg-light">
                <h3 class="text-center">Manage Details</h3>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="px-5">
                        <a href=""><img src="Green suits 1.png" alt="" class="admin_image"></a>
                        <p class="text-light text-center">Admin name</p>
                    </div>
                    <div class="button text-center">
                        <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-2">Insert Products</a></button>
                        <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-2">View Products</a></button>
                        <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-2">Insert Categories</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">View Categories</a></button>
                        <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1 p-2">Insert Brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">view Brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">All orders</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">All payments</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">List users</a></button>
                        <button><a href="" class="nav-link text-light bg-info my-1 p-2">Logout</a></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- action type display -->

        <div class="container my-5">
            <?php 
              if (isset($_GET['insert_category'])) {
                include 'insert_categories.php';
              }elseif(isset($_GET['insert_brands'])) {
                include 'insert_brands.php';
              }elseif(isset($_GET['view_products'])) {
                include 'view_products.php';
              }
            
            ?>
        </div>







        
<!-- include footer -->
<?php include_once '../includes/footer.php'; ?>

    
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>