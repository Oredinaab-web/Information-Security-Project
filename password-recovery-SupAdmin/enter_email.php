<?php include('app_logic.php'); 

ini_set('display_errors', 'Off');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<form class="login-form" action="enter_email.php" method="post">
		<h2 class="form-title">RESET PASSWORD</h2>
	
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>Email Address</label>
		</div>
		<div class="form-group">
			<input type="email" name="email">
		</div>
		<br>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>