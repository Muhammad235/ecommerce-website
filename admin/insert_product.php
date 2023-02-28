<?php

require "../includes/connect.php";


?>

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

    <title>Insert products</title>
</head>
<body class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Insert Product</h1>
            <!-- form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
                </div>
                 <!-- description -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product title</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" required>
                </div>
                 <!-- keywords -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product keywords</label>
                    <input type="text" name="product_title" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
                </div>

                <!-- select category -->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_categories" id="" class="form-select">
                   <option value="">Select a category</option>
                   <?php

                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_id = $row['category_id'];
                            $category_title = $row['category_title'];
                        
    
                            echo '<option value="">'.$category_title.'</option>';
                        }
                    }

                   ?>
                   </select>
                </div>


                 <!-- select brands -->
                 <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_brands" id="" class="form-select">
                   <option value="">Select a brand</option>
                   <?php

                        $sql = "SELECT * FROM brands";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $brand_id = $row['brand_id'];
                                $brand_title = $row['brand_title'];
                            

                                echo '<option value="">'.$brand_title.'</option>';
                            }
                        }

                  ?>
                   </select>
                </div>

                <!-- image 1 -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" required>
                </div>

                
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" required>
                </div>

                   <!-- image 3 -->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" required>
                </div>

                  <!-- price -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
                </div>

                  <!-- submit -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="Insert_product" value="Insert Products" class="btn btn-info mb-3 px-3">
                </div>


            </form>
        </div>
</body>
</html>