<?php
    require_once('conexion.php');

if(isset($_POST['function'])){
    
    switch($_POST['function']){
            
        case "get_count_pager":
            
            get_count_pager($_POST['nreg']);
            break;
    }
}

    function set_pager($row, $nreg){
            $pager = "";
            $pager.="<div class='pager' id='pager'>";
                $pager.="<ul>";
                    $pager.="<li class='change_page'>«</li>";

                    $count = ceil(($row)/$nreg);
                        for($i = 0; $i<$count; $i++){

                            if($i == 0){
                                $pager.="<li class='page page-active' id='page-active'><a>".($i+1)."</a></li>";
                            }else{
                                $pager.="<li class='page'><a>".($i+1)."</a></li>";
                            }    
                        }

                    $pager.="<li class='change_page'>»</li>";
                $pager.="</ul>";
              $pager.="</div>";
            
            return $pager;
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
