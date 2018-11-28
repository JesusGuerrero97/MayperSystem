<?php
session_start();    

    /**
    *   PHP PARA LA VALIDACION DE INICIO DE SESIÓN
    */


        if(isset($_POST['login'])){
        
            if(isset($_POST['user']) && isset($_POST['password'])){

                require('../modelo/empleados.php');
                require_once('../modelo/conexion.php');
                $con = conectar();

                
                $res = get_user_session($con, $_POST['user'], $_POST['password']);
                
                /* SI SE EJECUTÓ CORRECTAMENTE */
                if($res){
                    if(mysqli_num_rows($res) > 0){
                        while ($row = mysqli_fetch_array($res)) {

                            $user = [
                                "userId" => $row["Id_empleado"],
                                "userNombre" => utf8_encode($row["Nombre"]),
                                "userApellido" => utf8_encode($row["Apellidos"]),
                                "userCorreo" => $row["Correo"],
                                "userTipo" => utf8_encode($row["tipo"]),
                                "userSucursal" => utf8_encode($row["Nombre_sucursal"]),
                                "userFoto" => $row["Foto"]
                            ];
                        }
                        /*   GUARDAR DATOS DEL USUARIO EN UNA SESION   */
                        $_SESSION['user'] = $user;
                        $_SESSION['mensaje'] = "";
                        
                        //REDIRIGIR AL USUARIO A SU VISTA
                        
                        $loc = "?target=".$_SESSION['user']['userTipo'];
                        header("Location: redirect_user.php".$loc);
                        
                        
                        unset ($_SESSION["mensaje"]);
                    }else{
                        $_SESSION['mensaje'] = "usuario o contraseña no validos";
                        header("Location: ../vista/login.php");
                    }   
                }else{
                    $_SESSION['mensaje'] =  "Error en la consulta";
                    header("Location: ../vista/login.php");
                }
                
                mysqli_close($con);
            }else{
                $_SESSION['mensaje'] =  "Introduce un usuario y/o contraseña validos";
                header("Location: ../vista/login.php");
            }
            
//            if(isset($_POST['send'])){
//                unset($_POST['send']);
//                unset($_POST['user']);
//                unset($_POST['password']);
//            }

        }

    ?>
    
   