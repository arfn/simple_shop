<?php
    error_reporting(-1);
    include(MODEL_PATH . 'model.php');
    $model = new Model();

    $target_dir = "/home/arfn/phpshit/shop/uploads/";
    $new_name = "";
    $uploaded = FALSE;

    //Image upload
    if(isset($_FILES['product_image']))
    {
      $errors= array();
      $image_name = $_FILES['product_image']['name'];
      $file_size = $_FILES['product_image']['size'];
      $file_tmp = $_FILES['product_image']['tmp_name'];
      $file_type = $_FILES['product_image']['type'];
      $file_ext = strtolower(end(explode(".", $_FILES['product_image']['name'])));
      $new_name = microtime(true) . "." . $file_ext;
      $whitelist = array('jpeg', 'jpg', 'png');

      if(in_array($file_ext, $whitelist) === FALSE)
      {
        $errors[]="Only image files.";
      }

      if($file_size > 2097152)
      {
        $errors[] = "Files too large, max 2 mb";
      }

      if(empty($errors)==TRUE)
      {
        move_uploaded_file($file_tmp, $target_dir . $new_name);
        echo "Successfuly upload image";
        $uploaded = TRUE;
        header("Location: ".$_SERVER['SERVER_NAME']."shop");
      }
      else{
        echo "Upload failed";
      }
    }

    //If uploaded, then insert data

    //filter the textboxes
    $args = array(
      'product_name'=>FILTER_SANITIZE_SPECIAL_CHARS,
      'product_desc'=>FILTER_SANITIZE_SPECIAL_CHARS,
      'product_price'=>FILTER_VALIDATE_INT,
      'product_quantity'=>FILTER_VALIDATE_INT,
      'product_category'=>FILTER_SANITIZE_SPECIAL_CHARS
    );

    $input = filter_input_array(INPUT_POST, $args);

    //push image path to $input array

    $input['product_image'] =$new_name;

    //INSERT QUERY
    if($uploaded == TRUE){
        $model->insert_product($input);

      }
      else {
        echo "Image must be uploaded first";
      }
 ?>
