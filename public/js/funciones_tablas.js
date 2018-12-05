
function get_solicitudes(busqueda, nr, np, tipo, status){
    $.ajax({
    url: '../modelo/tabla.php',
    type: 'POST',
    dataType: 'html',
    data:{
        
        function: "cargar_solicitudes",
        busqueda: busqueda,
        nregistros: nr,
        npages: np,
        tipo: tipo,
        status: status
    },
    }).done(function(resultado){
        $("#tabla").html(resultado);
    })
}


function get_pager(nreg){
   $.ajax({
    url: '../modelo/productos.php',
    type: 'POST',
    dataType: 'html',
    data:{
        
        function: "get_count_pager",
        nreg: nreg
    },
    }).done(function(resultado){
        $("#pager").html(resultado);
    }) 
}

function get_productosAlm(busqueda, nr, np, suc, cat){
    $.ajax({
    url: '../modelo/tabla.php',
    type: 'POST',
    dataType: 'html',
    data:{
        
        function: "get_productosAlm",
        busqueda: busqueda,
        nregistros: nr,
        npages: np,
        categoria: cat,
        suc: suc
    },
    }).done(function(resultado){
        $("#tabla").html(resultado);
    })
}