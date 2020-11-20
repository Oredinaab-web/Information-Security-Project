<?php 

session_start();

ini_set('display_errors', 'Off');

$errors = [];
$user_id = "";
$username="";
$email="";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'infosec');


if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
 
  $query = "SELECT Email FROM adminreg WHERE Email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
   
    $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($db, $sql);

    
    $to = $email;
    $subject = "MAIN STREET MANILA PASSWORD RECOVERY";
    $msg = "Hello Admin, click on the link to reset your password http://localhost/InfoAssurance/password-recovery-Admin/new_password.php?token=" . $token . "\"";
    
    $msg = wordwrap($msg,70);
    $headers = "From: info@examplesite.com";
    mail($to, $subject, $msg, $headers);
 
    header('location: pending.php?email=' . $email);
  }
}


if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);


  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {

    $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT); 
      $sql = "UPDATE adminreg SET Password='$new_pass' WHERE Email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: http://localhost/InfoAssurance/LoginAdmin/LoginAdmin.php');
    }
  }
}
?>


