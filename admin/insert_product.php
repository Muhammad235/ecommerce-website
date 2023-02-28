<?php

require "../includes/connect.php";

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';


    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing tmp name
    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_image3 = $_FILES['product_image3']['tmp_name'];

    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == ''or  $product_image1 == '' or $product_image2 == '' or $product_image3 == '') 
    {
        echo "<script>alert('Input fields can not be empty')</script>";
        exit();
    }else {
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");

        $sql = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result = mysqli_query($con, $sql);
        if ($result) {
             echo "<script>alert('successfully inserted products')</script>";    
        }
    }


    
  
}


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
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title"  required>
                </div>
                 <!-- description -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product title</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter description"  required>
                </div>
                 <!-- keywords -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords"  required>
                </div>

                <!-- select category -->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_category" id="" class="form-select">
                   <option value="">Select a category</option>
                   <?php

                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_id = $row['category_id'];
                            $category_title = $row['category_title'];
                        
    
                            echo "<option value='$category_id'>".$category_title."</option>";
                            
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
                            

                            echo "<option value='$brand_id'>".$brand_title."</option>";
                                
                            }
                        }

                  ?>
                   </select>
                </div>

                <!-- image 1 -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control"  required>
                </div>

                
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control"  required>
                </div>

                   <!-- image 3 -->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control"  required>
                </div>

                  <!-- price -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price"  required>
                </div>

                  <!-- submit -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" value="Insert Products" class="btn btn-info mb-3 px-3">
                </div>


            </form>
        </div>
</body>
</html>