<?php include('SuperAdminserver.php')

?>

<?php if(!array_key_exists('login_attempts_SuperAdmin',$_SESSION)){
  $_SESSION['login_attempts_SuperAdmin'] = 0;
}?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>SuperAdmin</title>    
    <link rel="stylesheet" type="text/css" href="LoginSuperAdmin.css">   
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
</head>    
<body oncontextmenu = "return false;">    
<div class="none"></div> 
    <div class="login">    
    <form id="login" method="POST" class="form-style-9" action="SuperAdminserver.php">  
        <div class="pic">
            <li> </li>
         </div>  
        <label class="SupAdminLabel"><b>Username  
        <br><br>
        </b>    
        </label> 
        <?php if($_SESSION['login_attempts_SuperAdmin'] > 5){   
            $_SESSION['locked_SuperAdmin'] = time(); ?>
            <input type="text" class="field-style field-split align-left" name="AdminUname" id="Uname" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required disabled>   
        <?php }else{ ?>    
            <input type="text" class="field-style field-split align-left" name="AdminUname" id="Uname" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required>   
        <?php } ?>  
        <br><br>    
        <label class="PassLabel"><b>Password
        <br><br>    
        </b>    
        </label>  
        <?php if($_SESSION['login_attempts_SuperAdmin'] > 5){   
            $_SESSION['locked_SuperAdmin'] = time(); ?>
            <input type="Password" class="field-style field-split align-left" name="AdminPass" id="Pass" autocomplete="off" required disabled> 
        <?php }else{ ?>  
            <input type="Password" class="field-style field-split align-left" name="AdminPass" id="Pass" autocomplete="off" required> 
        <?php } ?>     
        <br><br>
        <?php if($_SESSION['login_attempts_SuperAdmin'] > 5){   
            $_SESSION['locked_SuperAdmin'] = time();
            echo "<center>Disabled refresh page after 20 seconds</center>";  
        }else{ ?>
            <button type="submit" class="button" name="submit" formaction="">Login</button>  
        <?php } ?>   
        <br><br>  
        <a href="http://localhost/InfoAssurance/password-recovery-SupAdmin/enter_email.php">Forgot Password?</a>
        <a href="../LoginOptions/options.html">Go Back</a> 
    </form>     
</div>
</body>    
</html>     