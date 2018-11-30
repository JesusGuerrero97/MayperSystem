$(document).ready(function(){
  obtener_productos(null,1);
  $("#equipos").on('click',function(){
    obtener_productos(null,1);
  });
  $("#ventas").on('click',function(){
    obtener_ventas(null,2);
  });
  $("#demos").on('click',function(){
    obtener_demos(null,3);
  });

////////////////////////////////////////////////////////////////////////////////////
///////////////FUNCION PARA BUSCAR PRODUCTOS EN CONJUNTO CON PHP////////////////////
////////////////////////////////////////////////////////////////////////////////////

    function obtener_productos(productos,opc)
    {
      $.ajax({
        url: '../modelo/searches.php',
        type: 'POST',
        dataType: 'html',
        data:
        {
          productos: productos,
          opc: opc
        },
      })
      .done(function(resultado)
      {
        $("#tabla").html(resultado);
      })
    }
    $(document).on('keyup','#busqueda',function()
    {
       var valorBusqueda=$(this).val();
       if (valorBusqueda!="")
       {
         obtener_productos(valorBusqueda,1);
       }
       else
       {
          obtener_productos(null,1);
       }
     });
////////////////////////////////////////////////////////////////////////////////////
//////////FUNCION PARA BUSCAR SOLICITUDES DE VENTAS EN CONJUNTO CON PHP////////////
////////////////////////////////////////////////////////////////////////////////////
      function obtener_ventas(ventas,opc)
      {
        $.ajax({
          url: '../modelo/searches.php',
          type: 'POST',
          dataType: 'html',
          data:
          {
            ventas: ventas,
            opc: opc
          },
        })
        .done(function(resultado)
        {
          $("#tablaVentas").html(resultado);
        })
      }
      $(document).on('keyup','#buscarVenta',function()
      {
         var valorBusqueda=$(this).val();
         if (valorBusqueda!="")
         {
           obtener_ventas(valorBusqueda,2);
         }
         else
         {
            obtener_ventas(null,2);
         }
       });
////////////////////////////////////////////////////////////////////////////////////
//////////FUNCION PARA BUSCAR SOLICITUDES DE DEMOS EN CONJUNTO CON PHP////////////
////////////////////////////////////////////////////////////////////////////////////
      function obtener_demos(demos,opc)
      {
        $.ajax({
          url: '../modelo/searches.php',
          type: 'POST',
          dataType: 'html',
          data:
          {
            demos: demos,
            opc: opc
          },
        })
        .done(function(resultado)
        {
          $("#tablaDemos").html(resultado);
        })
      }
      $(document).on('keyup','#buscarDemos',function()
      {
         var valorBusqueda=$(this).val();
         if (valorBusqueda!="")
         {
           obtener_demos(valorBusqueda,3);
         }
         else
         {
            obtener_demos(null,3);
         }
       });

});
