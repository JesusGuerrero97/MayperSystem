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
    <link rel="stylesheet" href="../public/css/p_administrativo.css">
    
    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>
    
  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal"><img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper"></div>
      
        <div class="tab tab-active in ce" id="venas">
          <img class="logo" src="../Public/img/aprovaciones.png" alt="">
          <p class="vi">Aprobaciones</p>
        </div>
        
        <div class="tab in">
          <img class="logo" src="../Public/img/equipos.png" alt="">
          <p class="vi">Productos</p>
        </div>
       
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
        <!--<div class="ot">
          Notificaciones
        </div>-->
      </div>
    </div>
        <div class="container">
        
<!--           CONTENEDOR 1-->
           
            <div class="content content-active">
                <section class="container-top">
                    <p>Solicitudes pendientes</p>
                </section>
                <section class="container-title">
                    <p>Aprobacion de solicitudes</p>
                </section>
                <section class="container-filters">
                    <div class="cf-left">
                        <p>Mostrar 
                            <select name="">
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                             registros
                        </p>
                    </div>
                    <div class="cf-center">
                        <p>Filtar por 
                            <select>
                                <option value="1">Venta</option>
                                <option value="2">Demo</option>
                            </select>
                            
                            <select>
                                <option value="1">En espera</option>
                                <option value="2">Aceptado</option>
                                <option value="3">Rechazado</option>
                            </select>
                        </p>
                    </div>
                    <div class="cf-right">
                        <p>Buscar
                            <input type="text" name="Buscar" id="buscarVenta" placeholder="(ej.Fecha,Clientes,Empleados,Estatus)">
                            <img class="find" src="../public/img/find.png" alt="">
                        </p>
                    </div>
                </section>
                
                <section id="tablaVentas" class="container-table">
               
                    
                </section>
            </div>
            
<!--            CONTENEDOR 2-->
            
            <div class="content">
            hola div 2
            </div>
        </div>
  </body>
    <script src="../Public/js/modal.js"></script>
    <script src="../Public/js/p_tabs_menus.js"></script>
    <script type="text/javascript" src="../public/js/jquery.js"></script>
    <script src="../public/js/busquedas.js"></script>
    
    <script type="text/javascript">
        
      window.onload = obtener_ventas(null,2)
        
    </script>
</html>
