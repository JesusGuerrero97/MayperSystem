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

});
////////////////////////////////////////////////////////////////////////////////////
///////////////FUNCION PARA BUSCAR PRODUCTOS EN CONJUNTO CON PHP////////////////////
////////////////////////////////////////////////////////////////////////////////////

    function obtener_productos(busqueda,opc)
    {
      $.ajax({
        url: '../modelo/searches.php',
        type: 'POST',
        dataType: 'html',
        data:
        {
          busqueda: busqueda,
          opc: opc
        },
      })
      .done(function(resultado)
      {
        $(".tabla").html(resultado);
          $(document).on('click',function(e){
             if(e.target.parentNode.lastElementChild.value=="Modificar")
             {
                valorid = e.target.parentNode.parentNode.lastElementChild.value;
                buscar_datos_registro(valorid,3);
             }
          })
      })
    }
    $(document).on('keyup','.busqueda',function()
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
      function obtener_ventas(busqueda,opc)
      {
        $.ajax({
          url: '../modelo/searches.php',
          type: 'POST',
          dataType: 'html',
          data:
          {
            busqueda: busqueda,
            opc: opc
          },
        })
        .done(function(resultado)
        {
          $(".tablaVentas").html(resultado);
        })
      }
      $(document).on('keyup','.busqueda',function()
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
      function obtener_demos(busqueda,opc)
      {
        $.ajax({
          url: '../modelo/searches.php',
          type: 'POST',
          dataType: 'html',
          data:
          {
            busqueda: busqueda,
            opc: opc
          },
        })
        .done(function(resultado)
        {
          $(".tablaDemos").html(resultado);
        })
      }
      $(document).on('keyup','.busqueda',function()
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
      /*//////////////////////////////////////////////////////////////////
    ///////////////////////////funcion para modificar///////////////////////////
    //////////////////////////////////////////////////////////////////*/
      // function modificar_producto(idProducto,opc)
      // {
      //   $.ajax({
      //         url: '../modelo/productos.php',
      //         type: 'POST',
      //         dataType: 'html',
      //         data:{
      //           id:idProducto,
      //           opc: opc
      //         },
      //       })
      //       .done(function(resultado)
      //       {
      //         if(resultado)
      //         {
      //           obtener_productos(null,1);
      //         }
      //       })
      //   }
      //
        function buscar_datos_registro(idProducto,opc){

          $.ajax({
            url: '../modelo/productos.php',
            type: 'POST',
            dataType: 'json',
            data:{
              id:idProducto,
              opc: opc
            },
          })
          .done(function(json){
            if(json)
            {
              modalAdd.style.display="block";
              document.getElementsByName('Id_productos')[0].value=json.Id_productos;
              document.getElementsByName('Serie')[0].value=json.Serie;
              document.getElementsByName('Clave')[0].value=json.Clave;
              document.getElementsByName('Marca')[0].value=json.Marca;
              document.getElementsByName('Modelo')[0].value=json.Modelo;
              document.getElementsByName('Software')[0].value=json.Software;
              document.getElementsByName('Accesorios')[0].value=json.Accesorios;
              document.getElementsByName('Id_categoria')[0].selectedIndex=json.Id_categoria;
              document.getElementsByName('Id_proveedor')[0].selectedIndex=json.Id_proveedor;
              document.getElementsByName('Id_status')[0].selectedIndex=json.Id_status;
              document.getElementsByName('Id_sucursal')[0].selectedIndex=json.Id_status;
              document.getElementsByClassName('agregar')[0].value="Editar";
              document.getElementById('opcion').value="Editar";

            }
          })
        }
        function cleanInputs()
        {
          document.getElementsByName('Id_productos')[0].value="";
          document.getElementsByName('Serie')[0].value="";
          document.getElementsByName('Clave')[0].value="";
          document.getElementsByName('Marca')[0].value="";
          document.getElementsByName('Modelo')[0].value="";
          document.getElementsByName('Software')[0].value="";
          document.getElementsByName('Accesorios')[0].value="";
          document.getElementsByName('Id_categoria')[0].selectedIndex=0;
          document.getElementsByName('Id_proveedor')[0].selectedIndex=0;
          document.getElementsByName('Id_status')[0].selectedIndex=0;
          document.getElementsByName('Id_sucursal')[0].selectedIndex=0;
          document.getElementsByClassName('agregar')[0].value="Agregar";
          document.getElementById('opcion').value="Agregar";
        }
