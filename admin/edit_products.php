<?php

include '../includes/connect.php';


if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $get_product = "SELECT * FROM products  WHERE product_id = '$product_id'";
    $result = mysqli_query($con, $get_product);


    while ($row = mysqli_fetch_assoc($result)) {

        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];    
        $product_status = $row['status']; 
     }


}
  echo $product_id ;
  echo $product_title ;

?>


<div class="container mt-5">
    <h1 class="text-center">Edit products</h1>
     <form action="" method='POST' enctype='multipart/form-data'>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="product_title">Product Title</label>
            <input type="text" id='product_title' name='product_title' class='form-control' value='<?=$product_title?>' required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="product_description">Product Description</label>
            <input type="text" id='product_description' name='product_description' class='form-control' required>
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
                    <div class="d-flex">
                        <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto"  required>
                        <img src="product_images/image 1.png" alt="" width='100'>
                    </div>
                </div>

                
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <div class="d-flex">
                      <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto"  required>
                      <img src="product_images/image 1.png" alt="" width='100'>
                    </div>
                </div>

                   <!-- image 3 -->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <div class="d-flex">
                        <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto"  required>
                        <img src="product_images/image 1.png" alt="" width='100'>
                    </div>
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