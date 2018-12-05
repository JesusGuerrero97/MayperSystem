var s_t = document.getElementById('select_tipo');
        var s_s = document.getElementById('select_status');
        var s_r = document.getElementById('select_registros');
        var btn_search = document.getElementById('buscar');
        
        let tipo = "";
        let status = "";
        let nre = s_r.options[s_r.selectedIndex].text;
        let npage =0;//= (page.firstChild.text)-1;

        window.onload = function(){
            
            tipo = s_t.options[s_t.selectedIndex].text;
            status = s_s.options[s_s.selectedIndex].text;

            get_solicitudes(null, nre, npage, tipo, status);

        }
        
        s_t.addEventListener('change', (e)=>{
            tipo = s_t.options[s_t.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_s.addEventListener('change', (e)=>{
            status = s_s.options[s_s.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_s.addEventListener('change', (e)=>{
            status = s_s.options[s_s.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        s_r.addEventListener('change', (e)=>{
            nre = s_r.options[s_r.selectedIndex].text;
            btn_search.value = "";
            npage = 0;
            
            get_solicitudes(null, nre, npage, tipo, status);
        })
        
        btn_search.addEventListener('keyup', (e)=>{
            var busqueda = btn_search.value;
            npage = 0;
                
            get_solicitudes(busqueda, nre, npage, tipo, status);
        
            
        });

function pager(func){
    let pager = document.getElementById('pager');

    
        pager.addEventListener('click', (e)=>{
  
            if(e.target.classList.contains('page')){
                
                change_pager(e.target, func);
                
            }else if(e.target.parentElement.classList.contains('page')){
                
                change_pager(e.target.parentElement, func);
            }
            
        });

}


 function change_pager(target, func){
    let pages = Array.prototype.slice.apply(document.querySelectorAll('.page'));

    let i = pages.indexOf(target);

    pages.map(pag => pag.classList.remove('page-active'));
    pages[i].classList.add("page-active");


    btn_search.value = "";
    npage = nre*(target.firstChild.text-1);
     
     switch(func){
         case "cargar_solicitudes":
             get_solicitudes(null, nre, npage, tipo, status);
             break;
    }

}