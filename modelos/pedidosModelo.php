<?php



class pedidos {


    public function __construct(){


        require_once("modelos/conectar.php");
    
        $this->db=Conectar::conexion();
    
    }









//metodo para traerme a todos los productos
    public function getPedidos($numero){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }
        $facturas=array();
        $consulta = $this->db->query("SELECT f.idfactura, u.dni, f.direccioenvio, f.telefonocontacto, f.fecha, f.estado  FROM factura as f INNER JOIN usuario as u
        ON f.idusuario = u.idusuario ORDER BY f.idfactura DESC LIMIT $desde, $hasta ");
        


        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $facturas[] = $filas;
        }

        return $facturas;
    
    }

    public function getPedidoDetalle($idfactura){
       
        $detalle=array();
        $consulta = $this->db->query("SELECT d.idproducto, p.nombre, p.precio, d.unidades, f.idusuario FROM producto as p INNER JOIN detallefactura as d
        ON d.idproducto = p.idproducto INNER JOIN factura as f ON d.idfactura = f.idfactura WHERE d.idfactura = $idfactura");
        


        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $detalle[] = $filas;
        }

        return $detalle;
    
    }


    public function gestionPedido($idpedido, $estado){

        $consulta = $this->db->query( "UPDATE factura SET
        estado = $estado
    WHERE idfactura = $idpedido ");



    }


    public function getPedidosPerfil($numero, $idusuario){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }
        $facturas=array();
        $consulta = $this->db->query("SELECT f.idfactura, u.dni, f.direccioenvio, f.telefonocontacto,  f.idusuario, f.fecha, f.estado  FROM factura as f INNER JOIN usuario as u
        ON f.idusuario = u.idusuario WHERE f.idusuario = $idusuario AND f.alta = 1  ORDER BY f.idfactura DESC LIMIT $desde, $hasta ");
        


        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $facturas[] = $filas;
        }

        return $facturas;
    
    }





}