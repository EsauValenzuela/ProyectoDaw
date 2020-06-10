<?php
session_start();
if($_SESSION['login']!=2){
    header('Location:index.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="estilos/estilos.css" >
    
  
   


    <title>Document</title>

</head>
<body>


<div id="principal">

<header>
           
</header>
    
<div id=Pmenu>
        <input type="checkbox" id="btn-menu"> 
        <label for="btn-menu"><img src="imagenes/menu.png" alt=""> 
        </label>
    <nav class="menu">    
    <ul>
        <li><a href="admin.php">administrador</a></li>
        <li><a href="admin.php?admin=productos">productos</a></li>
        <li><a href="admin.php?admin=marcas">marcas</a></li>
        <li><a href="admin.php?admin=usuarios">usuarios</a></li>
        <li><a href="admin.php?admin=pedidos">pedidos</a></li>
        <li><a href="cerrar.php">cerrar sesion</a></li>
        <li><a href="index.php">home</a></li>
    
    </ul>

    </nav>
</div>  


    <div id="contenidoAdmin">
    <?php
    require_once("controladores/adminControlador.php");
    ?>
    
    </div>

   <div id="pie">
    </div> 
<div>




    <script src= "js/jquery-1.10.2.js" ></script>
<script src= "js/ajax.js" ></script>

</body>




</html>