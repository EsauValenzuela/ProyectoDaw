<?php 
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
  <link rel="stylesheet"  href="estilos/menu.css" >
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
            <li><a href="login.php">login</a></li>
            <li><a href="registro.php">registro</a></li>
        </ul>
            
     </nav> 
    </div>
    
    <div id="contenido">
    <div class="formulogi">
        <h3>Login</h3>
                <form action= "controladorLogin.php" method="post" autocomplete="off" >
                <p>email:</p>
           
            <input id="email" type="text" class="field"  name="email" autocomplete="off" required>
            <p>contraseña</p>
            <input id="contrasena" type="password" class="field" name="contrasena" autocomplete="off" required>
            <br>
            <br>
            <input id="mandar"  class='btn btn-blue'  type="submit" name="mandar" value="enviar">
            </form>

          <?php  if( @$_GET['login']==1){

                echo "<p>no está registrado o dado de alta  en nuestra base de datos</p>";
          }
            
            ?>

</div>

   
    </div>


    <div id="pielogin">
      
    </div>
</div> 
 
    <script src= "js/jquery-1.10.2.js" ></script>
<script src= "js/ajax.js" ></script>
</body>
</html>