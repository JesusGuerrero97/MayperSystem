<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vendedores</title>
    <link rel="stylesheet" href="../public  /css/estilo.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    
    <style type="text/css">
        .image-profile{
            background-image: url('<?php echo $_SESSION['user']['userFoto']; ?>');
        }
    </style>
    
  </head>
  <body>
    <div id="sechead">
      <div class="logoPrincipal">
          <img width="250px" height="auto" src="../public/img/logo.png" alt="logo Mayper">
      </div>

           
        <div class="tab in ce">
            <img class="logo" src="../Public/img/solicitudes.png" alt="">
            <p class="vi">Solicitudes</p>
        </div>
        <div class="tab in">
            <img class="logo" src="../Public/img/equipos.png" alt="">
            <p class="vi">Productos</p>
        </div>
      
      <div class="profile-information">
            <figure class="figure-profile">
                <div class="image-profile">
                </div>
                <figcaption>
                   <?php 
                        echo $_SESSION['user']["userNombre"]." ".$_SESSION['user']['userApellido'];
                        echo "<br/>";
                        echo "Puesto: ".$_SESSION['user']['userTipo'];
                    ?>
                </figcaption>
            </figure>
        </div>
      
    </div>
    <div id="noti">
      <div class="cont">
        <div class="notification-pane" id="mynotification">
           <figure>
                <img class="notification_image" src="../Public/img/notification_icon.png" alt="notificacion" title="Notificación">
           </figure>
       </div>
       <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content">
           <div class="modal-header">
             <span class="close">&times;</span>
             <h2>Notificaciones</h2>
           </div>
           <div class="modal-body">
             <p>Some text in the Modal Body</p>
             <p>Some other text...</p>
           </div>
         </div>
       </div>
       <div class="exit" onclick="document.location = '../controlador/logout.php';">
          <figure>
               <img class="notification_image" src="../Public/img/exit.png" alt="">
          </figure>
      </div>
        <!--<div class="ot">
          Notificaciones
        </div>-->
      </div>
    </div>
   
    <div class="container">
        <div class="content content-active">
          Hola Como estas
        </div>
        <div class="content">
            Hola es el body 2
        </div>
    </div>
  </body>
  <script src="../Public/js/modal.js"></script>
  <script type="text/javascript">
   document.getElementById("sechead").addEventListener('click', (e) => {
       
       
       console.log(e.target.parentElement);
       if(e.target.classList.contains('tab')){
          
            changeTab(e.target);
           
       }else if(e.target.parentElement.classList.contains('tab')){
            
           changeTab(e.target.parentElement);
       }
   });
      
      function changeTab(e){
          let tabs = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
           
           let contents = Array.prototype.slice.apply(document.querySelectorAll('.content'));
           
           let i = tabs.indexOf(e);
    
           
           contents.map(panel => panel.classList.remove('content-active'));
//          
           contents[i].classList.add('content-active');
      }
</script>
</html>
