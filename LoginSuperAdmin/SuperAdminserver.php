<?php 

session_start();

ini_set('display_errors', 'Off');

$AdminUname = "";
$AdminPass = "";
$ID = 0;

$db = mysqli_connect('localhost','root', '', 'infosec');


if(isset($_POST['submit'])){
    $AdminUname = mysqli_real_escape_string($db,$_POST['AdminUname']);
    $AdminPass = mysqli_real_escape_string($db,$_POST['AdminPass']);

    $results = mysqli_query($db, "SELECT * FROM superad where Username='".$AdminUname."'");

    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
             if(password_verify($AdminPass, $row['Password'])){
              $AdminUname = $row['Username'];
              $_SESSION['SuperAdminUser'] = $AdminUname;
              header('Location: http://127.0.0.1:5501/SuperAdmin/SupAd_MainPage.html');
              exit();
             }
             else{
               
                $_SESSION['login_attempts_SuperAdmin']++;
                echo "<script>alert('Wrong Username and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginSuperAdmin/LoginSuperAdmin.php'</script>";
                exit();
             }
        }        
                 
   }else {
       
          $_SESSION['login_attempts_SuperAdmin']++;
        echo "<script>alert('Wrong Username and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginSuperAdmin/LoginSuperAdmin.php'</script>";
        exit();
    }
    
}

if(isset($_SESSION['locked_SuperAdmin'])){

  $difference = time() - $_SESSION['locked_SuperAdmin'];
  if($difference > 20){
    unset($_SESSION['locked_SuperAdmin']);
    unset($_SESSION['login_attempts_SuperAdmin']);
  }

}

 ?>

 