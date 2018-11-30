<?php
    
    function get_count_pager(){
     
        require_once('conexion.php');
        $con = conectar();
        
        $query="SELECT CEILING(COUNT(*)/10) FROM productos";
        
        $res = mysqli_query($con, $query);
        
        if (mysqli_num_rows($res)>0) {
            $row = mysqli_fetch_row($res);
            $count = $row[0];
            
        }
        
        mysqli_free_result($res);        
        mysqli_close($con);
        return $count;
    }


?>