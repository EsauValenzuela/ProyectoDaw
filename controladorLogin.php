<?php
session_start();

require_once("modelos/usuariosModelo.php");

$usuarios = new usuarios();

$existe = $usuarios->comprobarUsuarioContrasena($_POST['email'], $_POST['contrasena'] );

if($existe==0){
    header('Location: login.php?login=1');
 } else{
   
     $usuarios->login($_POST['email'], $_POST['contrasena']);
     header('Location: productos.php');

 }
 





?>