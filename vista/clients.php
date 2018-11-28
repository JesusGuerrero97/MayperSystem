<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login clientes</title>
    <link rel="stylesheet" href="../public/css/p_estilo.css">
</head>
<body>
    
    
  <?php

    if(isset($_SESSION['client'])){
        header("Location: cliente.php");
    }
    if(isset($_SESSION['mensaje'])){
        $Mensaje = $_SESSION['mensaje'];
    }else{
        $Mensaje = "";
    }
?>
    
    
    <div id="tabs-container">

        <div class="tab tab-active"><p>Login</p></div>
        <div class="tab"><p>Registro</p></div>

    </div>

    <div id="container">
       
<!--       CONTENEDOR PARA FORMULARIO DE LOGIN -->
        <div class="content content-active">
            <img src="../public/img/logo.png" alt="Logo mayper">
            
            <?php echo "<p class='error-mensaje'>$Mensaje</p>"; ?>
            
            <form action="../controlador/AutentificarCliente.php" method="post">
                
                <input class="input" type="text" name="user" placeholder="Usuario">
                <input class="input" type="password" name="password" placeholder="Contraseña">
                <input class="submit" type="submit" name="login" value="Acceder">
                
            </form>    
            <p class="form-p"><a onclick="recover(2)"><u>¿Haz olvidado la contraseña?</u></a></p>
        </div>
        
        <!--       CONTENEDOR PARA FORMULARIO DE REGISTRO -->
        <div class="content">
       
            <img src="../public/img/logo.png" alt="Logo mayper">
            
            <form action="../controlador/registro_cliente.php" method="post">
                <input class="input" type="text" name="nombre" placeholder="Nombre">
                <input class="input" type="text" name="apellidop" placeholder="Apellido(s)">
                <input class="input_two" type="text" name="usuario" placeholder="Usuario">
                <input class="inputPair" type="password" name="contra" placeholder="Contraseña">
                <select class="input" name="especialidad">
                    <option value="0">Seleccione una especialidad..</option>
                    <option value="Radiología">Radiología</option>
                    <option value="Cardiología">Cardiología</option>
                    <option value="Gin/OBT">Gin/OBT</option>
                </select>
                <input class="input" type="text" name="correo" placeholder="Correo electrónico">
                <input class="input_two" type="text" name="ciudad" placeholder="Ciudad">
                <input class="inputPair" type="text" name="estado" placeholder="Estado">
                
                <input class="submit" type="submit" name="signin" value="Registrarse">

            </form>
          
        </div>
        
        <!--       CONTENEDOR PARA FORMULARIO DE RECUPERAR CONTRASEÑA -->
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