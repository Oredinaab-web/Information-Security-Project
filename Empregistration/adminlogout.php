<?php

ini_set('display_errors', 'Off');

session_start();
 
$db = mysqli_connect('localhost','root', '', 'infosec');


date_default_timezone_set("Hongkong");
$CurrentTime = date("H:i:sa");
$CurrentDate =  date("Y/m/d");

$AdminID = $_SESSION['AdminUser'];


$queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$AdminID','Logged Out')";
mysqli_query($db, $queryAudit); 

$_SESSION = array();
 

session_destroy();
header('Location: http://localhost/InfoAssurance/LoginAdmin/LoginAdmin.php');
exit;


?>