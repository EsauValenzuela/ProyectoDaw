<?php

class paginador{
    private $db;
    public function __construct(){


        require_once("modelos/conectar.php");

        $this->db=Conectar::conexion();
       
    }
  
   
    public function getPaginadorProductos(){

    $productos = array();
    $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.alta FROM producto as p INNER JOIN marca as m
    ON p.idmarca = m.idmarca 
    INNER JOIN genero as g
        ON p.idgenero = g.idgenero WHERE p.alta = 1 ORDER BY  p.idproducto  DESC  
        ");



    while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
        $productos[] = $filas;
    }
    $hasta = 6; 
    $numeroderegistros = 0;
    foreach ($productos as $elemento) {
        $numeroderegistros++;
    }


    $totalPaginas = intdiv($numeroderegistros, $hasta);
    if(($numeroderegistros % $hasta)>0){
        $totalPaginas = $totalPaginas+1;
    }

        return   $totalPaginas;


    }


    public function getPaginadorProductosGenero($genero){

        $productos = array();
        $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.alta FROM producto as p INNER JOIN marca as m
        ON p.idmarca = m.idmarca 
        INNER JOIN genero as g
            ON p.idgenero = g.idgenero where p.idgenero = $genero AND p.alta = 1  ORDER BY  p.idproducto  DESC  
            ");
        


        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
            
            $productos[] = $filas;
        }
        $hasta = 6; 
        $numeroderegistros = 0;
        foreach ($productos as $elemento) {
            $numeroderegistros++;
        }


        $totalPaginas = intdiv($numeroderegistros, $hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
            return   $totalPaginas;


        }







    public function getPaginadorProductosMarcasGenero($marca, $genero){

        $productos = array();


        if($genero==0){
            $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.alta FROM producto as p INNER JOIN marca as m
            ON p.idmarca = m.idmarca 
            INNER JOIN genero as g
            ON p.idgenero = g.idgenero  WHERE p.idmarca = $marca AND p.alta = 1  ORDER BY  p.idproducto  DESC  
            ");
        } else {
            $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.alta FROM producto as p INNER JOIN marca as m
            ON p.idmarca = m.idmarca 
            INNER JOIN genero as g
            ON p.idgenero = g.idgenero  WHERE p.idmarca = $marca AND p.idgenero = $genero AND p.alta = 1 ORDER BY  p.idproducto  DESC  ");




        }
    
    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
           
            $productos[] = $filas;
        }
        $hasta = 6; 
        $numeroderegistros = 0;
        foreach ($productos as $elemento) {
            $numeroderegistros++;
        }
    
    
        $totalPaginas = intdiv($numeroderegistros, $hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
            return   $totalPaginas;
    
    
        }


        public function getPaginadorUsuarios(){

            $productos = array();
    
    
            
                $consulta = $this->db->query("SELECT * FROM usuario WHERE alta = 1 ORDER BY  idusuario   DESC");
         
        
        
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
               
                $productos[] = $filas;
            }
            $hasta = 6; 
            $numeroderegistros = 0;
            foreach ($productos as $elemento) {
                $numeroderegistros++;
            }
        
        
            $totalPaginas = intdiv($numeroderegistros, $hasta);
            if(($numeroderegistros % $hasta)>0){
                $totalPaginas = $totalPaginas+1;
            }
            
                return   $totalPaginas;
        
        
            
    
    
    
    
    



    }




    public function getPaginadorMarcas(){

        $productos = array();


        
            $consulta = $this->db->query("SELECT * FROM marca WHERE alta = 1 ORDER BY  idmarca   DESC");
     
    
    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
           
            $productos[] = $filas;
        }
        $hasta = 6; 
        $numeroderegistros = 0;
        foreach ($productos as $elemento) {
            $numeroderegistros++;
        }
    
    
        $totalPaginas = intdiv($numeroderegistros, $hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
            return   $totalPaginas;
    
    
    }

    

    public function getPaginadorPedidos(){

        $productos = array();


        
        $consulta = $this->db->query("SELECT f.idfactura, u.apellidos, u.dni, u.direccion, f.fecha, f.estado  FROM factura as f INNER JOIN usuario as u
        ON f.idusuario = u.idusuario ORDER BY f.idfactura DESC ");
        
     
    
    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
           
            $productos[] = $filas;
        }
        $hasta = 6; 
        $numeroderegistros = 0;
        foreach ($productos as $elemento) {
            $numeroderegistros++;
        }
    
    
        $totalPaginas = intdiv($numeroderegistros, $hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
            return   $totalPaginas;
    
    
    }


    public function getPaginadorPedidosPerfil($idusuario){

        $productos = array();


        
        $consulta = $this->db->query("SELECT f.idfactura, u.apellidos, u.dni, u.direccion, f.fecha, f.estado  FROM factura as f INNER JOIN usuario as u
        ON f.idusuario = u.idusuario WHERE u.idusuario = $idusuario ORDER BY f.idfactura DESC ");
        
     
    
    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
           
            $productos[] = $filas;
        }
        $hasta = 6; 
        $numeroderegistros = 0;
        foreach ($productos as $elemento) {
            $numeroderegistros++;
        }
    
    
        $totalPaginas = intdiv($numeroderegistros, $hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
            return   $totalPaginas;
    
    
    }







}









?>

