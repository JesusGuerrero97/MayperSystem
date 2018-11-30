<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>
    <link rel="stylesheet" href="../public/css/inventario.css">
  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal"><img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper"></div>
      <div class="tab tab-active in inprincipal"id="equipos"><img class="logo" src="../Public/img/equipos.png" alt=""><p class="vi">Equipos</p></div>
      <div class="tab in" id="ventas"><img class="logo" src="../Public/img/ventas.png" alt=""><p class="vi">Ventas</p></div>
      <div class="tab in" id="demos"><img class="logo" src="../Public/img/Demo.png" alt=""><p class="vi">Demos</p></div>
      <div class="tab in"><img class="logo" src="../Public/img/Reportes.png" alt=""><p class="vi">Reportes</p></div>
      <div class="tab in"><img class="logo" src="../Public/img/config.png" alt=""><p class="vi">Configuración</p></div>
      <div class="tab in"><img class="logo" src="../Public/img/respaldo.png" alt=""><p class="vi">Respaldo</p></div>

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
               <img class="notification_image" src="../Public/img/exit.png" alt="Cerrar sesión" title="Cerrar Sesion">
          </figure>
      </div>
    </div>
      <div class="container">
          <div class="content content-active">
            <div class="inv">
              <p class="t">Inventario Principal <span class="t2">Mayper Medical</span></p>
            </div>
            <div class="db">
              <p class="tp">Configuración de Productos</p>
              <a href=""> <input type="button" class="add" name="" value="+ Productos"> </a>
              <div class="find">
                <b>Mostrar</b>
                 <select>
                   <option value="10">10</option>
                   <option value="15">15</option>
                 </select>
                 <b>registros</b>
                 <div class="right">
                   <b>Buscar: </b>
                   <input type="text" name="busqueda" id="busqueda"  placeholder="(ej. Producto,Categoria,Estatus)">
                   <img class="find" src="../public/img/find.png" alt="">
                 </div>

              </div>
              <section id="tabla">

              </section>
              <div class="pager">
                   <ul>
                       <li class="change_page">Ant</li>
                       <li class="page-active"><a href="">1</a></li>
                       <li><a href="">2</a></li>
                       <li><a href="">3</a></li>
                       <li class="change_page">Sig</li>
                   </ul>
              </div>
            </div>
          </div>
          <div class="content">
            <!--
            APARTIR DE AQUI PERTENECE AL OTRO CONTENIDO
            -->
            <div class="inv">
              <p class="t">Solicitudes Ventas <span class="t2">Mayper Medical</span></p>
            </div>
            <div class="db">
              <p class="tp">Aprobacion de solicitudes</p>
              <div class="find">
                <b>Mostrar</b>
                 <select>
                   <option value="10">10</option>
                   <option value="15">15</option>
                 </select>
                 <b>registros</b>
                 <div class="right">
                   <b>Buscar: </b>
                   <input type="text" name="Buscar" id="buscarVenta" placeholder="(ej.Fecha,Clientes,Empleados,Estatus)">
                   <img class="find" src="../public/img/find.png" alt="">
                 </div>

              </div>
              <section id="tablaVentas">

              </section>
              <div class="pager">
                   <ul>
                       <li class="change_page">Ant</li>
                       <li class="page-active"><a href="">1</a></li>
                       <li><a href="">2</a></li>
                       <li><a href="">3</a></li>
                       <li class="change_page">Sig</li>
                   </ul>
              </div>
            </div>
          </div>
          <div class="content">
            <!--
            APARTIR DE AQUI PERTENECE AL OTRO CONTENIDO
            -->
            <div class="inv">
              <p class="t">Solicitudes Demos <span class="t2">Mayper Medical</span></p>
            </div>
            <div class="db">
              <p class="tp">Aprobacion de demostraciones</p>
              <div class="find">
                <b>Mostrar</b>
                 <select>
                   <option value="10">10</option>
                   <option value="15">15</option>
                 </select>
                 <b>registros</b>
                 <div class="right">
                   <b>Buscar: </b>
                   <input type="text" name="Buscar" id="buscarDemos" placeholder="Solicitud">
                   <img class="find" src="../public/img/find.png" alt="">
                 </div>
              </div>
              <section id="tablaDemos">

              </section>
              <div class="pager">
                   <ul>
                       <li class="change_page">Ant</li>
                       <li class="page-active"><a href="">1</a></li>
                       <li><a href="">2</a></li>
                       <li><a href="">3</a></li>
                       <li class="change_page">Sig</li>
                   </ul>
              </div>
            </div>
          </div>
          <div class="content">
              Hola es el body 4
          </div>
          <div class="content">
                Hola es el body 5
          </div>
          <div class="content">
              Hola es el body 6
          </div>
      </div>
  </body>
  <script src="../public/js/modal.js"></script>
  <script src="../public/js/p_tabs_menus.js"></script>
  <script type="text/javascript" src="../public/js/jquery.js"></script>
  <script src="../public/js/busquedas.js"></script>
</html>
