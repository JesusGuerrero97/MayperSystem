<?php

include('conexion.php');


    if(isset($_POST['function']) && isset($_POST['busqueda']) && isset($_POST['nregistros'])){
        
    
        if($_POST['busqueda'] ==""){
            $busqueda = "null";
        }else{
            $busqueda = $_POST['busqueda'];
        }
        
        switch($_POST['function']){
                
            case "cargar_solicitudes":
                
                cargar_solicitudes($busqueda, $_POST['nregistros'], $_POST['npages'], $_POST['tipo'], $_POST['status']);
                break;
                
            case "get_productosAlm":
                
                
                if(!($_POST['prod'][0] == 'null')){
                    $products = $_POST['prod'];
                }else{
                    $products = 'null';
                }
                
                
                get_productosAlm($busqueda, $_POST['suc'], $_POST['categoria'], $_POST['nregistros'], $_POST['npages'], $products);
                break;
        }
    }else{
        echo "No se encontraron coincidencias con sus criterios de búsqueda.";
    }
        
        
        
        
        function cargar_solicitudes($busqueda, $nreg, $npages, $tipo, $status ){
            $tabla = "";
            $con = conectar();
            if($busqueda=="null"){
                $consulta="SELECT s.Id_solictud,s.Fecha_registro,c.Nombre_cliente,c.Apellidos_cliente,e.Nombre AS Nombre_empleado,e.Apellidos AS Apellidos_empleado,s.Status,s.Tipo,s.Observacion FROM solicitudes as s
                INNER JOIN clientes AS c ON s.Id_cliente= c.Id_cliente 
                INNER JOIN vendedores AS v ON s.Id_vendedor=v.Id_vendedor 
                INNER JOIN empleados AS e ON v.Id_empleado = e.Id_empleado
                WHERE s.Tipo = '$tipo'
                AND s.Status='$status'";
          }
          else{
              
            $val=$con->real_escape_string($busqueda);
            $consulta="SELECT s.Id_solictud,s.Fecha_registro,c.Nombre_cliente,c.Apellidos_cliente,e.Nombre AS Nombre_empleado,e.Apellidos AS Apellidos_empleado,s.Status,s.Tipo,s.Observacion FROM solicitudes AS s
            INNER JOIN clientes AS c ON s.Id_cliente = c.Id_cliente 
            INNER JOIN vendedores AS v ON s.Id_vendedor = v.Id_vendedor 
            INNER JOIN empleados AS e ON v.Id_empleado = e.Id_empleado 
            WHERE s.Tipo='$tipo'
            AND s.Status='$status'
           AND  CONCAT(s.Fecha_registro, ' ', CONCAT(c.Nombre_cliente, ' ', c.Apellidos_cliente), ' ', CONCAT(e.Nombre, ' ', e.Apellidos), ' ',s.Status, ' ', s.Tipo) LIKE '%$busqueda%'";
              
          }
            
          $buscarDemos=$con->query($consulta);
            
            $rows = $buscarDemos->num_rows;
        
            $buscarDemos = $con->query($consulta.="LIMIT $nreg OFFSET $npages");
            
//            echo "<p>$consulta</p>";
            
          if($buscarDemos->num_rows > 0)
          {
            $tabla.="</section>";
             $tabla.=
             '<table class="regis_produc">
                <tr>
                  <th>Fecha de Solicitud</th>
                  <th>Nombre Cliente</th>
                  <th>Nombre Empleado</th>
                  <th>Status</th>
                  <th>Tipo</th>
                  <th>Observacion</th>
                  <th colspan="3">Opciones</th>
                </tr>';
                while ($filaDemos = $buscarDemos->fetch_assoc())
                {
                    $tabla.=
                    '<tr>
                        <td>'.$filaDemos['Fecha_registro'].'</td>
                        <td>'.utf8_encode($filaDemos['Nombre_cliente']." ".$filaDemos['Apellidos_cliente']).'</td>
                        <td>'.utf8_encode($filaDemos['Nombre_empleado']." ".$filaDemos['Apellidos_empleado']).'</td>
                        <td>'.$filaDemos['Status'].'</td>
                        <td>'.$filaDemos['Tipo'].'</td>
                        <td>'.utf8_encode($filaDemos['Observacion']).'</td>
                        <td> <a href="#">Aceptar</a></td>
                        <td> <a href="#">Rechazar</a></td>
                        <td> <a href="#">Ver más...</a></td>
                    </tr>';
                }
                $tabla.='</table>';
              
              
          }
          else
          {
            $tabla.="No se encontraron coincidencias con sus criterios de búsqueda.";
          }
            require_once('../controlador/config.php');
            echo $tabla.= set_pager($rows, $nreg, $npages);
        }

        function get_productosAlm($busqueda, $sucursal, $cat, $nreg, $npages, $products)
        {
            
            $table = "";
            if($busqueda == 'null')
                $busqueda = "";
            
          $con = conectar();
          $query="select sucursales.Nombre_sucursal,productos.Serie,productos.Id_productos, productos.Modelo,productos.Clave,categorias.Nombre_categorias, status.Nombre_status FROM productos 
          INNER JOIN categorias ON productos.Id_categoria=categorias.Id_categoria
          INNER JOIN STATUS ON status.Id_status= productos.Id_status 
          INNER JOIN sucursales ON sucursales.Id_sucursal = productos.Id_sucursal 
          WHERE sucursales.Nombre_sucursal ='".utf8_decode($sucursal)."'
          AND categorias.Nombre_categorias = '".utf8_decode($cat)."'
          AND CONCAT(productos.Serie, ' ', productos.Modelo, ' ', productos.Clave) LIKE '%$busqueda%' ";
        
          
            
            
            $result = $con->query($query);
            
            $rows = $result->num_rows;
            
            $result = $con->query($query.="LIMIT $nreg OFFSET $npages");
            
            
            
//            echo $query;
            if($result){
                
                if($rows >0){
                    
                    $table.="<div class='table_products' id='table_products'>";

                           $table.="<table id='table'>";
                               $table.="<tr>";
                                   $table.="<th>Sucursal</th>";
                                   $table.="<th>Producto</th>";
                                   $table.="<th>Clave</th>";
                                   $table.="<th>Serie</th>";
                                   $table.="<th>Acciones</th>";
                               $table.="</tr>";

//                                echo "<p>$rows</p>";
//                                echo $query;


                                while($row = mysqli_fetch_array($result)){
                                    
                                    $table.="<tr class='row_container'>";
                                        $table.="<td class='row_product'>".utf8_encode($row['Nombre_sucursal'])."</td>";
                                        $table.="<td class='row_product'>".utf8_encode($row['Modelo'])."</td>";
                                        $table.="<td class='row_product'>".utf8_encode($row['Clave'])."</td>";
                                        $table.="<td class='row_product'>".utf8_encode($row['Serie'])."</td>";
                                    
                                        
                                    
                                  
                                        if(!($products=='null')){
                                            $is_Printed = false;
                                            

                                            for($i = 0; $i<sizeof($products); $i++){
                                                
                                                if($products[$i] == $row['Id_productos']){
                                                     
                                                    $table.="<td class='row_product'><button class='btn_table checked'>Agregar</button></td>";   
                                                    
                                                    $is_Printed = true;
                                                    break;
                                                }
                                            }
                                            if(!$is_Printed){
//                                                
                                                $table.="<td class='row_product'><button class='btn_table'>Agregar</button></td>";
                                            }
                                        }else{
                                    
                                            $table.="<td class='row_product'><button class='btn_table'>Agregar</button></td>";
                                        }
                                    
                                    $table.="<input type='hidden' value='".$row['Id_productos']."'>";
                                    
                                    $table.="</tr>";
                                }


                            $table.="</table>";
                        $table.="</div>";
                }else{
                    $table.="No se encontraron coincidencias con sus criterios de búsqueda.";
                }
                
            }else{
                echo "Error en la consulta";
            }
            
            mysqli_free_result($result);
            require_once('../controlador/config.php');
            echo $table.= set_pager($rows, $nreg, $npages);
            

        }
        
        
        
    


?>

