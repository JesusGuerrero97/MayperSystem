
function borrar(idProducto,opc)
{
  $.ajax({
    url: '../modelo/productos.php',
    type: 'POST',
    dataType: 'html',
    data:{
      id:idProducto,
      opc: opc
    },
  })
  .done(function(resultado)
  {
    if(resultado)
    {
      obtener_productos(null,1);
    }
  })
}
$(document).on('click','#delete',function(e){

   valorid = e.target.parentNode.parentNode.lastElementChild.value;
   if(confirm("¿Desea eliminar este producto?"))
   {
     borrar(valorid,2);
   }

});
