<?php


    /**
    *   Esta webservide contiene una funcion llamada "Conectar()", la cual nos permite crear una conexión a la base de datos y retornar la conexion
    *   al proceso (webservices) que lo solicite.
    **/

    function conectar(){
//        $hostname ="db751330837.db.1and1.com";
//        $database ="db751330837";
//        $username="dbo751330837";
//        $password="svyifEJPLlQmjjTMdiMN";
        $hostname ="10.0.0.19";
        $database ="sistemamayper2";
        $username="root";
        $password="Thegreenday.1";
        
        $db = new mysqli($hostname, $username, $password, $database);
     
        return $db;
    }
?>