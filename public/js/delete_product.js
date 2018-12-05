 $(document).ready(function(){

});
function borrar(idProducto)
{
  $.ajax({
    url: '../modelo/deleteProduct.php',
    type: 'POST',
    dataType: 'html',
    data:{
      id:idProducto
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
   alert(valorid);
   if(confirm("¿Desea eliminar este producto?"))
   {
     borrar(valorid);
   }

});
