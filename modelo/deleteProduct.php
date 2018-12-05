<?php
  require_once('conexion.php');
  echo "<script type='text/javascript'>alert('Hola');</script>";
  if(isset($_POST['id']))
  {
    echo "<br>entro";
    $con = conectar();
    if($con)
    {
      if($con->query('delete from productos WHERE Id_productos='.$_POST["id"].';'))
      {
        return true;
      }
      else {
        return false;
      }
    }
  }

 ?>
