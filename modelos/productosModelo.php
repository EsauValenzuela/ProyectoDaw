<?php

class productosModelo {

    private $db;
    private $idproducto;
    private $idmarca;
    private $idgenero;
    private $nombre;
    private $foto;
    private $precio;
    private $alta;
    public function __construct(){


        require_once("modelos/conectar.php");
        $this->db=Conectar::conexion();
       
    }

    //recojo de la db os generos
    public function getGeneros(){

        $generos=array();
        $consulta = $this->db->query("SELECT * FROM genero WHERE alta = 1 ORDER BY idgenero DESC");
    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $generos[] = $filas;
        }
    
        return $generos;
    
    }
    






    //metodo para traerme a todos los productos
    public function getProductos($numero){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }
        $productos=array();
        $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idgenero, p.idmarca, p.idproducto, p.precio, p.alta, p.foto FROM producto as p INNER JOIN marca as m
        ON p.idmarca = m.idmarca 
        INNER JOIN genero as g
         ON p.idgenero = g.idgenero WHERE p.alta = 1 ORDER BY  p.idproducto  DESC  LIMIT $desde, $hasta
         ");
        

    
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
           
            $productos[] = $filas;
        }

        return $productos;
      
    }
   


    //me traigo todos los productos filtrando por su genero
    public function getProductosGenero($genero, $numero){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }
        $genero  = $genero;
        $productos=array();
        $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idgenero, p.idmarca, p.idproducto, p.precio, p.idgenero, p.foto, p.alta FROM producto as p INNER JOIN marca as m
        ON p.idmarca = m.idmarca 
        INNER JOIN genero as g
        ON p.idgenero = g.idgenero  WHERE p.idgenero = $genero and p.alta = 1 ORDER BY p.idproducto LIMIT $desde, $hasta
        ");
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $productosGenero[] = $filas;
        }

        return $productosGenero;
    
    }



    //este metodo recoge todas las marca y las introduce en el select 
    public function getProductosMarcas(){

        $marcas=array();
        $consulta = $this->db->query("SELECT * FROM marca WHERE alta = 1 ORDER BY idmarca DESC");

        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $marcas[] = $filas;
        }

        return $marcas;
    
    }

   

//para poder filtrar por marcas y genero
    public function getProductosMarcasGenero($marca, $genero, $numero){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }

       $marca = $marca;
       $genero = $genero;
        $producto=array();
            if($genero==0){
            $consulta = ("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.idgenero, p.idmarca, p.foto, p.alta FROM producto as p INNER JOIN marca as m
            ON p.idmarca = m.idmarca 
            INNER JOIN genero as g
            ON p.idgenero = g.idgenero WHERE p.idmarca = $marca AND p.alta = 1 ORDER BY p.idproducto DESC LIMIT $desde, $hasta
            
            ");
       
            } else {


                $consulta = ("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.idgenero, p.idmarca, p.foto, p.alta FROM producto as p INNER JOIN marca as m
                ON p.idmarca = m.idmarca 
                INNER JOIN genero as g
                ON p.idgenero = g.idgenero WHERE p.idmarca = $marca AND p.idgenero = $genero AND p.alta = 1  ORDER BY p.idproducto DESC LIMIT $desde, $hasta
                
                ");

            }




            


        $consulta = $this->db->query($consulta);
            


        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $producto[] = $filas;
        }

        return $producto;

    }


    public function insertarProducto($idgenero, $idmarca, $nombre, $foto, $precio) {
        

      
    
      $consulta =  $this->db->query("INSERT INTO producto (idgenero, idmarca, nombre, foto, precio 
        ) VALUES ($idgenero, $idmarca, '$nombre', '$foto', $precio)");




    }





    public function getProductoRegistro($idregistro){
    
        $productos=array();
        $consulta = $this->db->query("SELECT p.nombre, m.nombre nombremarca, g.genero, p.idproducto, p.precio, p.idmarca, p.idgenero, p.foto, p.alta FROM producto as p INNER JOIN marca as m
        ON p.idmarca = m.idmarca 
        INNER JOIN genero as g
        ON p.idgenero = g.idgenero  WHERE p.idproducto = $idregistro AND p.alta = 1 ");



            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                    
                $productos[] = $filas;
            }
        
        return $productos;

        }





    public function editarProducto( $idgenero2, $idmarca2, $nombre2, $precio2, $idproducto ){
        
        $consulta = $this->db->query( "UPDATE producto SET
                idgenero = $idgenero2,
                idmarca = $idmarca2,
                nombre = '$nombre2',
                precio = $precio2
            WHERE idproducto = $idproducto ");
        

    }




    public function editarProductoFoto( $foto, $idgenero2, $idmarca2, $nombre2, $precio2, $idproducto ){
        
        $consulta = $this->db->query( "UPDATE producto SET
                idgenero = $idgenero2,
                idmarca = $idmarca2,
                nombre = '$nombre2',
                foto = '$foto',
                precio = $precio2
            WHERE idproducto = $idproducto ");
        

    }


    public function borrarProducto($idproducto){
        
        $consulta = $this->db->query( "UPDATE producto SET
                alta = 0
            WHERE idproducto = $idproducto ");
        

    }







}
?>



