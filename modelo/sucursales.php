<?php
    
    function get_sucursales(){
        
        require_once('conexion.php');
        $con = conectar();
        
        $query = ("SELECT * FROM sucursales");
        
        $res = mysqli_query($con, $query);
        
        mysqli_close($con);
        return $res;
    }
        
      
    
    
    
    
    
    
?>    