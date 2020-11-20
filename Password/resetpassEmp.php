<?php 

session_start();

ini_set('display_errors', 'Off');

$db = mysqli_connect('localhost','root', '', 'infosec');

$EmployeeID = $_SESSION['U'];

date_default_timezone_set("Hongkong");
$CurrentTime = date("H:i:sa");
$CurrentDate =  date("Y/m/d"); 


if(isset($_POST['submit'])){
    $empid = mysqli_real_escape_string($db,$_POST['empid']);
    $oldpass = mysqli_real_escape_string($db,$_POST['oldpass']);
    $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT); 
    $confpass = mysqli_real_escape_string($db,$_POST['confpass']);
    
    
    $results = mysqli_query($db, "SELECT * FROM empreg WHERE EmpId = '".$empid."'");

    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
             if(password_verify($oldpass, $row['Password'])){
              $empid = $row['EmpId'];
              $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$empid','Changed Password')";
              mysqli_query($db, $queryAudit); 
              mysqli_query($db,"UPDATE empreg SET Password ='".$newpass."' WHERE EmpId='".$empid."'");
              echo "<script>alert('Your Password Has Been Changed. Please Login Again!'); window.location.href ='http://localhost/InfoAssurance/LoginUser/LoginUser.php'</script>";
              session_destroy();
              exit();
             }
             else{
                echo "<script>alert('Wrong Credentials. Please Try Again!'); window.location.href ='http://localhost/InfoAssurance/Password/resetpassEmp.php'</script>";
                exit();
             }
        }        
                 
   }else{
    echo "<script>alert('Wrong Credentials. Please Try Again!'); window.location.href ='http://localhost/InfoAssurance/Password/resetpassEmp.php'</script>";
    exit();
    
   }

}

if(isset($_POST['cancel'])){
    header('Location: http://localhost/InfoAssurance/Inventory/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="ChangePassStyle.css">
    <script language="javascript" type="text/javascript">
    function checkForm(form) {
    if(form.newpass.value != " "){
            if(form.newpass.value.length < 8) {
            alert("Error: Password must contain at least eight characters!");
            form.newpass.focus();
            return false;
        }
        re = /[0-9]/;
      if(!re.test(form.newpass.value)) {
        alert("Error: Password must contain at least one number (0-9)!");
        form.newpass.focus();
        return false;
      }
         re = /[a-z]/;
      if(!re.test(form.newpass.value)) {
        alert("Error: Password must contain at least one lowercase letter (a-z)!");
        form.newpass.focus();
        return false;
      }
        re = /[A-Z]/;
      if(!re.test(form.newpass.value)) {
        alert("Error: Password must contain at least one uppercase letter (A-Z)!");
        form.newpass.focus();
        return false;
      }

      if(form.newpass.value != form.confpass.value) {
        alert("Error: Password and Confirm Password not the same");
        form.newpass.focus();
        return false;
      }

      if(form.newpass.value == form.oldpass.value) {
        alert("Error: Sorry You Cannot Use your Old Password");
        form.newpass.focus();
        return false;
      }
        }
 
 }


    </script>
</head>
<body oncontextmenu = "return false;" class="align">

<div class="container">
        <h3>CHANGE PASSWORD</h3>
        <form method="post" onsubmit="return checkForm(this)" >

            <div class="form__field">
                <input type="text" name="empid" placeholder="Employee ID" class="form__input" value="<?php echo $EmployeeID; ?>" readonly>
            </div>
            <br>
            <div class="form__field">
                <input type="password" name="oldpass" placeholder="Old Password" class="form__input" pattern=".{8,}" autocomplete="off">
                <span class="icon"></span>
            </div>
            <br>
            <div class="form__field">
                <input type="password" name="newpass" placeholder="New Password" class="form__input" pattern=".{8,}" autocomplete="off">
                
                <span class="icon"></span>
            </div>
            <br>
            <div class="form__field">
                <input type="password" name="confpass" placeholder="Confirm Password" class="form__input" pattern=".{8,}" autocomplete="off">
               
                <span class="icon"></span>
            </div>
            <br>
            <div class="btncontainer">
            <button name="submit" value="submit">Change Password</button>
            <button name="cancel" id="cancel" value="submit">Cancel</button>
            </div>
    </div>


</form>
    
</body>
</html>