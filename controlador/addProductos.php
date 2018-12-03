<?php
require_once('../modelo/productos.php');

if(isset($_POST))
{
  $Serie = $_POST['Serie'];
  $Clave = $_POST['Clave'];
  $Marca = $_POST['Marca'];
  $Modelo = $_POST['Modelo'];
  $Software = $_POST['Software'];
  $Accesorio= $_POST['Accesorios'];
  $Id_categoria = $_POST['Id_categoria'];
  $Id_proveedor = $_POST['Id_proveedor'];
  $Id_status = $_POST['Id_status'];
  $Id_sucursal = $_POST['Id_sucursal'];

  if(set_product($Serie,$Clave,$Marca,$Modelo,$Software,$Accesorio,$Id_categoria,$Id_proveedor,$Id_status,$Id_sucursal))
  {
      header('Location: ../vista/inventario.php');
  }
  else {
    echo "No, se registro";
  }
}

?>
