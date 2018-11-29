<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vendedores</title>
    <link rel="stylesheet" href="../public  /css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    <link rel="stylesheet" href="../public/css/p_vendedores.css">

    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>

  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal">
          <img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper">
      </div>


        <div class="tab in ce">
            <img class="logo" src="../Public/img/solicitudes.png" alt="">
            <p class="vi">Solicitudes</p>
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
          </div>
    </div>

    <div class="container">
        <div class="content content-active">
            <div class="main_content">
                <section class="content_top">
                    <h3>Solicitar venta</h3>
                </section>
                
                <section class="content_sv">
                    <div class="input">
                        <div class="input_icon"><img src="../public/img/user_icon.png"></div>
                        <div class="input_name"><p><?php echo $_SESSION['user']['userNombre']." ".$_SESSION['user']['userApellido'];?></p></div>
                    </div>
                    <div class="input">
                        <div class="input_icon"><img src="../public/img/key.png"></div>
                        <div class="input_name">
                           <p>
                            <?php
                                require_once('../controlador/solicitudes.php');
                                echo get_next_key();
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="input">
                        <div class="input_icon"><img src="../public/img/clients.png"></div>
                        <div class="input_set">
                           <select name="clientes">
                               <option value="0">Seleccione un cliente ...</option>
                               <option value="">dsa</option>
                           </select>
                        </div>
                        <div class="input_new">
                            <button>Agregar</button>
                        </div>
                    </div>
                </section>
                
                <section class="content_p">
                  <div class="pager">
                       <ul>
                           <li class="change_page ">«</li>
                           <li class="page-active"><a href="">1</a></li>
                           <li><a href="">2</a></li>
                           <li><a href="">3</a></li>
                           <li class="change_page">»</li>
                       </ul>   
                  </div>
                </section>
            </div>
        </div>
        <div class="content">
            Hola es el body 2
        </div>
    </div>
  </body>
  <script src="../public/js/modal.js"></script>
  <script src="../public/js/p_tabs_menus.js"></script>

</html>
