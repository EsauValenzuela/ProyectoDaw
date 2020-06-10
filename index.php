<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="estilos/estilos.css" >
    <title>home</title>
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

  <div id="marco">
        <div id="interior1">
        </div>
        <div id="texto1">
          <h3>SWEETPERFUME</h3>
          Somos una marca joven. Nuestra empresa
          ya es un referente a nivel nacional dada
          la variedad de productos ofrecidos y nuestra
          dedicada especialización, siendo expertos en
          perfumeria por más de 30 años. Es por ello
          que somos de gran confianza.
        </div>
        <div id="interior2">
        </div>
        <div id="texto2">
        <h3>NUESTROS PRODUCTOS</h3>
          Nuestros productos son todos primeras marcas
         aunque no excluimos ninguno de los productos de
         dichas marcas, porque nuestra especialización hace
          que podamos estar pendientes de cada detalle para que
          nuestros usuarios y clientes puedan encontrar el productos
          deseado.

        </div>
  </div>

  <div id="pie">

  </div>







</div>
</body>



</html>


