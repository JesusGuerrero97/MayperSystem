<?php
  require_once('conexion.php');
  function get_productos()
  {
      $con = conectar();
      $query='select productos.Serie,productos.`Modelo`,productos.`Clave`,categorias.`Nombre_categorias`, status.`Nombre_status` FROM productos INNER JOIN categorias ON productos.`Id_categoria`=categorias.`Id_categoria`INNER JOIN status ON status.`Id_status`= productos.`Id_status`;';
      if($con)
      {
        $result = $con->query($query);
        return $result;
      }
      else {
        return null;
      }
  }
  function get_solicitudesVentas()
  {
    $con = conectar();
    $query='select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo="Venta";';
    if($con)
    {
        $result = $con->query($query);
        return $result;
    }
    else
    {
      return null;
    }
  }
  function get_solicitudesDemos()
  {
    $con = conectar();
    $query='select solicitudes.Id_solictud,solicitudes.Fecha_registro,clientes.Nombre_cliente,clientes.Apellidos_cliente,empleados.Nombre AS Nombre_empleado,empleados.Apellidos AS Apellidos_empleado,solicitudes.Status,solicitudes.Tipo,solicitudes.Observacion FROM solicitudes INNER JOIN clientes ON solicitudes.Id_cliente= clientes.Id_cliente INNER JOIN vendedores ON solicitudes.Id_vendedor=vendedores.Id_vendedor INNER JOIN empleados ON vendedores.Id_empleado = empleados.Id_empleado WHERE solicitudes.Tipo="Demo";';
    if($con)
    {
        $result = $con->query($query);
        return $result;
    }
    else
    {
      return null;
    }
  }

 ?>
