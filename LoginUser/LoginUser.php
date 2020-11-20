<?php include('Userserver.php')

?>


<?php if(!array_key_exists('login_att',$_SESSION)){
  $_SESSION['login_att'] = 0;
}?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>UserLogin</title>    
    <link rel="stylesheet" type="text/css" href="LoginUser.css"> 
    <script language="javascript" type="text/javascript">

    window.history.forward();
    </script>
</head>    
<body oncontextmenu = "return false;">  
 
    <div class="none"></div> 
    <div class="login">    
    <form id="login" method="POST" class="form-style-9" action="Userserver.php">  
        <div class="pic">
            <li> </li>
         </div>  
        <label class="EmpLabel"><b>Employee ID    
        <br><br>
        </b>    
        </label> 
        <?php if($_SESSION['login_att'] > 5){   
            $_SESSION['lock'] = time();?>
            <input type="text" class="field-style field-split align-left" name="Uname" id="Uname" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required disabled> 
        <?php }else{ ?>    
            <input type="text" class="field-style field-split align-left" name="Uname" id="Uname" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Letters and Numbers only" required> 
        <?php } ?>     
        <br><br>    
        <label class="PassLabel"><b>Password
        <br><br>    
        </b>    
        </label>  
        <?php if($_SESSION['login_att'] > 5){   
            $_SESSION['lock'] = time();?>
            <input type="Password" class="field-style field-split align-left" name="Pass" autocomplete="off" id="Pass" required disabled>   
        <?php }else{ ?>   
            <input type="Password" class="field-style field-split align-left" name="Pass" autocomplete="off" id="Pass" required>  
        <?php } ?>   
        <br><br>  
        <?php if($_SESSION['login_att'] > 5){   
            $_SESSION['lock'] = time();
            echo "<center>Disabled refresh page after 20 seconds</center>"; 
        }else{ ?> 
            <button type="submit" class="button" name="submit" formaction="">Login</button> 
        <?php } ?>      
        <br><br>  
        <a href="http://localhost/InfoAssurance/password-recovery-Emp/enter_email.php">Forgot Password?</a>
        <a href="../LoginOptions/options.html">Go Back</a> 
       
    </form>     
</div>



</body>    
</html>     