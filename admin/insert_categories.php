<?php

include '../includes/connect.php';

if (isset($_POST['insert_cat'])) {
     $category_title = $_POST['cat_title'];

     if (!empty($category_title)) {

        //check if data already exist
        $sql = "SELECT * FROM categories WHERE category_title = '$category_title'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            echo "<script>alert('This category is present in the database')</script>";
        }else{
            //insert into database
            $sql= "INSERT INTO categories (category_title) VALUES ('$category_title')";
            $result = mysqli_query($con, $sql);
            echo "<script>alert('Category has been inserted successfully')</script>";
        }

     }else{
        echo "<script>alert('Input fields can not be empty')</script>";

     }

    
}

?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-99 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <button class="bg-info p-3 border-0 my-3" name="insert_cat" value=""> Insert Categories </button>
    </div>
</form>

