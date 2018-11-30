<?php
    require_once('conexion.php');
    $con = conectar();
    $tabla="";

    if($_POST['opc']==1)
    {
        if($_POST['productos']==null)
        {
          $consulta='select productos.`Modelo`,productos.`Clave`,categorias.`Nombre_categorias`, status.`Nombre_status` FROM productos INNER JOIN categorias ON productos.`Id_categoria`=categorias.`Id_categoria`INNER JOIN status ON status.`Id_status`= productos.`Id_status`;';
        }
        else if(isset($_POST['productos']))
        {
          $val=$con->real_escape_string($_POST['productos']);
          $consulta="select productos.`Modelo`,productos.`Clave`,categorias.`Nombre_categorias`, status.`Nombre_status` FROM productos INNER JOIN categorias ON productos.`Id_categoria`=categorias.`Id_categoria`INNER JOIN status ON status.`Id_status`= productos.`Id_status` WHERE productos.Modelo LIKE '%".$val."%' OR categorias.Nombre_categorias LIKE '%".$val."%' OR status.Nombre_status LIKE '%".$val."%';";
        }
          $buscarProductos=$con->query($consulta);
          if($buscarProductos->num_rows > 0)
          {
             $tabla.=
             '<table class="regis_produc">
                <tr>
                    <th>Producto</th>
                    <th>Clave</th>
                    <th>Categoria</th>
                    <th>Estatus</th>
                    <th colspan="2">Opciones</th>
                </tr>';
                while ($filaProductos = $buscarProductos->fetch_assoc())
                {
                    $tabla.=
                    '<tr>
                        <td>'.$filaProductos["Modelo"].'</td>
                        <td>'.$filaProductos["Clave"].'</td>
                        <td>'.$filaProductos["Nombre_categorias"].'</td>
                        <td>'.$filaProductos["Nombre_status"].'</td>
                        <td> <a href="#">Editar</a></td>
                        <td> <a href="#">Eliminar</a></td>
                    </tr>';
                }
                $tabla.='</table>';
          }
          else
          {
            $tabla.="No se encontraron coincidencias con sus criterios de búsqueda.";
          }
      }
      else if($_POST['opc']==2)
      {
          if($_POST['ventas']==null)
          {
            $consulta='select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo="Venta";';
          }
          else if (isset($_POST['ventas']))
          {
            $val=$con->real_escape_string($_POST['ventas']);
            $consulta="select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo='Venta' AND (clientes.Nombre_cliente LIKE '%".$val."%' OR clientes.Apellidos_cliente LIKE '%".$val."%' OR empleados.Nombre LIKE '%".$val."%' OR empleados.Apellidos LIKE '%".$val."%' OR solicitudes.Status LIKE '%".$val."%' OR solicitudes.Fecha_registro LIKE '%".$val."%');";
          }
          $buscarVentas=$con->query($consulta);
          if($buscarVentas->num_rows > 0)
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
                while ($filaVentas = $buscarVentas->fetch_assoc())
                {
                    $tabla.=
                    '<tr>
                        <td>'.$filaVentas['Fecha_registro'].'</td>
                        <td>'.utf8_encode($filaVentas['Nombre_cliente']." ".$filaVentas['Apellidos_cliente']).'</td>
                        <td>'.utf8_encode($filaVentas['Nombre_empleado']." ".$filaVentas['Apellidos_empleado']).'</td>
                        <td>'.$filaVentas['Status'].'</td>
                        <td>'.$filaVentas['Tipo'].'</td>
                        <td>'.utf8_encode($filaVentas['Observacion']).'</td>
                        <td> <a href="#">Editar</a></td>
                        <td> <a href="#">Eliminar</a></td>
                        <td> <a href="#">Ver más...</a></td>
                    </tr>';
                }
                $tabla.='</table>';
          }
          else
          {
            $tabla.="No se encontraron coincidencias con sus criterios de búsqueda.";
          }
        }
        else if($_POST['opc']==3)
        {
          if($_POST['demos']==null)
          {
            $consulta='select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo="Demo";';
          }
          else if(isset($_POST['demos']))
          {
            $val=$con->real_escape_string($_POST['demos']);
            $consulta="select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo='Demo' AND (clientes.Nombre_cliente LIKE '%".$val."%' OR clientes.Apellidos_cliente LIKE '%".$val."%' OR empleados.Nombre LIKE '%".$val."%' OR empleados.Apellidos LIKE '%".$val."%' OR solicitudes.Status LIKE '%".$val."%' OR solicitudes.Fecha_registro LIKE '%".$val."%');";
          }
          $buscarDemos=$con->query($consulta);
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
                        <td> <a href="#">Editar</a></td>
                        <td> <a href="#">Eliminar</a></td>
                        <td> <a href="#">Ver más...</a></td>
                    </tr>';
                }
                $tabla.='</table>';
          }
          else
          {
            $tabla.="No se encontraron coincidencias con sus criterios de búsqueda.";
          }
        }
        echo $tabla;
?>
