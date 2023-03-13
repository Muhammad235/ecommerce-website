<?php

include '../includes/connect.php';


if (isset($_GET['edit_products'])) {

    $edit_product_id = $_GET['product_id'];


    $get_product = "SELECT * FROM products  WHERE product_id = '$edit_product_id'";
    $result = mysqli_query($con, $get_product);

    $row = mysqli_fetch_assoc($result);

        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];    
        $product_status = $row['status']; 

        $get_category = "SELECT * FROM categories WHERE category_id = '$category_id'";
        $result_category = mysqli_query($con, $get_category);

        $row = mysqli_fetch_assoc($result_category);
        $category_title = $row['category_title'];

        $get_brand = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
        $result_brand = mysqli_query($con, $get_brand);

        $row = mysqli_fetch_assoc($result_brand);
        $brand_title = $row['brand_title'];


}

?>


<div class="container mt-5">
    <h1 class="text-center">Edit products</h1>
     <form action="" method='POST' enctype='multipart/form-data'>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="product_title">Product Title</label>
            <input type="text" id='product_title' name='product_title' class='form-control' value='<?=$product_title?>' value='<?=$product_title?>' required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="product_description">Product Description</label>
            <input type="text" id='product_description' name='description' class='form-control' value='<?=$product_description?>' required>
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords"  value='<?=$product_keywords?>' required>
        
        </div>  
                <!-- select category -->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_category" id="" class="form-select">
                   <option value="<?=$category_id ?>'>"><?= $category_title ?></option>
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
                   <option value="<?= $brand_id ?>"><?= $brand_title?></option>
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
                        <img src="product_images/<?= $product_image1 ?>" alt="" width='100'>
                    </div>
                </div>

                
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <div class="d-flex">
                      <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto"  required>
                      <img src="product_images/<?= $product_image2 ?>" alt="" width='100'>
                    </div>
                </div>

                   <!-- image 3 -->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <div class="d-flex">
                        <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required>
                        <img src="product_images/<?= $product_image3 ?>" alt="" width='100'>
                    </div>
                </div>

                  <!-- price -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price"  value='<?=$product_price?>' required>
                </div>

                  <!-- submit -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="update_product" value="Insert Products" class="btn btn-info mb-3 px-3">
                </div>
     </form>
</div>

<!-- updating products -->
<?php 

if(isset($_POST['update_product'])){


    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing tmp name
    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_image3 = $_FILES['product_image3']['tmp_name'];
    
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '' or  $product_image1 == '' or $product_image2 == '' or $product_image3 == '') 
    {
        echo "<script>alert('Input fields can not be empty')</script>";
        exit();
    }else {
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");

        $sql = "UPDATE products SET product_title = '$product_title', product_description = '$product_description', 
        product_keywords = '$product_keywords', category_id = '$product_category', brand_id = '$product_brands', product_image1 = '$product_image1', product_image2 = '$product_image2', product_image3 = '$product_image3', product_price = '$product_price', date=NOW() WHERE product_id = $edit_product_id";

        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('successfully inserted products')</script>";    
            echo "<script>window.open('./index.php?view_products')</script>";    
        }
    }

}

?>

