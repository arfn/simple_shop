<?php include 'src/header.php';
      error_reporting(-1);
 ?>
<?php include 'config/database.php';?>
<?php include 'config/model.php';?>

<div class="wrapper">
  <?php
  $con = new Database();
  $model = new Model();
  var_dump($model->show_all());
  ?>
</div>

<?php include 'src/footer.php'?>
