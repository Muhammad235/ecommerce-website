<?php

//including connect file
require "includes/connect.php";


//getting products

function getProducts(){
      global $con;

    //fetcging products
    
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            if (!isset($_GET['search_product'])) {
              
          
            $sql = "SELECT * FROM products ORDER  BY RAND() LIMIT 0,2";
            $result = mysqli_query($con, $sql);
            
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
            
            }
            
            //   <!-- products row ends -->
        }
    
    
    }
  }

}




//getting products

function getAllProducts(){
  global $con;

//fetcging products

//condition to check isset or not
if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      if (!isset($_GET['search_product'])) {
        
        $sql = "SELECT * FROM products ORDER BY RAND()";
        $result = mysqli_query($con, $sql);
        
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
        
        }
        
        //   <!-- products row ends -->
      }
   }

}

}



//getting unique categories

function get_unique_categories(){
    global $con;

    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
    
            $sql = "SELECT * FROM products WHERE category_id = $category_id ORDER  BY RAND()";
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



//getting unique brands

function get_unique_brands(){
    global $con;

    //condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
    
            $sql = "SELECT * FROM products WHERE brand_id = $brand_id ORDER  BY RAND()";
            $result = mysqli_query($con, $sql);

            $num_of_rows = mysqli_num_rows($result);

            if ($num_of_rows == 0) {
                echo "<h2 class='text-center text-danger'>This brand is not available now</h2>";
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



//getting brands 

function getBrands(){
    global $con;
    $sql = "SELECT * FROM brands";

    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $brand_title = $row['brand_title'];
        $brand_id = $row['brand_id'];

        echo "
        <li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>
        ";
      }
    
    }
}


function getCategories(){
    global $con;
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $category_title = $row['category_title'];
        $category_id = $row['category_id'];

        echo "
        <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>
        ";
      }

    }else {
      die(mysqli_query_error());
    }
}

//get search result


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