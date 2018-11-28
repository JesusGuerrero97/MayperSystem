<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrativo </title>
    <link rel="stylesheet" href="../public  /css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal"><img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper"></div>
      <div class="in ce"><img class="logo" src="../Public/img/aprovaciones.png" alt=""><p class="vi">Aprobaciones</p></div>
      <div class="in"><img class="logo" src="../Public/img/equipos.png" alt=""><p class="vi">Productos</p></div>
      <div class="information">
        <img  class="perfil" src="<?php echo $_SESSION['user']['userFoto']; ?>" alt="usuario">
        <p class="r"><?php echo $_SESSION['user']['userNombre']." ".$_SESSION['user']['userApellido']; ?> <br>Puesto: <?php echo $_SESSION['user']['userTipo']; ?></p>
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
        <!--<div class="ot">
          Notificaciones
        </div>-->
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
