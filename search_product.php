<?php


//search product

function search_product(){
    global $con;

    if(isset($_GET['search_product'])) {

        $keyword = $_GET['search_data'];
      
        
            $sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%' ";
            $result = mysqli_query($con, $sql);

            $num_of_rows = mysqli_num_rows($result);

            if ($num_of_rows == 0) {
                echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_keywords = $row['product_keywords'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
            
              echo "
            
                <div class='col-md-4 mb-2'>
                  <div class='card'>
                  <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description.</p>
                    <a href='#' class='btn btn-primary'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
                </div> 
                     
              ";
            
            //   <!-- products row ends -->
            }

    }

}








?>