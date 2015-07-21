<?php include '../config/config.php';
	include(MODEL_PATH . 'customer.php');
	$model = new Customer_Model();
?>
<?php 


	if(isset($_POST['customer_submit']))
	{
		$args = array(
			'customer_name' => FILTER_SANITIZE_SPECIAL_CHARS,
			'customer_username' => FILTER_SANITIZE_SPECIAL_CHARS,
			'customer_password' => FILTER_SANITIZE_SPECIAL_CHARS,
			'customer_email' => FILTER_VALIDATE_EMAIL
			);

        $input = filter_input_array(INPUT_POST, $args);		
		$model->register_customer($input);
	}
	else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/shop/src/stylesheet/customer.css">
</head>
<body>
	<div class="register_form_wrapper">
	<div class="form_ribbon">CUSTOMER REGISTRATION</div>
		<form method="POST" action="">
			<label for="customer_name">Full Name</label>
			<input type="text" name="customer_name" placeholder="John Doe" required="required">
			<br>
			<label for="customer_username">Username</label>
			<input type="text" name="customer_username" required="required">
			<br>
			<label for="customer_email">E-mail</label>
			<input type="email" name="customer_email" required="required">
			<br>
			<label for="customer_password">Password</label>
			<input type="password" name="customer_password" required="required">
			<br>
			<label for="customer_password_confirmation">Password Confirmation</label>
			<input type="password" name="customer_password_confirmation" required="required">
			<br>
			<input type="submit" value="Register" name="customer_submit">
		</form>
	</div>
</body>
</html>
<?php include '../templates/footer.php';?>
<?php } ?>