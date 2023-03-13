<?php

include '../includes/connect.php';

?>

    
<h3 class='text-center text-success'>All Products</h3>

<table class='table table-border mt-5'>
    <thead class='bg-info'>
        <tr  class='text-center'>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total sold </th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php

        $get_product = 'SELECT * FROM products';
        $result = mysqli_query($con, $get_product);

        $number = 0; 

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
            
            

        ?>

        <tr class='text-center'>
            <td><?= $number++ ?></td>
            <td><?= $product_title ?></td>
            <td> <img src="product_images/<?= $product_image1 ?>" alt="" class='product_img' width='80'></td>
            <td><?= $product_price ?></td>
            <td>0</td>
            <td><?= $product_status ?></td>
            <td><a href='index.php?edit_products&product_id=<?=$product_id?>&brand_id=<?= $brand_id ?>' class='text-light'><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_product=<?=$product_id?>" class='text-light'><i class="fa-solid fa-trash"></i></a></td>
        </tr>

        <?php } ?>
    </tbody>
</table>

