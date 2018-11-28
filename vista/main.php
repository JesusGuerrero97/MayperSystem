<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="../public/css/p_main.css">
    <link rel="stylesheet" href="../public/css/p_modal.css">
</head>
<body style="background-color: #CCC; margin: 0">
    
    
    <?php

        if(!isset($_SESSION['user'])){
            echo'<script type="text/javascript">
            alert("Inicie sesión para continar");
            window.location.href="login.php";
            </script>';
        }
    ?>
    
    <section id="cortain">
        <div class="image-logo">
           <img src="../public/img/logo_white.png" alt="Logo mayper">
        </div>
        
        <div class="profile-information">
            <figure class="figure-profile">
                <figcaption><?php echo $_SESSION['user']["userNombre"]; ?></figcaption>
                <img src="<?php echo $_SESSION['user']["userFoto"]; ?>" alt="">
            </figure>
        </div>
        
    </section>
    
    <section id="side-left">
       
       
       <div class="notification-pane"> 
            <img class="notification_image" src="../public/img/notification_icon.png" alt="Imagen de perfil" title="notificaciones" >       

       </div>
       
       <div class="exit-button" onclick="document.location = '../controlador/logout.php';" title="">
            <p>Cerrar sesión</p>
        </div>
        
    </section>
    
    <section id="container">
        
        <section id="row">
            <div class="box box1">
                <figure>
                    <img src="../public/img/inventory_icon.png" alt="">
                    <figcaption>
                        Inventario
                    </figcaption>
                        
                </figure>
                
            </div>

            <div class="box box2">
                <figure>
                    <img src="../public/img/saleman_icon.png" alt="">
                    <figcaption>
                        Vendedores
                    </figcaption>
                </figure>
            </div>

            <div class="box box3">
                <figure>
                    <img src="../public/img/administrator_icon.png" alt="">
                    <figcaption>
                        Administrativos
                    </figcaption>
                </figure>
            </div>

        </section>
     
        
        <section id="row" class="br">
        
            
            <div class="box box4">
                <figure>
                    <img src="../public/img/engineer_icon.png" alt="">
                    <figcaption>
                        Aplicacionistas
                    </figcaption>
                </figure>
            </div>

            <div class="box box5">
                <figure>
                    <img src="../public/img/contrato.png" alt="">
                    <figcaption>
                        Contratos
                    </figcaption>
                </figure>
            </div>

            <div class="box box6">        
                <figure>
                    <img src="../public/img/demo.png" alt="">
                    <figcaption>
                        Demos
                    </figcaption>
                </figure>
            </div>
        </section>
        
    </section>
    
    
    
</body>
</html>