<?php
    
    function get_next_key(){
        
        require_once('../modelo/solicitudes.php');
        $res = get_last_id();
            
        if($res){
            $fetch = mysqli_fetch_array($res);
            
            $result = $fetch['key'];
            
            if($result == null){
                $result = "1";
            }
        }
         
        return $result;
    }

?>