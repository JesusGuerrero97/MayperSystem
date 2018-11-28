<?php
session_start();

if(isset($_POST['nombre']) && isset($_POST['apellidop']) && isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['especialidad']) && isset($_POST['correo'])){

    require_once('../modelo/conexion_APP.php');
    require('../modelo/clientes.php');
    $con = conectar();

    $nombre = utf8_decode($_POST['nombre']);
    $apellidop = utf8_decode($_POST['apellidop']);
    $usuario = utf8_decode($_POST['usuario']);
    $especialidad = utf8_decode($_POST['especialidad']);
    $correo = utf8_decode($_POST['correo']);
    $ciudad = utf8_decode($_POST['ciudad']);
    $estado = utf8_decode($_POST['estado']);
    $contra = $_POST['contra'];

    $nombre = $nombre." ".$apellidop;

    $res = set_client($nombre, $especialidad, $correo, $ciudad, $estado); 

    /* SI SE INSERTÓ EL USUARIO*/
    if($res){
        
        
        $res = set_user($usuario, $contra);
        /*creacion del usuario*/
        if($res){
            
            $res = get_client_session($usuario, $contra);

            if(mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_array($res)) {

                    $client = [
                        "clientId" => $row["Id"],
                        "clientNombre" => $row["Nombre"]
                    ];
                }
                
                /*   GUARDAR DATOS DEL USUARIO EN UNA SESION   */
                $_SESSION['client'] = $client;

                //REDIRIGIR AL USUARIO A SU VISTA

                header('Location: ../vista/cliente.php');


            }
        }else{
            echo "Error al crear el usuario";
        }
            
    }else{
        echo "Error al crear el cliente";
        echo mysqli_error($con);
    }

}

?>