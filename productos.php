<?php 
require_once("modelos/modeloCarrito.php");
session_start();

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
  <!--<link rel="stylesheet"  href="estilos/menu.css" >-->
  <link rel="stylesheet"  href="fontello/css/fontello.css" >




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
                        <?php } elseif(@$_SESSION['login']==2) {   ?>
                        <li><a href="cerrar.php">cerrar sesion</a></li>
                        <?php } else { ?>
                        <li><a href="registro.php">registro</a></li>
                        <?php  }  ?>                           
                    </ul>       
                
                </nav>

                </div>
           
        
         
               
                       
               
    
    
    <div id="contenido">
    <?php
    require_once("controladores/productosControlador.php");
    ?>

    </div>
</div>
 
 <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <script src= "js/jquery-1.10.2.js" ></script>
<script src= "js/ajax.js" ></script>
</body>
</html>