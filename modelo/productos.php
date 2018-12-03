<?php
    require_once('conexion.php');

    function get_count_pager(){
        $con = conectar();

        $query="SELECT CEILING(COUNT(*)/10) FROM productos";

        $res = mysqli_query($con, $query);

        if (mysqli_num_rows($res)>0) {
            $row = mysqli_fetch_row($res);
            $count = $row[0];

        }

        mysqli_free_result($res);
        mysqli_close($con);
        return $count;
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

?>
