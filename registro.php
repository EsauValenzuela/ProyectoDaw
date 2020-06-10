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
  <!--<link rel="stylesheet"  href="fontello/css/fontello.css" >-->




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
        <div class="formuregi">
        <h3>formulario de registro</h3>
                <form action="controladorRegistro.php" method="post" autocomplete="off" >
                <p>nombre:</p>
            <input id="nombre" type="text"  class="field" name="nombre" required>
            <p>apellidos</p>
            <input id="apellidos" type="text" class="field" name="apellidos" required>
            <p>direccion:</p>
            <input id="direccion" type="text" class="field" name="direccion" required>
            <p>dni:</p>
            <input id="dni" type="text" class="field" name="dni" required>
            <p>telefono:</p>
            <input id="telefono" type="text" class="field" name="telefono" required>
            <p>nick:</p>
            <input id="nick" type="text" class="field" name="nick" required>
            <p>mail</p>
            <input id="email" type="text" class="field" name="email" autocomplete="off" required>
            <p>contraseña</p>
            <input id="contrasena" type="password" class="field" name="contrasena" autocomplete="off" required>
            <br>
            <input id="mandar" type="submit" name="mandar" value="enviar">
            </form>
            <?php 
            
            
            
            
            
            if( @$_GET['registro']==1){

                        echo "<p>todo correcto ya está registrado debe de esperar 24 horas que se le active</p>";

            } elseif( @$_GET['registro']==2){
                        echo "<p> hay un email registrado que coincide con el suyo no ha sido posible su registro</p>";


            }
            
           




            ?>
           
            
        </div>  
      
    </div>
    <div id="pie">

    </div>
</div>
 
 <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <script src= "js/jquery-1.10.2.js" ></script>
<script src= "js/ajax.js" ></script>
</body>
</html>