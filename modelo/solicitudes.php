<?php
    
function get_last_id(){
    
    require_once('conexion.php');
    $con = conectar();

    $query = "SELECT MAX(Id_solictud)+1 AS 'key' FROM solicitudes";
    
    $res = mysqli_query($con, $query);
    
    mysqli_close($con);
    return $res;
}


function get_solicitudes($Id_vendedor){
    
    require_once('conexion.php');
    $con = conectar();
    
    $query = "SELECT Id_solictud, Fecha_registro, CONCAT(c.Nombre_cliente, ' ',                                   c.Apellidos_cliente) AS 'nombre_cliente', Status, Tipo FROM solicitudes as s
            INNER JOIN clientes AS c ON c.Id_cliente =  s.Id_cliente 
            INNER JOIN vendedores AS v ON v.Id_empleado = $Id_vendedor";
    
    $res = mysqli_query($con, $query);
    
    mysqli_close($con);
    return $res;
}
?>