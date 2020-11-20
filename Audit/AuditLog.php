<?php 
ini_set('display_errors', 'Off');

$db = mysqli_connect('localhost','root', '', 'infosec');


$Audit_Log = mysqli_query($db, "SELECT * FROM auditlog");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="AuditLog.css">
    <link rel="stylesheet" type="text/css" href="../SuperAdmin/SupAdmin.css">
    <script language="javascript" type="text/javascript" src="../SuperAdmin/SupAdmin.js"></script>
    <title>Audit Log</title>
</head>

<body>

<div id="mySidenav" class="sidenav">
  <center>
  <img src="../Images/management.svg" height="150px" alt="">
  </center>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../SuperAdmin/SupAd_MainPage.html">Home</a>
  <a href="http://localhost/InfoAssurance/Inventory/InventorySup.php">Inventory</a>
  <a href="http://localhost/InfoAssurance/Empregistration/EmpRegIndexAdmin.php">Employee</a>
  <a href="http://localhost/InfoAssurance/Adminregistration/AdminRegIndex.php">Admin</a>
  <a href="http://localhost/InfoAssurance/Audit/AuditLog.php">Audit Log</a>
  <a href="http://localhost/InfoAssurance/Password/resetpassSupAd.php">Change Password</a>
  <a href="http://localhost/InfoAssurance/SuperAdmin/Supadminlogout.php">Logout</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

    <div class="Audit-list">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Employee ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($Audit_Log)){ ?>
                <tr>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
                    <td><?php echo $row['Employee_ID']; ?></td>
                    <td><?php echo $row['Action']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>

</html>