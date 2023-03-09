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
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a> 
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
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>                   
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
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
              </div>
              </div> 
                   
            ";
          
          //   <!-- products row ends -->
          }

  }

}



//view more details

function view_details(){
  global $con;

  if (isset($_GET['product_id'])) {

      //condition to check isset or not
     if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
           if (!isset($_GET['search_product'])) {

          $product_id = $_GET['product_id'];
          
      
           $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
           $result = mysqli_query($con, $sql);
        
          while ($row = mysqli_fetch_assoc($result)) {
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
        
              echo "
            
                  <div class='col-md-4'>
                  <div class='card'>
                      <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                         <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description.</p>
                          <p class='card-text'>Price: $product_price/-</p>
                    <a href='?product_id=$product_id&add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                          
                      </div>
                  </div>
              </div>
              <div class='col-md-8'>
              <div class='row'>
                  <div class='md-12'>
                      <h4 class='text-center text-info mb-5'>Related products</h4>
                  </div>

                    <div class='col-md-6'>
                    <img src='admin/product_images/$product_image2' class='card-img-top' alt='...'>
                    </div>
                    <div class='col-md-6'>
                    <img src='admin/product_images/$product_image3' class='card-img-top' alt='...'>
                    </div>
              </div>
              
          </div>
                    
              ";
            
           } // while statement ends
     
           } // search product if statement ends 

    
        }  // brand if statement ends
  
      } // category if statement ends

  } // product_id if sattement ends

} // function ends



// get user ip address


function getIpAddress()
{
    $ipAddress = '';
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        // to get shared ISP IP address
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check for IPs passing through proxy servers
        // check if multiple IP addresses are set and take the first one
        $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipAddressList as $ip) {
            if (! empty($ip)) {
                // if you prefer, you can check for valid IP address here
                $ipAddress = $ip;
                break;
            }
        }
    } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } else if (! empty($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddress;
}



//cart function

function cart(){
  if (isset($_GET['add_to_cart'])) {
     global $con;
      $ipAddress = getIpAddress();

      $get_product_id = $_GET['add_to_cart'];

      $sql = "SELECT * FROM cart_details WHERE ip_address  = '$ipAddress' AND product_id = $get_product_id";
      $result = mysqli_query($con, $sql);

      $num_of_rows = mysqli_num_rows($result);

      if ($num_of_rows > 0) {
          echo "<script> alert('This item is already present in to cart')</script>";
      }else {
        
        $sql = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($get_product_id,'$ipAddress',0)";
        $result = mysqli_query($con, $sql);

        echo "<script> alert('product added to cart successfully')</script>";
    
      }
  }
}


//function to get cart item numbers 


function count_cart_items(){
  if (isset($_GET['add_to_cart'])) {
     global $con;
      $ipAddress = getIpAddress();


      $sql = "SELECT * FROM cart_details WHERE ip_address = '$ipAddress'";
      $result = mysqli_query($con, $sql);

      $count_cart_item = mysqli_num_rows($result);

  }else {
      global $con;
      $ipAddress = getIpAddress();

      $sql = "SELECT * FROM cart_details WHERE ip_address  = '$ipAddress'";
      $result = mysqli_query($con, $sql);

      $count_cart_item = mysqli_num_rows($result);
    }

  // global $con;
  // $ipAddress = getIpAddress();

  // $sql = "SELECT * FROM cart_details WHERE ip_address  = '$ipAddress'";
  // $result = mysqli_query($con, $sql);

  // $count_cart_item = mysqli_num_rows($result);

    echo $count_cart_item;
}


//total cart price 

function total_cart_price(){

  global $con;
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

     while ($row_product_price = mysqli_fetch_array($product_result)) {
 
      // get the price of the selected product from the products table
      $cart_product_price = array($row_product_price['product_price']);

      $product_values = array_sum($cart_product_price);

      $total_price += $product_values;

     }

  }
  

  echo $total_price;
}


?>