<?php
include '../config/config.php';
//TODO user validation
if(isset($_GET['product_id']))
{
?>

<?php 

include(HEADER);
error_reporting(-1);
include(MODEL_PATH . 'model.php');
$model = new Model();
$row = $model->show(htmlspecialchars($_GET['product_id']));
?>

<div class="content">
  <h2>Edit Product</h2>
  <form class="product_form" action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">

    <label for="product_name">Product Name</label>
    <input type="text" name="product_name" value=<?php echo $row['product_name']?>> <br>

    <label for="product_desc">Product Description</label><br>
    <textarea name="product_desc" rows="8" cols="40"><?php echo $row['product_desc']?></textarea><br>

    <label for="product_price">Price</label>
    <input type="text" name="product_price" value=<?php echo $row['product_price']?>><br>


    <!--TODO add multiple image-->
    <img class="product_view_image" src="<?php echo "../uploads/".$row['product_image']?>"/>
    <label for="product_image">Upload product</label>
    <input type="file" name="product_image" value="upload"> <br>

    <label for="product_quantity">Quantity</label>
    <input type="text" name="product_quantity" value="<?php echo $row['product_quantity']?>"><br>

    <label for="product_category">Category</label>
    <input type="text" name="product_category" value="<?php echo $row['product_category']?>"><br>

    <input type="submit" name="product_update_submit" value="Update">
  </form>
</div>
<?php include(FOOTER);?>
<?php }
  else {
    header('HTTP/1.0 401 Unauthorized');
    echo "<h1>401 Unauthorized</h1>";
    }
?>
