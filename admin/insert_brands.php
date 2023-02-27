<?php

include '../includes/connect.php';

if (isset($_POST['insert_brand'])) {
     $brand_title = $_POST['brand_title'];

    //check if data already exist
    $sql = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        echo "<script>alert('This brand is present in the database')</script>";
    }else{
         //insert into database
        $sql= "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $sql);
        echo "<script>alert('Brand has been inserted successfully')</script>";

     }
}

?>

<form action="" method="POST" class="mb-2">
    <div class="input-group w-99 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <button class="bg-info p-3 border-0 my-3" name="insert_brand"> Insert brands </button>
    </div>
</form>

