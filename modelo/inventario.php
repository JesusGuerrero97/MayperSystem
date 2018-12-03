<?php
  require_once('conexion.php');
  function get_productosAlm()
  {
      $con = conectar();
      $query='select sucursales.`Nombre_sucursal`,productos.Serie,productos.`Modelo`,productos.`Clave`,categorias.`Nombre_categorias`, status.`Nombre_status` FROM productos INNER JOIN categorias ON productos.`Id_categoria`=categorias.`Id_categoria`INNER JOIN STATUS ON status.`Id_status`= productos.`Id_status` INNER JOIN sucursales ON sucursales.`Id_sucursal` = productos.`Id_sucursal`;';
      if($con)
      {
        $result = $con->query($query);
        return $result;
      }
      else {
        return null;
      }
  }
  function get_categorias()
  {
    $con = conectar();
    if($con)
    {
      $result = $con->query("select * from categorias");
      return $result;
    }
    else {
      return null;
    }
  }

  function get_proveedores()
  {
    $con = conectar();
    if($con)
    {
      $result = $con->query("select * from proveedores");
      return $result;
    }
    else {
      return null;
    }
  }
  function get_estatus()
  {
    $con = conectar();
    if($con)
    {
      $result = $con->query("select * from status");
      return $result;
    }
    else {
      return null;
    }
  }

  function get_sucursales()
  {
    $con = conectar();
    if($con)
    {
      $result = $con->query("select * from sucursales");
      return $result;
    }
    else {
      return null;
    }
  }

 ?>
