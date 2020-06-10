<?php
class imagenes{
    private $db;
    
    
    
    public function __construct(){
    
    
        require_once("modelos/conectar.php");
    
        $this->db=Conectar::conexion();
       
    }
    
    
    
    
 public function getSubirNombrarImagen($imagen){
    
        $nombreTemporal = @$_FILES['afile']['tmp_name'];
        $cadena = "abcdefghijklmnopqrstuwwxyzABCDEFGHIJKLMNOPQVWXYZ1234567";
        $longitud = strlen($cadena);
        $archivo = @$_FILES['afile']['name'];
        $nombreFinal="i";
        $extension = explode(".",$archivo);
        $ext = strtolower(end($extension));
        for($i=0; $i<=6; $i++){
            $aleatorio = rand(1, $longitud);
            $caracter = substr($cadena, $aleatorio, 1);
            $nombreFinal.= $caracter;
        }
        $nombreFinal.= ".";
        $nombreFinal.= $ext;
        move_uploaded_file($nombreTemporal, 'uploads/'.$nombreFinal);
    
    
    
        return $nombreFinal;
    
    
    }





    public function getSubirNombrarImagenEditar($imagen){
    
        $nombreTemporal = @$_FILES['afile2']['tmp_name'];
        $cadena = "abcdefghijklmnopqrstuwwxyzABCDEFGHIJKLMNOPQVWXYZ1234567";
        $longitud = strlen($cadena);
        $archivo = @$_FILES['afile2']['name'];
        $nombreFinal="i";
        $extension = explode(".",$archivo);
        $ext = strtolower(end($extension));
        for($i=0; $i<=6; $i++){
            $aleatorio = rand(1, $longitud);
            $caracter = substr($cadena, $aleatorio, 1);
            $nombreFinal.= $caracter;
        }
        $nombreFinal.= ".";
        $nombreFinal.= $ext;
        move_uploaded_file($nombreTemporal, 'uploads/'.$nombreFinal);
    
    
    
        return $nombreFinal;
    
    
    }

   







}

?>