<?php
        session_start();
     
        ini_set('display_errors', 'Off');
         
        $empid = "";
        $Product_ID = "";
        $Product = "";
        $Product_Cat = "";
        $quantity = "";
        $time = "";
        $date = "";
        $Price = "";
        $Total = "";
        $id = 0;
        $edit_state = false; 

        
        date_default_timezone_set("Hongkong");
        $CurrentTime = date("H:i:sa");
        $CurrentDate =  date("Y/m/d"); 

        
        $db = mysqli_connect('localhost','root', '', 'infosec');

       
        if(isset($_POST['save'])) {;
            $empid = $_POST['Emp_ID'];
            $Product_ID = $_POST['Product_ID'];
            $Product = $_POST['Product'];
            $Product_Cat = $_POST['Product_Cat'];
            $quantity = $_POST['Quantity'];
            $time = $_POST['Time'];
            $date = $_POST['Date'];
            $Price = $_POST['Price'];
            $Total = $quantity * $Price;

            $query = "INSERT INTO inventory (Emp_ID, Product_ID, Product, Product_Cat, Quantity, Time, Date, Price, Total) VALUES ('$empid','$Product_ID','$Product','$Product_Cat','$quantity','$time','$date' ,'$Price' ,'$Total')";
            mysqli_query($db, $query);
            $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$empid','Inserted Data')";
            mysqli_query($db, $queryAudit); 
            $_SESSION['msg'] = "Inventory Saved";
            header('location: index.php'); 
        }

        
        if(isset($_POST['update'])) {
            $empid = mysqli_real_escape_string($db,$_POST['Emp_ID']);
            $Product_ID = mysqli_real_escape_string($db,$_POST['Product_ID']);
            $Product = mysqli_real_escape_string($db,$_POST['Product']);
            $Product_Cat = mysqli_real_escape_string($db,$_POST['Product_Cat']);
            $quantity = mysqli_real_escape_string($db,$_POST['Quantity']);
            $time = mysqli_real_escape_string($db,$_POST['Time']);
            $date = mysqli_real_escape_string($db,$_POST['Date']);
            $Price = mysqli_real_escape_string($db,$_POST['Price']);
            $Total = $quantity * $Price;
            $id = mysqli_real_escape_string($db,$_POST['id']);

            mysqli_query($db, "UPDATE inventory set Emp_ID='$empid', Product_ID='$Product_ID', Product='$Product', Product_Cat='$Product_Cat', Quantity='$quantity', Time='$time',Date='$date' ,Price='$Price' ,Total='$Total' WHERE id = $id");
            $_SESSION['msg'] = "Inventory Updated";
            $queryAudit = "INSERT INTO auditlog (Date,Time, Employee_ID, Action) VALUES ('$CurrentDate','$CurrentTime','$empid','Updated Data')";
            mysqli_query($db, $queryAudit); 
            header('location: index.php');
        }


      
        $results = mysqli_query($db, "SELECT * FROM inventory");

        
        $Product_List = mysqli_query($db, "SELECT * FROM product");



?>