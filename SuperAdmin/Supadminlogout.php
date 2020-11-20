<?php

session_start();

ini_set('display_errors', 'Off');
 
$_SESSION = array();
 

session_destroy();
header('Location: http://localhost/InfoAssurance/LoginSuperAdmin/LoginSuperAdmin.php');
exit;



?>