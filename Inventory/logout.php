<?php

session_start();

ini_set('display_errors', 'Off');

$db = mysqli_connect('localhost','root', '', 'infosec');


date_default_timezone_set("Hongkong");
$CurrentTime = date("H:i:sa");
$CurrentDate =  date("Y/m/d");

$empid = $_SESSION['U'];


$queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$empid','Logged Out')";
mysqli_query($db, $queryAudit); 



$_SESSION = array();
 

session_destroy();
header('Location: http://localhost/InfoAssurance/LoginUser/LoginUser.php');
exit;

?>