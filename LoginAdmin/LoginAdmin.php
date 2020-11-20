<?php include('Adminserver.php')

?>



<?php if(!array_key_exists('login_attempts',$_SESSION)){
  $_SESSION['login_attempts'] = 0;
}?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>AdminLogin</title>    
    <link rel="stylesheet" type="text/css" href="LoginAdmin.css">   
    <script language="javascript" type="text/javascript">
    
    window.history.forward();
    </script>
</head>    
<body oncontextmenu = "return false;">    
<div class="none"></div> 
    <div class="login">    
    <form id="login" method="POST" class="form-style-9" action="Adminserver.php">  
        <div class="pic">
            <li> </li>
         </div>  
        <label class="AdminLabel"><b>Admin ID 
        <br><br>
        </b>    
        </label> 
        
        <?php if($_SESSION['login_attempts'] > 5){   
            $_SESSION['locked'] = time(); ?>
            <input type="text" class="field-style field-split align-left" name="AdminId" id="AdminId" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required disabled>   
        <?php }else{ ?>    
            <input type="text" class="field-style field-split align-left" name="AdminId" id="AdminId" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required>   
        <?php } ?>  
        <br><br>    
        <label class="PassLabel"><b>Password
        <br><br>    
        </b>    
        </label>  
        
        <?php if($_SESSION['login_attempts'] > 5){   
            $_SESSION['locked'] = time(); ?>
            <input type="Password" class="field-style field-split align-left" name="Pass" id="Pass" autocomplete="off" required disabled> 
        <?php }else{ ?>  
            <input type="Password" class="field-style field-split align-left" name="Pass" id="Pass" autocomplete="off" required> 
        <?php } ?>     
        <br><br>
        
        <?php if($_SESSION['login_attempts'] > 5){   
            $_SESSION['locked'] = time();
            echo "<center>Disabled refresh page after 20 seconds</center>";  
        }else{ ?>
            <button type="submit" class="button" name="submit" formaction="">Login</button>  
        <?php } ?>   
        <br><br>  
        <a href="http://localhost/InfoAssurance/password-recovery-Admin/enter_email.php">Forgot Password?</a>
        <a href="../LoginOptions/options.html">Go Back</a> 
    </form>     
</div>
</body>    
</html>     