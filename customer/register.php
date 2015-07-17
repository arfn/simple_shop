<?php 
	if(isset($_POST['customer_register_submit']))
	{
		
	}
	else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../src/stylesheet/customer.css">
</head>
<body>
	<div class="register_form_wrapper">
	<div class="form_ribbon">CUSTOMER REGISTRATION</div>
		<form method="POST" action="">
			<label for="customer_register_name">Full Name</label>
			<input type="text" name="customer_register_name" placeholder="John Doe" required="required">
			<br>
			<label for="customer_register_username">Username</label>
			<input type="text" name="customer_register_username" required="required">
			<br>
			<label for="customer_register_email">E-mail</label>
			<input type="email" name="customer_register_email" required="required">
			<br>
			<label for="customer_register_password">Password</label>
			<input type="password" name="customer_register_password" required="required">
			<br>
			<label for="customer_register_password_confirmation">Password Confirmation</label>
			<input type="password" name="customer_register_password_confirmation" required="required">
			<br>
			<input type="submit" value="Register" name="customer_register_submit">
		</form>
	</div>
</body>
</html>

<?php } ?>