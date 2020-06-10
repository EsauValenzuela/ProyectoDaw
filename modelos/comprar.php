<?php

class comprar {


    public function __construct(){


        require_once("modelos/conectar.php");
    
        $this->db=Conectar::conexion();
    
    }


    public function compraCarrito($id, $fech, $dire, $tel){
        
        
        
        $this->db=Conectar::conexion();
        
        
    
        $consulta =  $this->db->query("INSERT INTO factura  ( idusuario, fecha, direccioenvio, telefonocontacto 
            ) VALUES ($id, '$fech', '$dire', $tel)");
                
     

    }
    public function compraCarrito1(){
        $consulta = $this->db->query("SELECT MAX(idfactura) as idfactura FROM factura");
        $idfactura = array();
      
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $idfactura[] = $filas;
        }

        return $idfactura;
    
      
    }





    public function compraCarrito2($idfact, $idprod, $uni, $pre){
        $consulta =  $this->db->query("INSERT INTO detallefactura  ( idfactura, idproducto, unidades, precio) VALUES ($idfact, $idprod, $uni, $pre)");
        



    }


}
?>