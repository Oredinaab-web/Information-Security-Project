 <?php 

session_start();

ini_set('display_errors', 'Off');

$uname = "";
$password = "";
$id = 0;

date_default_timezone_set("Hongkong");
$CurrentTime = date("H:i:sa");
$CurrentDate =  date("Y/m/d"); 

$db = mysqli_connect('localhost','root', '', 'infosec');

if(isset($_POST['submit'])){
    $uname = mysqli_real_escape_string($db,$_POST['Uname']);
    $password = mysqli_real_escape_string($db,$_POST['Pass']);


    $results = mysqli_query($db, "SELECT * FROM empreg where EmpId='$uname'");

    if(mysqli_num_rows($results) > 0){
         while($row = mysqli_fetch_assoc($results)){
              if(password_verify($password, $row['Password'])){
               $uname = $row['EmpId'];
               $_SESSION['U'] = $uname; 
               $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$uname','Logged In')";
               mysqli_query($db, $queryAudit);
               header('Location: http://localhost/InfoAssurance/Inventory/index.php');
               exit();
              }
              else{
            
                $_SESSION['login_att']++;
               echo "<script>alert('Wrong Employee ID and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginUser/LoginUser.php'</script>";
               exit();
              }
         }        
                  
    }else{
       
         $_SESSION['login_att']++;
         echo "<script>alert('Wrong Employee ID and/or Password!'); window.location.href ='http://localhost/InfoAssurance/LoginUser/LoginUser.php'</script>";
         exit();
    }

     
    }

     if(isset($_SESSION['lock'])){
     $difference = time() - $_SESSION['lock'];
     if($difference > 20){
       unset($_SESSION['lock']);
       unset($_SESSION['login_att']);
     }
   
   }
    

 ?>

 

 