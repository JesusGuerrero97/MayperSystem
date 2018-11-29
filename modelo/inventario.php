<?php
  require_once('conexion.php');
  $con = conectar();
  function get_productos()
  {
      $con = conectar();
      $query='SELECT productos.`Modelo`,productos.`Clave`,categorias.`Nombre_categorias`, status.`Nombre_status` FROM productos INNER JOIN categorias ON productos.`Id_categoria`=categorias.`Id_categoria`INNER JOIN status ON status.`Id_status`= productos.`Id_status`;';
      if($con)
      {
        $result = $con->query($query);
        return $result;
      }
      else {
        return null;
      }
  }



 ?>
