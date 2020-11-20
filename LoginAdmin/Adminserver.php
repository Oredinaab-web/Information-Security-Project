 <?php 

session_start();

ini_set('display_errors', 'Off');

$AdminId = "";
$password = "";
$ID = 0;

date_default_timezone_set("Hongkong");
$CurrentTime = date("H:i:sa");
$CurrentDate =  date("Y/m/d"); 

$db = mysqli_connect('localhost','root', '', 'infosec');


if(isset($_POST['submit'])){
    $AdminId = mysqli_real_escape_string($db,$_POST['AdminId']);
    $password = mysqli_real_escape_string($db,$_POST['Pass']);

    $results = mysqli_query($db, "SELECT * FROM adminreg where AdminId='".$AdminId."'");

    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
             if(password_verify($password, $row['Password'])){
              $AdminId = $row['AdminId'];
              $_SESSION['AdminUser'] = $AdminId;
              $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$AdminId','Logged In')";
              mysqli_query($db, $queryAudit);
              header('Location: http://localhost/InfoAssurance/Empregistration/EmpRegIndex.php');
              exit();
             }
             else{
               
                $_SESSION['login_attempts']++;
                echo "<script>alert('Wrong Username and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginAdmin/LoginAdmin.php'</script>";
                exit();
             }
        }        
                 
   }else {
        
          $_SESSION['login_attempts']++;
        echo "<script>alert('Wrong Username and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginAdmin/LoginAdmin.php'</script>";
        exit();
    }
    
}


if(isset($_SESSION['locked'])){

  $difference = time() - $_SESSION['locked'];
  if($difference > 20){
    unset($_SESSION['locked']);
    unset($_SESSION['login_attempts']);
  }

}

 ?>

 