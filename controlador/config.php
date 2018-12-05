<?php

    function set_pager($row, $nreg, $offset){
            $pager = "";
            
            $page_active = ceil(($offset/$nreg));
            $count = ceil(($row)/$nreg);
        
            $pager.="<div class='pager' id='pager'>";
                $pager.="<div class='span'><span>Página ".($page_active+1)."/".$count." de $nreg registros</span></div>";
                $pager.="<ul>";
                    $pager.="<li class='change_page'>«</li>";

        
//                    echo $page_active;
                        for($i = 0; $i<$count; $i++){

                            if($i == $page_active){
                                $pager.="<li class='page page-active' id='page-active'><a>".($i+1)."</a></li>";
                            }else{
                                $pager.="<li class='page'><a>".($i+1)."</a></li>";
                            }    
                        }

                    $pager.="<li class='change_page'>»</li>";
                $pager.="</ul>";
                $pager.="</div>";
                $pager.="</section>";
            
            return $pager;
        }

?>