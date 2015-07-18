<?php 
include '../config/config.php';
include(HEADER);
?>

<div class="content">
  <h2>Upload a new product</h2>
  <form class="product_form" action="upload.php" method="post" enctype="multipart/form-data">
    <label for="product_name">Product Name</label>
    <input type="text" name="product_name"> <br>

    <label for="product_desc">Product Description</label><br>
    <textarea name="product_desc" rows="8" cols="40"></textarea><br>

    <label for="product_price">Price</label>
    <input type="text" name="product_price" ><br>

    <label for="product_image">Upload product</label>
    <input type="file" name="product_image" value="upload"> <br>

    <label for="product_quantity">Quantity</label>
    <input type="text" name="product_quantity"><br>

    <label for="product_category">Category</label>
    <input type="text" name="product_category"><br>

    <input type="submit" name="product_submit" value="Upload a product!">
  </form>
</div>

<?php include '../templates/footer.php'; ?>
