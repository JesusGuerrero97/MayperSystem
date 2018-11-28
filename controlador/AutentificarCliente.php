<?php
session_start();
    
    /**
    *   PHP PARA LA VALIDACION DE INICIO DE SESIÓN
    */
        require('../modelo/clientes.php');
        
        if(isset($_POST['login'])){
        
            if(isset($_POST['user']) && isset($_POST['password'])){

                
                $res = get_client_session($_POST['user'], $_POST['password']);

                if($res){
                    
                    if(mysqli_num_rows($res) > 0){
                        while ($row = mysqli_fetch_array($res)) {
                            
                            $client = [
                                "clientId" => $row["Id"],
                                "clientNombre" =>   $row["Nombre"]
                            ];
                        }
                        /*   GUARDAR DATOS DEL USUARIO EN UNA SESION   */
                        $_SESSION['client'] = $client;
                        
                        //REDIRIGIR AL USUARIO A SU VISTA
                        unset ($_SESSION["mensaje"]);
                        
                        header('Location: ../vista/cliente.php');
                        
                        
                        $_SESSION['mensaje'] = "";
                    }else{
                        $_SESSION['mensaje'] = "usuario o contraseña no validos";
                        header("Location: ../vista/clients.php");
                    }   
                }else{
                    $_SESSION['mensaje'] =  "Error en la consulta";   
                    header("Location: ../vista/clients.php");
                }
                
            }else{
                $_SESSION['mensaje'] =  "Introduce un usuario y/o contraseña validos";
                header("Location: ../vista/clients.php");
            }
            

        }

    ?>
    