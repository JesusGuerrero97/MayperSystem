<?php
    
    function get_categorias(){
        
        require_once('conexion.php');
        $con = conectar();
        
        $query = ("SELECT * FROM categorias");
        
        $res = mysqli_query($con, $query);
        
        mysqli_close($con);
        return $res;
    }
        
      
    
    
    
    
    
    
?>    