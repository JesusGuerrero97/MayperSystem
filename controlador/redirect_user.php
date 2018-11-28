<?php

if(isset($_GET['target'])){

    $target = $_GET['target'];
    $location = "";
        
    switch($target){
        case "Administrador":
            $location = '../vista/main.php';
            break;

        case "Inventario":
            $location = '../vista/inventario.html';
            break;

        case "Vendedor":
//            $location = 'Location: ../paginas/vendedores.html';
            $location = '../vista/vendedores.html';
            break;

        case "Administrativo":
            $location = '../vista/administrativos.html';
            break;

        case "Aplicacionista":
            $location = '../vista/aplicacionistas.html';
            break;
            
        }
        
    /* REDIRECCIONAR A SU VISTA CORRESPODIENTE */
        
    echo "<script type='text/javascript'>location.href ='$location';</script>";

}else{
    /* REDIRECCIONAR AL LOGIN */ 
    echo "<script type='text/javascript'>location.href ='../login.php';</script>";
}

?>