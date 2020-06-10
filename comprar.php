<?php
require_once("modelos/modeloCarrito.php");
session_start();
if($_SESSION['login']!=1){
    header('Location:cerrar.php');
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
<?php
require_once("modelos/comprar.php");
$idproductosT = $_SESSION['carrito']->obtenerIdProductoTodos();
$controlCompra = 0;
for ($i=0;$i<count($idproductosT);$i++){
    if($idproductosT[$i]!=-1){
        $controlCompra++;
    }
}
if($controlCompra == 0){
           
    header('Location:carrito.php');
}
if(isset($_POST['cuenta'])){
       
    $d = new dateTime();
    $fech = $d->format("d/m/Y");
    $comprar = new comprar();
$comprar->compraCarrito($_SESSION['id'], $fech, $_POST['direccion'],
$_POST['telefono'] );
$compra = $comprar->compraCarrito1();

    foreach( $compra  as $registro){
       
        $compra1 = $registro['idfactura'];

    }

    
    $idproductos = $_SESSION['carrito']->obtenerIdProducto();
    $precios = $_SESSION['carrito']->obtenerPrecio();
    $unidades = $_SESSION['carrito']->obtenerUnidades();
    for ($i=0;$i<count($idproductos);$i++){
        $comprar->compraCarrito2($compra1, $idproductos[$i], 
        $unidades[$i], $precios[$i]);


    }


    unset($_SESSION['carrito']);
   echo "su compra se ha realizado";
    ?>
    <a href="index.php" class='btn btn-blue'>volver a web</a>
    <?php

} else {
?>
 
 
 
 
  <form action="comprar.php"  class="formuregi" id="carrito"  method="post">
  <h3>Efectuar compra</h3>
  <p>numero tarjeta</p><input type="text"  name="cuenta" required>
  <p>direccion de envio</p><input type="text"  name="direccion" required>
  <p>telefono de contacto</p>  <input type="text"  name="telefono" required>
  <input type="submit" class="btn btn-blue" value="comprar">
  <input type="button" class="btn btn-blue"  role="link" onclick="window.location='carrito.php'" value="volver a carrito">
      </form>
      </div>

<?php }  ?>

</body>
</html>


