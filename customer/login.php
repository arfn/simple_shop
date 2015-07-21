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
	//TODO remember me
	include '../config/config.php';
	include MODEL_PATH . "customer.php";
	$customer = new Customer_Model;
	if (isset($_POST['login_submit'])) {
		$username = htmlspecialchars($_POST['login_username']);
		$password = htmlspecialchars($_POST['login_password']);

		if($customer->validate_login($username, $password))
		{
			echo "<div class=notice_redirect>Login Successfuly</div>";
			header("Refresh:3;url=/shop/index.php");
		}
		else
		{
			echo "<div class=notice_redirect>Username or password incorrect</div>";
			header("Refresh:3;url=/shop/index.php");
		}
	}

 ?>
  </body>
</html>
