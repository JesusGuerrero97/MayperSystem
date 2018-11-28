<?php


    function get_user_session($con, $correo, $pass){
        
        $query = "SELECT e.Id_empleado, e.Nombre, e.Apellidos, e.Correo, e.Puesto as tipo, s.Nombre_sucursal, e.Foto FROM empleados AS e
        INNER JOIN usuarios ON usuarios.Id_empleado = e.Id_empleado
        INNER JOIN sucursales as s ON s.Id_sucursal = e.Id_sucursal
        WHERE e.Correo='$correo'
        AND  usuarios.Id_empleado = (SELECT Id_usuario FROM usuarios WHERE password = md5('$pass'))";
        
        
        $res = mysqli_query($con, $query);
        
        return $res;
    }
        



?>