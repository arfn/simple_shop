<?php include '../config/config.php';
      include(HEADER);
      include(MODEL_PATH . 'model.php');
      include(CONFIG_PATH . 'flash.php');
 ?>

  <?php if(isset($_SESSION['username'])){
 	//Redirect if logged in
 	session_start();
	header("Location:"."http://".$_SERVER['SERVER_NAME']."/shop");
	}
	?>

<?php
	$model = new Model();
	flash("notice");
?>

<?php

	if(isset($_POST['admin_login_submit']))
	{
		$username = htmlspecialchars($_POST['admin_login_username']);
		$password = htmlspecialchars($_POST['admin_login_password']);

		if($model->login($username, $password)){
			flash("notice", "Login succesfuly as " . $username);
			header("Location:"."http://".$_SERVER['SERVER_NAME']."/shop");
		}
		else{
			flash("notice", "Login failed", "error");
			header("Location: ".$_SERVER['REQUEST_URI']);
		}
	}

?>

<h3>Admin Login</h3>
<form action="" method="post" style="line-height: 3em">
	<input type="text" name="admin_login_username" placeholder="Username"><br>
	<input type="password" name="admin_login_password" placeholder="Password"><br>
	<input type="submit" name="admin_login_submit" value="Log in">
</form>

<?php include(FOOTER);?>
