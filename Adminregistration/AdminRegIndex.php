<?php include('AdminServer.php');

ini_set('display_errors', 'Off');


    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db,"SELECT * FROM adminreg WHERE id = $id");
        $record = mysqli_fetch_array($rec);
        $SupAdminId = $record['SupAdminId'];
        $AdminId = $record['AdminId'];
        $Password = $record['Password'];
        $Last_Name = $record['Last_Name'];
        $First_Name = $record['First_Name'];
        $Birthday = $record['Birthday'];
        $Age = $record['Age'];
        $Marital_Stat = $record['Marital_Stat'];
        $Gender = $record['Gender'];
        $Email = $record['Email'];
        $Phone_No = $record['Phone_No'];
        $id = $record['id'];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <link rel="stylesheet" type="text/css" href="../SuperAdmin/SupAdmin.css">
    <script language="javascript" type="text/javascript" src="../SuperAdmin/SupAdmin.js"></script>
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
    <script language="javascript" type="text/javascript" src="\InfoAssurance\Validation.js">
    </script>
    <script language="javascript" type="text/javascript">
    function checkForm(form) {
    if(form.Password.value != " "){
            if(form.Password.value.length < 8) {
            alert("Error: Password must contain at least eight characters!");
            form.Password.focus();
            return false;
        }
        re = /[0-9]/;
      if(!re.test(form.Password.value)) {
        alert("Error: Password must contain at least one number (0-9)!");
        form.Password.focus();
        return false;
      }
         re = /[a-z]/;
      if(!re.test(form.Password.value)) {
        alert("Error: Password must contain at least one lowercase letter (a-z)!");
        form.Password.focus();
        return false;
      }
        re = /[A-Z]/;
      if(!re.test(form.Password.value)) {
        alert("Error: Password must contain at least one uppercase letter (A-Z)!");
        form.Password.focus();
        return false;
      }

      if(form.Password.value != form.ConPassword.value) {
        alert("Error: Password and Confirm Password not the same");
        form.Password.focus();
        return false;
      }
        }

        }
    </script> 
</head>
<body oncontextmenu = "return false;">
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

    <?php if(isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                
                
            ?>
        </div>
    <?php endif ?>
    <form method="post" name="form" onsubmit="return checkForm(this)" action="AdminServer.php" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Super Admin</label>
            <input type="text" name="SupAdminId" value="<?php echo $_SESSION['SuperAdminUser']; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Admin ID</label>
            <input type="text" name="AdminId" value="<?php echo $AdminId; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="Password" value="<?php echo $Password; ?>" required>
        </div>
        <div class="input-group">
            <label>Repeat Password</label>
            <input type="password" name="ConPassword" value="<?php echo $Password; ?>" required>
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="Last_Name" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Last_Name; ?>" required>
        </div>
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="First_Name" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $First_Name; ?>" required>
        </div>
        <div class="input-group">
            <label>Birthday</label>
            <input type="date" name="Birthday" value="<?php echo $Birthday; ?>" required>
        </div>
        <div class="input-group">
            <label>Age</label>
            <input type="number" name="Age" value="<?php echo $Age; ?>" required>
        </div>
        <div class="input-group">
            <label>Marital Status</label>
            <select name="Marital_Stat" maxlength="15" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Marital_Stat; ?>" required>
            <option></option>
            <option>Single</option>
            <option>Married</option>
            <option>Divorced</option>
            <option>Married</option>
            </select>
        </div>
        <div class="input-group">
            <label>Gender</label>
            <select name="Gender" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Gender; ?>" required>
            <option></option>
            <option>Male</option>
            <option>Female</option>
            </select>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="Email" value="<?php echo $Email; ?>" required>
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <input type="number" name="Phone_No" onKeyPress="if(this.value.length==11) return false" value="<?php echo $Phone_No; ?>" required>
        </div>
        
        <div class="input-group">
            <?php if ($edit_state == false): ?>
                <button type="submit" name="save" class="btn">Save</button>
            <?php else: ?>
                <button type="submit" name="update" class="btn">Update</button>

            <?php endif ?>

        </div>
    </form>
    <div class="lists">
    <table>
        <thead>
            <tr>
                <th>Super Admin</th>
                <th>Admin_ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Birthday</th>
                <th>Age</th>
                <th>Marital Status</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone_No</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($results)){ ?>
                 <tr>
                 <td><?php echo $row['SupAdminId']; ?></td>
                 <td><?php echo $row['AdminId']; ?></td>
                 <td><?php echo $row['Last_Name']; ?></td>
                 <td><?php echo $row['First_Name']; ?></td>
                 <td><?php echo $row['Birthday']; ?></td>
                 <td><?php echo $row['Age']; ?></td>
                 <td><?php echo $row['Marital_Stat']; ?></td>
                 <td><?php echo $row['Gender']; ?></td>
                 <td><?php echo $row['Email']; ?></td>
                 <td><?php echo $row['Phone_No']; ?></td>
                 <td>
                     <a class="edit_btn" onclick="return confirm('Are you sure you want to update data?')" href="AdminRegIndex.php?edit=<?php echo $row['id']; ?>"><img src="../Images/ed.png" alt="ed" class="ed"></a>
                 </td>
                 <td>
                    <a class="del_btn" onclick="return confirm('Are you sure you want to delete data?')" href="AdminServer.php?del=<?php echo $row['id']; ?>"><img src="../Images/del.png" alt="ed" class="ed"></a>
                 </td>
             </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    
</body>
</html>