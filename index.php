<?php include 'templates/header.php';
      error_reporting(-1);
 ?>
<?php include 'config/database.php';?>
<?php include 'config/model.php';
	$model = new Model();
	$product_array = $model->show_all();

?>


<div class="content">
  <h2>Special Product</h2>
  <ul>
<?php foreach($product_array as $product){
   echo  "<li class=\"product_item\">";
				echo "<h3 class='product_name'>" . $product['product_name'] . "</h3>";
	 			echo "<a href=products.php?product_id=" . $product['product_id'] . "><img src='uploads/" . $product['product_image'] . "'/></a>";
				echo "<div class='price'>Price : <b>$" . $product['product_price'] . '</b></div>';
   echo "</li>";
}
?>
  </ul>
</div>

<?php include 'templates/footer.php'?>
