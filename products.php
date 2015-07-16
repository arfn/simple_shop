<?php include 'templates/header.php';
      error_reporting(-1);
 ?>
<?php include 'config/database.php';?>
<?php include 'config/model.php';
	$model = new Model();
	$product_array = $model->show_all();
?>


<?php
  if(isset($_GET['product_id']))
  {
    //TODO sanitize this $_GET
    $product_id = htmlspecialchars($_GET['product_id']);
    $row = $model->show($product_id);

    if(!empty($row))
    {
?>

  <div class="content">
    <h3><?= $row['product_name']?></h3>
    <div class="product_view_image_parent">
    <img class="product_view_image" src=uploads/<?php echo $row['product_image']?>>
  </div>
  </div>

  <div class="side_content">
    <?php if(isset($_SESSION['username']) && $_SESSION['username'] == 'arfn'){ ?>
      <a href="kitchen/product_edit.php?product_id=<?= $product_id ?>">Change</a>
    <?php } ?>
    <h5 class="price">$ <?= $row['product_price']?></h5>
    <span class="product_stok">Stok : <?php echo $row['product_quantity']?></span>
    <div class="add_to_cart_button">
      Add to Cart
    </div>
  </div>

  <div class="description">
    <h4>Description</h4>
    <p>
      <?= $row['product_desc'] ?>
    </p>
  </div>

<?php
    }
  }
?>


<?php include 'templates/footer.php'?>
