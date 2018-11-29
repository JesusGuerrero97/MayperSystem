<?php
    
function get_last_id(){
    
    require_once('conexion.php');
    $con = conectar();

    $query = "SELECT MAX(Id_solictud)+1 AS 'key' FROM solicitudes";
    
    $res = mysqli_query($con, $query);
    
    mysqli_close($con);
    return $res;
}
?>