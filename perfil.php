<?php 
session_start();
if($_SESSION['login']!=1 || ($_SESSION['id'])!=$_GET['id']){
header('Location:index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <!-- <script src= "js/jquery-3.4.1.min.js" ></script>-->
  <!-- <link rel="stylesheet"  href="bootstrap-4.3.1-dist/css/bootstrap.min.css" >-->
  <link rel="stylesheet"  href="estilos/estilos.css" >
  




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
            <li><a href="index.php">home</a></li>
            <li><a href="productos.php">todos</a></li>
            <li><a href="productos.php?genero=1">hombre</a></li>
            <li><a href="productos.php?genero=2">mujer</a></li>
            <li><a href="productos.php?genero=3">unisex</a></li> 
            <?php if(@$_SESSION['login']==1){?>
            <li><a href="perfil.php?id=<?=$_SESSION['id']?>">perfil</a></li>
            <?php } elseif(@$_SESSION['login']==2) { ?>
                <li><a href="admin.php">administrador</a></li>
            <?php } else {   ?>
            <li><a href="login.php">login</a></li>
            <?php } ?>
            <?php if(@$_SESSION['login']==1){?>
            <li><a href="carrito.php">carrito</a></li>
            <?php } else {   ?>
            <li><a href="registro.php">registro</a></li>
            <?php } ?>
            
            
        </ul>

    </nav> 
</div>
    
    <div id="contenido">
    <?php
    require_once("controladores/perfilControlador.php");  
    ?>

    </div>
    <div id="pie">
    </div>
</div>
 
 
    <script src= "js/jquery-1.10.2.js" ></script>
<script src= "js/ajax.js" ></script>
</body>
</html>