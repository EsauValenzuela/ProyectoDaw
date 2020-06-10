<?php
 isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;


if(@$_GET['perfil']=="editar"){
    require_once("modelos/usuariosModelo.php");
    $usuario = new usuarios();
    $matrizUsuario = $usuario->getUsuarioRegistro(@$_GET['id']);


    require_once("vistas/perfilVista.php");


} elseif(@$_GET['perfil']=="editado") {
    require_once("modelos/usuariosModelo.php");
    
    require_once("modelos/pedidosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $pedidos = new pedidos();
    $paginador = new paginador();
    $facturas = $pedidos->getPedidosPerfil($numero, $_POST['idusuario']);
    $totalPaginas = $paginador->getPaginadorPedidosPerfil($_POST['idusuario']);
    
    $usuario = new usuarios();
    $usuario->editarLogin(@$_POST['idusuario'], @$_POST['nick'], @$_POST['apellidos'], @$_POST['dni'],
    @$_POST['nombre'], @$_POST['telefono'], @$_POST['direccion'], @$_POST['contrasena'] );
   
    $matrizUsuario = $usuario->getUsuarioRegistro($_POST['idusuario']);
   
    require_once("vistas/perfilVista.php");


} elseif(@$_GET['perfil']=="pedido"){

    require_once("modelos/pedidosModelo.php");
    $pedidos = new pedidos();
    $detalle = $pedidos->getPedidoDetalle($_GET["idpedido"]);
    require_once("vistas/perfilVista.php");


} elseif(@$_GET['perfil']=="volver") {

    require_once("modelos/usuariosModelo.php");
    $usuario = new usuarios();
    $matrizUsuario = $usuario->getUsuarioRegistro(@$_GET['id']);
    require_once("modelos/pedidosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $pedidos = new pedidos();
    $paginador = new paginador();
    $facturas = $pedidos->getPedidosPerfil($numero,$_GET['id']);
    $totalPaginas = $paginador->getPaginadorPedidosPerfil($_GET['id']);
    
    
    require_once("vistas/perfilVista.php");




} else {

    require_once("modelos/usuariosModelo.php");
    $usuario = new usuarios();
    $matrizUsuario = $usuario->getUsuarioRegistro(@$_GET['id']);
    require_once("modelos/pedidosModelo.php");
    require_once("modelos/paginadorModelo.php");
    $pedidos = new pedidos();
    $paginador = new paginador();
    $facturas = $pedidos->getPedidosPerfil($numero, $_GET['id']);
    $totalPaginas = $paginador->getPaginadorPedidosPerfil($_GET['id']);
    require_once("vistas/perfilVista.php");




}
?>