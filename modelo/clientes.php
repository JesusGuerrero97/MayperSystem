<?php
function get_info_client(){
    require_once('conexion_APP.php');
    $con = conectar();

    $query = "SELECT Id, Nombre FROM clientes WHERE Id = (SELECT MAX(Id) FROM clientes)";
    
    $res = mysqli_query($con, $query);
    
    mysqli_close($con);
    
    return $res;
}

function set_client($nombre, $especialidad, $correo, $ciudad, $estado){
    require_once('conexion_APP.php');
    $con = conectar();
    
    $query = "INSERT INTO clientes VALUES(null, '$nombre', '$especialidad', '$correo', '$ciudad', '$estado')";


    $res = mysqli_query($con, $query);     
    
    mysqli_close($con);
    
    return $res;
}

function set_user($usuario, $contra){
    require_once('conexion_APP.php');
    $con = conectar();
    
    $query = "INSERT INTO usuarios VALUES(null, '$usuario', md5('$contra'), (SELECT MAX(Id) FROM clientes))";
    $res = mysqli_query($con, $query);
    
    mysqli_close($con);
    return $res;
}

function get_client_session($user, $password){
    require_once('conexion_APP.php');
    $con = conectar();
    
    $query = "SELECT c.Id, c.Nombre FROM clientes AS c INNER JOIN usuarios as u ON u.Id_cliente = c.Id 
    WHERE u.usuario = '$user' AND u.contrasena = md5('$password')";
                
    $res = mysqli_query($con, $query);
    mysqli_close($con);
    return $res;
}

function get_clients(){
    
    require_once('conexion.php');
    $con = conectar();
    
    $query = "SELECT Id_cliente, Nombre_cliente, Apellidos_cliente FROM clientes";
    
    $res = mysqli_query($con, $query);
    mysqli_close($con);
    return $res;
}

?>