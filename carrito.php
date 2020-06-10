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
    <link rel="stylesheet"  href="estilos/estilos.css" >
    <title>Document</title>
</head>
<body>
<?php
if($_SESSION['login']!=1){
    header('Location:index.php');
    

} else {

if (!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = new carrito();
} 

if(isset($_GET['item'])){
    $_SESSION["carrito"]->eliminarCarrito($_GET['item']);

    
}
if(isset($_POST['idproducto'])){
$_SESSION["carrito"]->anadirCarrito(@$_POST['idproducto'], @$_POST['nombre'],
 @$_POST['precio'],@$_POST['unidad']); 
}

    $_SESSION["carrito"]->mostrarCarrito();
}
?>
<a href="productos.php" class="btn btn-blue">volver a productos</a><br><br>
<a href="comprar.php" class="btn btn-blue">efectuar compra</a><br>

    
</body>
</html>

