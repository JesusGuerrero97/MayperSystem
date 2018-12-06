<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aplicacionistas</title>
    <link rel="stylesheet" href="../public  /css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    
    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>
    
  </head>
  <body>
   
       <?php

        if(!isset($_SESSION['user'])){
            echo'<script type="text/javascript">
                    alert("Inicie sesión para continar");
                    window.location.href="login.php";
                </script>';
            
        }else if(!($_SESSION['user']['userTipo'] == "Directivo" || $_SESSION['user']['userTipo'] == "Administrador" || $_SESSION['user']['userTipo'] == "Aplicacionista")){
//           
            $loc = "?target=".$_SESSION['user']['userTipo'];
            header("Location: ../controlador/redirect_user.php".$loc);
        
        }
    ?>
   
    <div id="sechead">
      <div class="logoPrincipal"><img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper"></div>
      <div class="in ce tab-active"><img class="logo" src="../Public/img/Confirmacion.png" alt=""><p class="vi">Confirmaciones</p></div>
      <div class="in"><img class="logo" src="../Public/img/equipos.png" alt=""><p class="vi">Productos</p></div>
     
        <div class="profile-information">
            <figure class="figure-profile">
                <div class="image-profile">
                </div>
                <figcaption>
                   <?php 
                        echo $_SESSION['user']["userNombre"]." ".$_SESSION['user']['userApellido'];
                        echo "<br/>";
                        echo "Puesto: ".$_SESSION['user']['userTipo'];
                    ?>
                </figcaption>
            </figure>
        </div>
     
    </div>
    <div id="noti">
      <div class="cont">
        <div class="notification-pane" id="mynotification">
           <figure>
                <img class="notification_image" src="../Public/img/notification_icon.png" alt="notificacion" title="Notificación">
           </figure>
       </div>
       <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content">
           <div class="modal-header">
             <span class="close">&times;</span>
             <h2>Notificaciones</h2>
           </div>
           <div class="modal-body">
             <p>Some text in the Modal Body</p>
             <p>Some other text...</p>
           </div>
         </div>
       </div>
        <div class="exit" onclick="document.location = '../controlador/logout.php';">
          <figure>
               <img class="notification_image" src="../Public/img/exit.png" alt="">
          </figure>
        </div>
      </div>
    </div>
    <div id="body">
      Hola Como estas
    </div>
    <div class="body2">
    </div>
  </body>
  <script src="../Public/js/modal.js"></script> 
</html>
