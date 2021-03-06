var products = new Array();

function cargar_script_table(){
    if(document.getElementById('table')){
        const table = document.getElementById('table');
        
        table.addEventListener('click', (e)=>{
   
        if(e.target.classList.contains('btn_table')){

                e.target.classList.add("checked");
                add_product_to_list(e.target.parentElement.parentElement.cloneNode(true))
            }

        });
        
    }   
}



function add_product_to_list(node){
    
        let list = document.getElementById('first_pane');
        
        let first_pane_input = document.createElement("div");
        let key_product = document.createElement("div");
        let name_product = document.createElement("div");
        let delete_product = document.createElement("div");
    
    
        first_pane_input.classList.add("input");
        first_pane_input.classList.add("first_pane_input");
    
        key_product.classList.add("key_product");
        name_product.classList.add("name_product");
        delete_product.classList.add("delete_product");
        delete_product.id = "delete_product"
        
        var p = document.createElement("p");
        var p1 = document.createElement("p");
        var p2 = document.createElement("button");
        var p3 = document.createElement("p");
        p.innerHTML = node.childNodes[2].firstChild.nodeValue;
        p1.innerHTML = node.childNodes[1].firstChild.nodeValue;
        p2.innerHTML = "X";
        p3.innerHTML= node.childNodes[5].value;
    
        p3.style.display = 'none';
    
    //guardar en array todos los productos cargados
        products.push(node.childNodes[5].value);
    
    
        key_product.appendChild(p);
        name_product.appendChild(p1);
        delete_product.appendChild(p2);
        delete_product.appendChild(p3);
    
        first_pane_input.appendChild(key_product);
        first_pane_input.appendChild(name_product);
        first_pane_input.appendChild(delete_product);
    
        list.appendChild(first_pane_input);
        
    
//    console.log(products)
    validar_products();
}




    let container = document.getElementById("first_pane");
    container.addEventListener('click', (e)=>{
       
        if(e.target.parentElement.classList.contains("delete_product")){
        
            e.target.parentElement.parentElement.parentElement.removeChild(e.target.parentElement.parentElement);
            
            products.forEach(function(element, index){
                if(element == e.target.parentElement.lastChild.textContent){
                    
                    products.splice(index, 1);

                    
                    validar_products();
                    
                    get_productosAlm(key.value, nre, npage, sucursal, categoria, products);
                }
            })
            
//            console.log(products);
        }
        
    });
    