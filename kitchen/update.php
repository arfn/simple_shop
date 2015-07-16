<!--TODO user validation-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Redirect</title>
    <link rel="stylesheet" href="../src/stylesheet/redirect.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php
        error_reporting(-1);
        include '../config/database.php';
        include '../config/model.php';
        $model = new Model();

        $args = array(
        'product_id'=>FILTER_VALIDATE_INT,
          'product_name'=>FILTER_SANITIZE_SPECIAL_CHARS,
          'product_desc'=>FILTER_SANITIZE_SPECIAL_CHARS,
          'product_price'=>FILTER_VALIDATE_INT,
          'product_quantity'=>FILTER_VALIDATE_INT,
          'product_category'=>FILTER_SANITIZE_SPECIAL_CHARS
        );

        $input = filter_input_array(INPUT_POST, $args);

        //UPDATE QUERY
        if(isset($_POST['product_update_submit'])){
            if($model->update_product($input))
            {
              header("refresh:3;url=../index.php");
            }
            else {
              header("Location: product_edit.php?product_id=$input[product_id]");
            }
        }
    ?>
  </body>
</html>
