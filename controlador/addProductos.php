<?php
require_once('../modelo/productos.php');
echo "entro al modelo";
if(isset($_POST))
{
  echo "<br> entro con el POST";
  if(isset($_POST['opcion']))
  {
    echo "<br> entro donde si existe POST OPCION";
      if($_POST['opcion']=="Aceptar")
      {
        echo "<br> entro donde si existe POST OPCION > AGREGAR";
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
      } /*AQUI TERMINA EL AGREGAR PRODUCTO*/

      else if($_POST['opcion']=="Editar")
      {
        echo "<br> entro donde si existe POST OPCION > MODIFICAR";
        $Id_productos = $_POST['Id_productos'];
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

        if(update_producto($Id_productos,$Serie,$Clave,$Marca,$Modelo,$Software,$Accesorio,$Id_categoria,$Id_proveedor,$Id_status,$Id_sucursal))
        {
            header('Location: ../vista/inventario.php');
        }
        else {
          echo "No, se modificó";
        }
      }
  }
}


?>
