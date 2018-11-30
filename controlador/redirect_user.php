<?php

if(isset($_GET['target'])){

    $target = $_GET['target'];
    $location = "";
        
    switch($target){
        case "Administrador":
            $location = '../vista/main.php';
            break;

        case "Inventario":
            $location = '../vista/inventario.php';
            break;

        case "Asesor médico":
//            $location = 'Location: ../paginas/vendedores.html';
            $location = '../vista/vendedores.php';
            break;

        case "Administrativo":
            $location = '../vista/administrativos.php';
            break;

        case "Aplicacionista":
            $location = '../vista/aplicacionistas.php';
            break;
            
        }
        
    /* REDIRECCIONAR A SU VISTA CORRESPODIENTE */
        
    echo "<script type='text/javascript'>location.href ='$location';</script>";

}else{
    /* REDIRECCIONAR AL LOGIN */ 
    echo "<script type='text/javascript'>location.href ='../login.php';</script>";
}

?>