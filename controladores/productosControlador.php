<?php
//voy a mostrar todos los productos


    (!isset($_GET['genero']))?$_GET['genero']=0:$_GET['genero']=$_GET['genero'];
    (!isset($_GET['marca']))?$_GET['marca']=12:$_GET['marca']=$_GET['marca'];
    isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;
 if($_GET['genero']==0){
    
    require_once("modelos/productosModelo.php");
    require_once("modelos/paginadorModelo.php");

    $producto = new productosModelo();
    $paginador = new paginador();
    $matrizMarca = $producto->getProductosMarcas();
    if($_GET['marca']==12){
        $matrizMarcaFiltro = $producto->getProductos($numero);
        $totalPaginas = $paginador->getPaginadorProductos();
        } else {
            $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_GET['marca'], $_GET['genero'], $numero);
            $totalPaginas = $paginador->getPaginadorProductosMarcasGenero($_GET['marca'], $_GET['genero']);
    }
   
    require_once("vistas/productosVista.php");
    
    
} elseif ($_GET['genero']==1) {
    require_once("modelos/productosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $producto = new productosModelo();
    $paginador = new paginador();
    $matrizMarca = $producto->getProductosMarcas();
    if($_GET['marca']==12){
        $matrizMarcaFiltro = $producto->getProductosGenero($_GET['genero'], $numero);
        $totalPaginas = $paginador->getPaginadorProductosGenero($_GET['genero']);
        } else {
            $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_GET['marca'], $_GET['genero'], $numero);
            $totalPaginas = $paginador->getPaginadorProductosMarcasGenero($_GET['marca'], $_GET['genero']);
    }
   
    require_once("vistas/productosVista.php");
    
 }  elseif ($_GET['genero']==2) {
    require_once("modelos/productosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $producto = new productosModelo();
    $paginador = new paginador();
    $matrizMarca = $producto->getProductosMarcas();
    if($_GET['marca']==12){
        $matrizMarcaFiltro = $producto->getProductosGenero($_GET['genero'], $numero);
        $totalPaginas = $paginador->getPaginadorProductosGenero($_GET['genero']);
        } else {
            $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_GET['marca'], $_GET['genero'], $numero);
            $totalPaginas = $paginador->getPaginadorProductosMarcasGenero($_GET['marca'], $_GET['genero']);
    }
   
    require_once("vistas/productosVista.php");
 }  elseif ($_GET['genero']==3) {
    require_once("modelos/productosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $producto = new productosModelo();
    $paginador = new paginador();
    $matrizMarca = $producto->getProductosMarcas();
    if($_GET['marca']==12){
        $matrizMarcaFiltro = $producto->getProductosGenero($_GET['genero'], $numero);
        $totalPaginas = $paginador->getPaginadorProductosGenero($_GET['genero']);
        } else {
            $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_GET['marca'], $_GET['genero'], $numero);
            $totalPaginas = $paginador->getPaginadorProductosMarcasGenero($_GET['marca'], $_GET['genero']);
    }
   
    require_once("vistas/productosVista.php");
}
?>