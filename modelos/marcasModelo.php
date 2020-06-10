<?php
class marcas{
private $db;



public function __construct(){


    require_once("modelos/conectar.php");

    $this->db=Conectar::conexion();
   
}




 public function getMarcas($numero){
  $desde=0;
    $hasta=6;
    if($numero>=1){
    $desde=$numero*$hasta-$hasta;
    }
    $marcas=array();
    $consulta = $this->db->query("SELECT * FROM marca WHERE alta = 1 ORDER BY idmarca DESC LIMIT $desde, $hasta");

    while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
    
        $marcas[] = $filas;
    }

    return $marcas;

    }


    public function getMarcaRegistro($idmarca){
    
          $marca=array();
          $consulta = $this->db->query("SELECT * FROM marca WHERE idmarca = $idmarca AND alta = 1");
      
          while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
          
              $marcas[] = $filas;
          }
      
          return $marcas;
      
          }



public function anadirMarca($nombre){

    $consulta =  $this->db->query("INSERT INTO marca (nombre) VALUES ('$nombre')");

    }
public function editarMarca($idmarca, $nombre){

    $consulta =  $this->db->query("UPDATE marca SET
        nombre = '$nombre'
        WHERE idmarca = $idmarca ");

    }




    public function borrarMarca($idmarca){

        $consulta =  $this->db->query("UPDATE marca SET
            alta = 0
            WHERE idmarca = $idmarca ");
    
        }


}



?>