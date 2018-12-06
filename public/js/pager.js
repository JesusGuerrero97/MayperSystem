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


    npage = nre*(target.firstChild.text-1);
     
     switch(func){
         case "cargar_solicitudes":
             get_solicitudes(null, nre, npage, tipo, status);
             break;
             
             case "get_productosAlm":
             validar_products();
            get_productosAlm(key.value, nre, npage, sucursal, categoria, products);
             break;
        }
     
    

}