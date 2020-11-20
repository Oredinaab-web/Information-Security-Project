<?php include('app_logic.php'); 

ini_set('display_errors', 'Off');

	if(isset($_GET['token']))
	{
	$token = $_GET['token'];
	$_SESSION['token'] = $token;
	$session_token = $_SESSION['token'];
	echo $session_token;
	}else{
	echo "no token";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<form class="login-form" action="new_password.php" method="post">
		<h2 class="form-title">NEW PASSWORD</h2>
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>New Password</label>
			<input type="password" name="new_pass">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="new_pass_c">
		</div>
		<div class="form-group">
			<button type="submit" name="new_password" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>