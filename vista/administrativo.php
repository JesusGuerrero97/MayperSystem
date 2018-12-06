<?php
    session_start();
    require_once('../modelo/inventario.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrativo </title>
    <link rel="stylesheet" href="../public  /css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    <link rel="stylesheet" href="../public/css/p_administrativo.css">
<!--    <link rel="stylesheet" href="../public/css/inventario.css">-->
    
    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>
    
  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal"><img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper"></div>
      
        <div class="tab tab-active in ce" id="tab_ventas">
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
<!--
    <div id="noti">
      <div class="cont">
        <div class="notification-pane" id="mynotification">
           <figure>
                <img class="notification_image" src="../Public/img/notification_icon.png" alt="notificacion" title="Notificación">
           </figure>
       </div>
       <div id="myModal" class="modal">
          Modal content 
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
-->
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
                            <select id="select_registros">
                               <option value="10">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                             registros
                        </p>
                    </div>
                    <div class="cf-center">
                        <p>Filtar por 
                            <select id="select_tipo">
                                <option value="1">Venta</option>
                                <option value="2">Demo</option>
                            </select>
                            
                            <select id="select_status">
                                <option value="1">En espera</option>
                                <option value="2">Aceptado</option>
                                <option value="3">Rechazado</option>
                            </select>
                        </p>
                    </div>
                    <div class="cf-right">
                        <p>Buscar
                            <input type="text" name="Buscar" id="buscar" placeholder="(ej.Fecha,Clientes,Empleados,Estatus)">
                            <img class="find" src="../public/img/find.png" alt="">
                        </p>
                    </div>
                </section>
                
                <section id="tabla">
                </section>
                
            </div>
            
<!--            CONTENEDOR 2-->
            
            <div class="content">
                
            </div>
        </div>
  </body>
<!--    <script src="../Public/js/modal.js"></script>-->
    <script src="../Public/js/p_tabs_menus.js"></script>
    <script src="../public/js/funciones_tablas.js"></script>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/busquedas.js"></script>
    <script src="../public/js/pager.js"></script>
    
    <script type="text/javascript">
        
        
        var s_t = document.getElementById('select_tipo');
        var s_s = document.getElementById('select_status');
        var s_r = document.getElementById('select_registros');
        var btn_search = document.getElementById('buscar');
        
        let tipo = "";
        let status = "";
        let nre = s_r.options[s_r.selectedIndex].text;
        let npage =0;//= (page.firstChild.text)-1;
        window.onload = function(){
            
            tipo = s_t.options[s_t.selectedIndex].text;
            status = s_s.options[s_s.selectedIndex].text;

            get_solicitudes(null, nre, npage, tipo, status);

        }
        
        s_t.addEventListener('change', (e)=>{
            tipo = s_t.options[s_t.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_s.addEventListener('change', (e)=>{
            status = s_s.options[s_s.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_s.addEventListener('change', (e)=>{
            status = s_s.options[s_s.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_r.addEventListener('change', (e)=>{
            nre = s_r.options[s_r.selectedIndex].text;
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        btn_search.addEventListener('keyup', (e)=>{
            var busqueda = btn_search.value;
            npage = 0;
                
            get_solicitudes(busqueda, nre, npage, tipo, status);
        
            
        });
        
    </script>
</html>