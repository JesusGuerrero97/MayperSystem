<?php
    session_start();
    require_once('../modelo/inventario.php');
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


        <div class="tab in ce tab-active">
            <img class="logo" src="../Public/img/solicitudes.png" alt="">
            <p class="vi">crear solicitud</p>
        </div>
        <div class="tab in">
            <img class="logo" src="../Public/img/cheked.png" alt="">
            <p class="vi">solicitudes</p>
        </div>

      <div class="profile-information">
            <figure class="figure-profile">
                <div class="image-profile">
                </div>
                <figcaption>
                   <?php
                        echo $_SESSION['user']["userNombre"]." ".$_SESSION['user']['userApellido'];
                        echo "<br/>";
                        echo $_SESSION['user']['userTipo'];
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
<!--       primer contenedor-->
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
                               
                               <?php
                                    require_once('../modelo/clientes.php');
                                    $res = get_clients();
                               
                                    if($res){
                                        while($row = mysqli_fetch_array($res)){
                                            
                                            echo "<option value='1'>".utf8_encode($row['Nombre_cliente'])." ".utf8_encode($row['Apellidos_cliente'])."
                                            </option>";
                                        }
                                    }
                               ?>
                               
                           </select>
                        </div>
                        <div class="input_new">
                            <button>Agregar</button>
                        </div>
                    </div>
                    <div class="input_type">
                       <div class="input_icon">
                           <img src="../public/img/compare.png">
                        </div>
                        <div class="input_select">
                            <select name="">
                                <option value="0">Ventas</option>
                                <option value="1">Demos</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="first_pane" id="first_pane">
                       
<!--
                        <div class="input first_pane_input">
                            <div class="key_product"><p>AFT30</p></div>
                            <div class="name_product"><p>Affiniti 30</p></div>
                            <div class="delete_product"><button>X</button></div>
                        </div>
-->
                    </div>
                    
                    <div class="second_pane">
                        <p>Observación:</p>
                        <textarea name="comment" ></textarea>
                    </div>
                    
                    <div class="pane_submit">
                        <button>Enviar solicitud</button>
                    </div>
                </section>
                
                <section class="content_p">
                 
                    <div class="content_p_top">
                        <p>Almacen*</p>
                        <p>Categoria*</p>
                        <select name="almacen" class="select">
                            <option value="1">Sucursales ...</option>
                            <?php
                            
                                $res = get_sucursales();
                            
                                if($res){
                                    while($row = mysqli_fetch_array($res)){
                                        
                                        echo "<option value='1'>".utf8_encode($row['Nombre_sucursal'])."</option>";
                                        
                                    }
                                }
                            
                            ?>
                        </select>

                        <select name="categoria" class="select">
                            <option value="1">Categorias ...</option>
                               <?php

                                    $res = get_categorias();

                                    if($res){
                                        while($row = mysqli_fetch_array($res)){

                                            echo "<option value='1'>".utf8_encode($row['Nombre_categorias'])."</option>";

                                        }
                                    }

                                ?>
                        </select>
                    </div>
                    
                    <div class="content_p_filters">
                        <div class="content_p_filters_left">
                            <p>
                                <b>Mostrar</b>
                                <select name="" id="">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                                <b>registros</b>
                            </p>
                        </div>
                        <div class="content_p_filters_right">
                            <p>
                                <b>Buscar: </b>
                                <input type="text" name="input_search">
                            </p>
                            
                        </div>
                    </div>
                    
                    <div class="table_products" id="table_products">
                       
                       <table id="table">
                           <tr>
                               <th>Sucursal</th>
                               <th>Producto</th>
                               <th>Clave</th>
                               <th>Serie</th>
                               <th>Acciones</th>
                           </tr>
                        <?php
                            $res = get_productosAlm();
                        
                            if($res){
                                while($row = mysqli_fetch_array($res)){
                                    echo "<tr class='row_container'>";
                                        echo "<td class='row_product'>".utf8_encode($row['Nombre_sucursal'])."</td>";
                                        echo "<td class='row_product'>".utf8_encode($row['Modelo'])."</td>";
                                        echo "<td class='row_product'>".utf8_encode($row['Clave'])."</td>";
                                        echo "<td class='row_product'>".utf8_encode($row['Serie'])."</td>";
                                        echo "<td class='row_product'><button class='btn_table'>Agregar</button></td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </table>
                    </div>
                    
                  <div class="pager">
                       <ul>
                           <li class="change_page ">«</li>
                           <?php
                                require_once('../modelo/productos.php');
                                $count = get_count_pager();
                           
                                for($i = 0; $i<$count; $i++){
                                    echo "<li class='page-active'><a href=''>".($i+1)."</a></li>";
                                }
                           
                           ?>
                           <li class="change_page">»</li>
                       </ul>   
                  </div>
                </section>
            </div>
        </div>
<!--        Segundo contenedor-->
        <div class="content" id="content">
            <div class="main_content">
                <section class="content_top">
                    <h3>Ver lista de solicitudes</h3>
                </section> 
                <section class="content_top_filter">
<!--                   seccion de filtros -->
                    <div class="content_p_filters">
                        <div class="content_p_filters_left">
                            <p>
                                <b>Mostrar</b>
                                <select name="" id="">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                                <b>registros</b>
                            </p>
                        </div>
                        <div class="content_p_filters_right">
                           <p class="pp">
                               <b>Status</b>
                               <select name="" id="">
                                    <option value=""> </option>
                                    <option value="">En espera</option>
                                    <option value="">Aceptada</option>
                                    <option value="">Rechazada</option>
                               </select>
                           </p>
                            <p>
                                <b>Buscar: </b>
                                <input type="text" name="input_search">
                            </p>
                            
                        </div>
                    </div>
                    <div class="content_table_sol" id="content_table_sol">
                           
                            <div class="table_products">

                                <?php
                                    require_once('../modelo/solicitudes.php');
                                    $res = get_solicitudes($_SESSION['user']['userId']);

                                    if($res){
                                        if(mysqli_num_rows($res) >1){
                                            
                                            echo "<table id='table'>";
                                                echo "<tr>";
                                                    echo "<th>Numero de solicitud</th>";
                                                    echo "<th>Fecha de solicitud</th>";
                                                    echo "<th>Nombre cliente</th>";
                                                    echo "<th>Status</th>";
                                                    echo "<th>Tipo</th>";
                                                echo "</tr>";
                                            
                                            while($row = mysqli_fetch_array($res)){
                                                echo "<tr>";
                                                    echo "<td>".utf8_encode($row['Id_solictud'])."</td>";
                                                    echo "<td>".utf8_encode($row['Fecha_registro'])."</td>";
                                                    echo "<td>".utf8_encode($row['nombre_cliente'])."</td>";
                                                    echo "<td>".utf8_encode($row['Status'])."</td>";
                                                    echo "<td>".utf8_encode($row['Tipo'])."</td>";

                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        }else{
                                        echo "<tr><td><div style='margin-top: 1%;'><p>No hay registros</p></div></td></tr>";
                                    }
                                    }
                                ?>
                                
                            </div>

                          <div class="pager">
                               <ul>
                                   <li class="change_page ">«</li>
                                   <li class="page-active"><a href="">1</a></li>
                                   <li><a href="">2</a></li>
                                   <li><a href="">3</a></li>
                                   <li class="change_page">»</li>
                               </ul>   
                          </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
  </body>
  <script src="../public/js/modal.js"></script>
  <script src="../public/js/p_tabs_menus.js"></script>
  <script src="../public/js/add_products.js"></script>

</html>
