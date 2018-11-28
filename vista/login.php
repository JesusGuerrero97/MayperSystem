<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login empleados</title>
    <link rel="stylesheet" href="../public/css/p_estilo.css">
</head>
<body>
    
     
    <?php
    
        if(isset($_SESSION['user'])){
            $loc = "?target=".$_SESSION['user']['userTipo'];
            header("Location: ../controlador/redirect_user.php".$loc);
        }
        if(isset($_SESSION['mensaje'])){
            $Mensaje = $_SESSION['mensaje'];
        }else{
            $Mensaje = "";
        }
    ?>
    
    <div id="tabs-container">

        <div class="tab tab-active"><p>Login</p></div>
    </div>

    <div id="container">
       
        <div class="content content-active">
            <img src="../public/img/logo.png" alt="Logo mayper">
            
            <?php echo "<p class='error-mensaje'>$Mensaje</p>"; ?>
            
            <form action="../controlador/AutentificarEmpleado.php" method="post">
                
                <input class="input" type="email" name="user" placeholder="Correo">
                <input class="input" type="password" name="password" placeholder="Contraseña">
                <input class="submit" type="submit" name="login" value="Acceder">
                
            </form>    
            <p class="form-p"><a onclick="recover(1)"><u>¿Haz olvidado la contraseña?</u></a></p>
        </div>
      
        
        <div class="content">
       
            <img src="../public/img/logo.png" alt="Logo mayper">
            <h2>Recuperar contraseña</h2>
            
            <form action="#" method="post">
                <input class="input" type="text" name="email" placeholder="Correo electrónico">  
                <input class="submit" type="submit" name="send" value="Acceder">
            </form>
          
            <p class="form-p"><a onclick="recover(0)"><u>Regresar a iniciar sesión</u></a></p>
        </div>
        
    </div>
    
</body>
<script src="../public/js/p_tabs.js"></script>
</html>