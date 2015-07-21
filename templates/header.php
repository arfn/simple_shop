<?php 
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME']?>/shop/src/stylesheet/stylesheet.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="src/js/jquery.js"></script>
    <title>Welcome to our shop</title>
</head>
<body>
  <header>
    <div class="heading">
      <h1><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']?>/shop">The Store</a></h1>
      <p>
        All about shop stuff
      </p>
    </div>

    <script type="text/javascript">
      function loginToggle()
      {
        $('.login_form_wrapper').toggle();
      }
    </script>

    <div class="account">
      <ul>
        <?php if(!isset($_SESSION['cs_username'])){?>
        <li id="login"><a href="#" onclick="loginToggle()">LOGIN</a>
          <div class="login_form_wrapper">
            <?php include "login_form.php"?>
          </<div>
          </div>
        </li>
        <li><a href="/shop/customer/register.php">REGISTER</a></li>
        <?php }?>
        <?php if(isset($_SESSION['username']) || isset($_SESSION['cs_username'])){?>
          <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/shop/templates/logout.php"?>">LOGOUT</a></li>
        <?php } ?>
        <li><a href="#">CART</a></li>
      </ul>
    </div>
  </header>


  <nav>
    <h2>MAIN MENU</h2>
    <ul>
      <li><a href="/shop">Home</a></li>
      <li><a href="#">Featured</a></li>
      <li><a href="#">Dicount Item</a></li>
      <li><a href="#">About</a></li>

			<?php if(isset($_SESSION['username']) && $_SESSION['username'] == 'arfn'){
        echo "<li><a href='kitchen/product.php'><i>Add Product</i></a></li>";
      }
      ?>
    </ul>
  </nav>

  <div class="wrapper">
