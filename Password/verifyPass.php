<?php

session_start();

ini_set('display_errors', 'Off');

$db = mysqli_connect('localhost','root', '', 'infosec');



if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $check_email = mysqli_query($db, "SELECT * FROM empreg WHERE Email = '".$email."'");
    if(mysqli_num_rows($check_email) > 0){
        header('location:resetpass.php?Email='.$email);
    }else{
        echo "Wrong Email";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
<input type="email" name="email" placeholder="Enter Your Email">

<button name="submit">Check</button>


</form>
    
</body>
</html>
