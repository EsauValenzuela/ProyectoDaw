<?php
 require_once("modelos/usuariosModelo.php");
 $usuariosRegistro = new usuarios();

  $existe  = $usuariosRegistro->comprobarUsuario($_POST['email']);
 if($existe!=0){
    header('Location: registro.php?registro=2');
 } else{
    $usuariosRegistro->insertarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['direccion'],
 $_POST['telefono'], $_POST['nick'], $_POST['email'],$_POST['contrasena']  );
    header('Location: registro.php?registro=1');

 }
 



?>