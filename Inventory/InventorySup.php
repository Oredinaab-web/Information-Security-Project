<?php include('InventoryServerSup.php');

ini_set('display_errors', 'Off');
     
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db,"SELECT * FROM inventory WHERE id = $id");
        $record = mysqli_fetch_array($rec);
        $empid = $record['Emp_ID'];
        $Product_ID = $record['Product_ID'];
        $Product = $record['Product'];
        $Product_Cat = $record['Product_Cat'];
        $quantity = $record['Quantity'];
        $time = $record['Time'];
        $date = $record['Date'];
        $Price = $record['Price'];
        $Total = $record['Total'];
        $id = $record['id'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../SuperAdmin/SupAdmin.css">
    <script language="javascript" type="text/javascript" src="../SuperAdmin/SupAdmin.js"></script>
    <script language="javascript" type="text/javascript">
   
    window.history.forward();
    </script>
    <script language="javascript" type="text/javascript" src="Validation.js">
 

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

    <form method="post" action="InventoryServerSup.php" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Employee ID</label>
            <input type="text" class="border" name="Emp_ID" value="<?php echo $_SESSION['SuperAdminUser']; ?>" required readonly>
        </div>
        <div class="input-group">
            <label>Product ID</label>
            <input type="text" class="border" name="Product_ID" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Product_ID; ?>" required>
        </div>
        <div class="input-group">
            <label>Product</label>
            <select class="border" name="Product" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Product; ?>" required>
            <option></option>
            <option>Pizza</option>
            <option>Whole Bread</option>
            <option>Wheat Bread</option>
            <option>Buns</option>
            <option>Beef</option>
            <option>Pork</option>
            <option>Sausage</option>
            <option>Lamb</option>
            <option>White Fish</option>
            <option>Salmon</option>
            <option>Tuna</option>
            <option>Whole Milk</option>
            <option>Low Fat Milk</option>
            <option>Cheddar Cheese</option>
            <option>Yogurt</option>
            <option>Iced Tea</option>
            <option>Coca-Cola</option>
            <option>Pepsi</option>
            </select>
        </div>
        <div class="input-group">
            <label>Category</label>
            <select class="border" name="Product_Cat" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Product_Cat; ?>" required>
            <option></option>
            <option>Bread</option>
            <option>Fish</option>
            <option>Meat</option>
            <option>Dairy</option>
            <option>Beverage</option>
            </select>
        </div>
        <div class="input-group">
            <label>Quantity</label>
            <input type="number" class="border" name="Quantity" onKeyPress="if(this.value.length==6) return false" value="<?php echo $quantity; ?>" required>
        </div>
        <div class="input-group">
            <label>Time</label>
            <input type="time" class="border" name="Time" value="<?php echo $time; ?>" required>
        </div>
        <div class="input-group">
            <label>Date</label>
            <input type="date" class="border" name="Date" value="<?php echo $date; ?>" required>
        </div>
        <div class="input-group">
            <label>Price</label>
            <input type="number" class="border" name="Price" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Price; ?>" required>
        </div>
        <div class="input-group">
            <label>Total</label>
            <input type="number" class="border" name="Total" maxlength="35" onKeyPress="return blockSpecialChar(event)" value="<?php echo $Total; ?>" required readonly>
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
                <th>Emp_ID</th>
                <th>Prod_ID</th>
                <th>Product</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Time</th>
                <th>Date</th>
                <th>Price</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($results)){ ?>
                 <tr>
                 <td><?php echo $row['Emp_ID']; ?></td>
                 <td><?php echo $row['Product_ID']; ?></td>
                 <td><?php echo $row['Product']; ?></td>
                 <td><?php echo $row['Product_Cat']; ?></td>
                 <td><?php echo $row['Quantity']; ?></td>
                 <td><?php echo $row['Time']; ?></td>
                 <td><?php echo $row['Date']; ?></td>
                 <td><?php echo $row['Price']; ?></td>
                 <td><?php echo $row['Total']; ?></td>
                 <td>
                     <a class="edit_btn" onclick="return confirm('Are you sure you want to update data?')" href="InventorySup.php?edit=<?php echo $row['id']; ?>"><img src="../Images/ed.png" alt="ed" class="ed"></a>
                 </td>
                 <td>
                    <a class="del_btn" onclick="return confirm('Are you sure you want to delete data?')" href="InventoryServerSup.php?del=<?php echo $row['id']; ?>"><img src="../Images/del.png" alt="ed" class="del"></a>
                 </td>
             </tr>
            <?php } ?>
        </tbody>
    </table>
    
    </div>

    <div class="Prod-list">
    <table>
        <thead>
            <tr>
                <th>Product_ID</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($Product_List)){ ?>
                 <tr>
                 <td><?php echo $row['Product_ID']; ?></td>
                 <td><?php echo $row['Product']; ?></td>
                 <td><?php echo $row['Price']; ?></td>
             </tr>
            <?php } ?>
        </tbody>
    </table>
    
    </div>

    
    
    
    
</body>
</html>