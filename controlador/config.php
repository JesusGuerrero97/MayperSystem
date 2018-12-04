<?php

    function set_pager($row, $nreg){
            $pager = "";
            $pager.="<div class='pager' id='pager'>";
                $pager.="<ul>";
                    $pager.="<li class='change_page'>«</li>";

                    $count = ceil(($row)/$nreg);
                        for($i = 0; $i<$count; $i++){

                            if($i == 0){
                                $pager.="<li class='page page-active' id='page-active'><a>".($i+1)."</a></li>";
                            }else{
                                $pager.="<li class='page'><a>".($i+1)."</a></li>";
                            }    
                        }

                    $pager.="<li class='change_page'>»</li>";
                $pager.="</ul>";
              $pager.="</div>";
            
            return $pager;
        }

?>