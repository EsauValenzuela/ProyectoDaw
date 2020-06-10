<?php
class Conectar  {


    public static function conexion () {

       
        try{
            //conecto con base de datos 
           $base = new PDO ('mysql:host=localhost; dbname=perfume', 'root', '');
                //defino los atributos 
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               //incluyo caracteres
                $base->exec("SET CHARACTER SET utf8");

            return $base;
               
    
        } catch(Exception $e){
    
            die("error yo".$e->getMessage());
        
    
       
        }
    }
}

?>