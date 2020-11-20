<?php
        session_start();

        ini_set('display_errors', 'Off');
        
        $AdminId = "";
        $EmpId = "EMP" . mt_rand(01,99);
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

        date_default_timezone_set("Hongkong");
        $CurrentTime = date("H:i:sa");
        $CurrentDate =  date("Y/m/d"); 
  
        $db = mysqli_connect('localhost','root', '', 'infosec');

        
        if(isset($_POST['save'])) {;
            $AdminId = $_POST['AdminId'];
            $EmpId =  $_POST['EmpId'];
            $Password = $_POST['Password'];
            $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); 
            $Last_Name = $_POST['Last_Name'];
            $First_Name= $_POST['First_Name'];
            $Birthday = $_POST['Birthday'];
            $Age = $_POST['Age'];
            $Marital_Stat = $_POST['Marital_Stat'];
            $Gender = $_POST['Gender'];
            $Email = $_POST['Email'];
            $Phone_No = $_POST['Phone_No'];

            $query = "INSERT INTO empreg (AdminId,EmpId, Password, Last_Name, First_Name, Birthday, Age, Marital_Stat,Gender,Email,Phone_No) VALUES ('$AdminId','$EmpId','$Password','$Last_Name','$First_Name','$Birthday','$Age','$Marital_Stat','$Gender','$Email','$Phone_No')";
            mysqli_query($db, $query);
            $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$AdminId','Inserted Data')";
            mysqli_query($db, $queryAudit); 
            $_SESSION['msg'] = "Inventory Saved";
            header('location: EmpRegIndex.php');
        }

    
        if(isset($_POST['update'])) {
            $AdminId = mysqli_real_escape_string($db,$_POST['AdminId']);
            $Last_Name = mysqli_real_escape_string($db,$_POST['Last_Name']);
            $Marital_Stat = mysqli_real_escape_string($db,$_POST['Marital_Stat']);
            $Email = mysqli_real_escape_string($db,$_POST['Email']);
            $Phone_No = mysqli_real_escape_string($db,$_POST['Phone_No']);
            $id = mysqli_real_escape_string($db,$_POST['id']);


            mysqli_query($db, "UPDATE empreg set AdminId='$AdminId', Last_Name='$Last_Name', Marital_Stat='$Marital_Stat', Email='$Email', Phone_No='$Phone_No' WHERE id = $id");
            $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$AdminId','Updated Data')";
            mysqli_query($db, $queryAudit); 
            $_SESSION['msg'] = "Inventory Updated";
            header('location: EmpRegIndex.php');
        }

        $results = mysqli_query($db, "SELECT * FROM empreg");





?>