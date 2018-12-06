<?php
    require_once('conexion.php');

    if(isset($_POST['function']))
    {
      switch($_POST['function'])
      {

          case "get_count_pager":

              get_count_pager($_POST['nreg']);
              break;
      }
    }


    function set_product($Serie,$Clave,$Marca,$Modelo,$Software,$Accesorios,$Id_categoria,$Id_proveedor,$Id_status,$Id_sucursal)
    {
      $con = conectar();
      $query = "insert into productos(Id_productos,Serie,Clave,Marca,Modelo,Software,Accesorios,Id_categoria,Id_proveedor,Id_status,Id_sucursal) VALUES(NULL,'$Serie','$Clave','$Marca','$Modelo','$Software','$Accesorios',$Id_categoria,$Id_proveedor,$Id_status,$Id_sucursal);";
      if($con)
      {
        if ($con->query($query))
        {
          return 1;
        }
        else
        {
          return 0;
        }
      }
    }
    if(isset($_POST['id']) && $_POST['opc']==2)
    {
      $con = conectar();
      if($con)
      {
        if($con->query('delete from productos WHERE Id_productos='.$_POST["id"].';'))
        {
          echo "se elimino";
        }
      }
    }
    else if(isset($_POST['id']) && $_POST['opc']==1)
    {
      $con = conectar();
      if($con)
      {
        if($con->query(''))
        {
          return true;
        }
        else{
          return false;
        }
      }
    }
    else if(isset($_POST['id']) && $_POST['opc']==3)
    {
      $con = conectar();
      if($con)
      {
        $result = $con->query('select * from productos where Id_productos="'.$_POST['id'].'";');
        if($result)
        {
           $json=json_encode($result->fetch_assoc());
           echo $json;
        }
      }
    }

?>
