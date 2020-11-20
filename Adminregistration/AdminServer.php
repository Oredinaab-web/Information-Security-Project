<?php
        session_start();

        ini_set('display_errors', 'Off');
  
        $SupAdminId = "";
        $AdminId = "ADM" . mt_rand(01,99);
        $Password = "";
        $Last_Name = "";
        $First_Name = "";
        $Birthday = "";
        $Age = "";
        $Marital_Stat = "";
        $Gender = "";
        $Email = "";
        $Phone_No = "";
        $id = 0;
        $edit_state = false;

        $db = mysqli_connect('localhost','root', '', 'infosec');

        if(isset($_POST['save'])) {;
            $SupAdminId = $_POST['SupAdminId'];
            $AdminId =  $_POST['AdminId'];
            $Password = $_POST['Password'];
            $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); //Pass Encryption
            $Last_Name = $_POST['Last_Name'];
            $First_Name= $_POST['First_Name'];
            $Birthday = $_POST['Birthday'];
            $Age = $_POST['Age'];
            $Marital_Stat = $_POST['Marital_Stat'];
            $Gender = $_POST['Gender'];
            $Email = $_POST['Email'];
            $Phone_No = $_POST['Phone_No'];

            $query = "INSERT INTO adminreg (SupAdminId,AdminId, Password, Last_Name, First_Name, Birthday, Age, Marital_Stat,Gender,Email,Phone_No) VALUES ('$SupAdminId','$AdminId','$Password','$Last_Name','$First_Name','$Birthday','$Age','$Marital_Stat','$Gender','$Email','$Phone_No')";
            mysqli_query($db, $query);
            $_SESSION['msg'] = "Inventory Saved";
            header('location: AdminRegIndex.php');
        }

       
        if(isset($_POST['update'])) {
            $SupAdminId = mysqli_real_escape_string($db,$_POST['SupAdminId']);
            $Last_Name = mysqli_real_escape_string($db,$_POST['Last_Name']);
            $Marital_Stat = mysqli_real_escape_string($db,$_POST['Marital_Stat']);
            $Email = mysqli_real_escape_string($db,$_POST['Email']);
            $Phone_No = mysqli_real_escape_string($db,$_POST['Phone_No']);
            $id = mysqli_real_escape_string($db,$_POST['id']);


            mysqli_query($db, "UPDATE adminreg set SupAdminId='$SupAdminId', Last_Name='$Last_Name', Marital_Stat='$Marital_Stat', Email='$Email', Phone_No='$Phone_No' WHERE id = $id");
            $_SESSION['msg'] = "Inventory Updated";
            header('location: AdminRegIndex.php');
        }

 
        if(isset($_GET['del'])){
            $id = $_GET['del'];
            mysqli_query($db, "DELETE FROM adminreg WHERE id = $id");
            $_SESSION['msg'] = "Inventory Deleted";
            header('location: AdminRegIndex.php');
        }


        $results = mysqli_query($db, "SELECT * FROM adminreg");





?>

