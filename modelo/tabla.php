<?php

include('conexion.php');


    if(isset($_POST['function']) && isset($_POST['busqueda']) && isset($_POST['nregistros']) && isset($_POST['npages']) && isset($_POST['tipo']) && isset($_POST['status'])){
        
        if($_POST['busqueda'] ==""){
            $busqueda = "null";
        }else{
            $busqueda = $_POST['busqueda'];
        }
        
        switch($_POST['function']){
                
            case "cargar_solicitudes":
                
                cargar_solicitudes($busqueda, $_POST['nregistros'], $_POST['npages'], $_POST['tipo'], $_POST['status']);
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
                AND s.Status='$status'
                LIMIT $nreg OFFSET $npages";
          }
          else{
              
            $val=$con->real_escape_string($busqueda);
            $consulta="SELECT s.Id_solictud,s.Fecha_registro,c.Nombre_cliente,c.Apellidos_cliente,e.Nombre AS Nombre_empleado,e.Apellidos AS Apellidos_empleado,s.Status,s.Tipo,s.Observacion FROM solicitudes AS s
            INNER JOIN clientes AS c ON s.Id_cliente = c.Id_cliente 
            INNER JOIN vendedores AS v ON s.Id_vendedor = v.Id_vendedor 
            INNER JOIN empleados AS e ON v.Id_empleado = e.Id_empleado 
            WHERE s.Tipo='$tipo'
            AND s.Status='$status'
           AND  CONCAT(s.Fecha_registro, ' ', CONCAT(c.Nombre_cliente, ' ', c.Apellidos_cliente), ' ', CONCAT(e.Nombre, ' ', e.Apellidos), ' ',s.Status, ' ', s.Tipo) LIKE '%$busqueda%'
           LIMIT $nreg OFFSET $npages";
              
          }
          $buscarDemos=$con->query($consulta);
            
//            echo "<p>$consulta</p>";
        
          if($buscarDemos->num_rows > 0)
          {
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
            require_once('productos.php');
            echo $tabla.= set_pager($buscarDemos->num_rows, $nreg);
        }
        
        
        
    


?>

