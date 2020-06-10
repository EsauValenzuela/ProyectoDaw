<?php
   include("modelos/conectar.php");
class carrito {
    private $idproducto = array();
  private   $nombre = array();
   private $precio = array();
   private $unidades = array();
   private $items;
   
public function __construct(){
    $this->items = 0;
    


}


 
    
    








  
   


public function anadirCarrito($id, $nom, $pre, $uni){

    $this->idproducto[$this->items] = $id;
    $this->nombre[$this->items] = $nom;
    $this->precio[$this->items] = $pre;
    $this->unidades[$this->items] = $uni;
    $this->items++;







}

public function getItems(){

    return $this->items;
}


public function mostrarCarrito(){
    $suma = 0;
    echo '<div id="tablaperfil"><table  class="tablaperfil">
    <tr>
    <th><b>Nombre </b></th>
    <th><b>precio unidad</b></th>
    <th><b> unidades</b></th>
    <th><b>precio</b></th>
    <th>eliminar</th>
    </tr>';
    for ($i=0;$i<$this->items;$i++){
       if($this->idproducto[$i]!=-1){
          echo '<tr>';
          echo "<td>" . $this->nombre[$i] . "</td>";
          echo "<td>" . $this->precio[$i] . "</td>";
          echo "<td>" . $this->unidades[$i] . "</td>";
          echo "<td>" . $this->unidades[$i]*$this->precio[$i] . "</td>";
          echo "<td><a  href='carrito.php?item=$i' class='btn btn-blue' >Eliminar producto</a></td>";
          echo '</tr>';
          $suma += $this->precio[$i]*$this->unidades[$i];
       }
    }
    //muestro el total
    echo "<tr><td><b>TOTAL:</b></td><td> <b>$suma</b></td><td> </td></tr>";
    echo "</table></div>";
} 



public function eliminarCarrito($item){

$this->idproducto[$item] = -1;

}


   public function obtenerIdProducto(){
        for ($i=0;$i<$this->items;$i++){
            if($this->idproducto[$i]!=-1){
            $idpro[] = $this->idproducto[$i];

            }
         }
        
         return $idpro;
    
    
        }

     public   function obtenerIdProductoTodos(){
                if($this->items!=0){
                    for ($i=0;$i<$this->items;$i++){
                        $idproT[] = $this->idproducto[$i];
                    }

                    return $idproT;
                } else {
                    $idproT[0] = -1;

                    return $idproT;

                }
               
            }
            
             
        
        
            


       public  function obtenerPrecio(){
            for ($i=0;$i<$this->items;$i++){
                if($this->idproducto[$i]!=-1){
                $pre[] = $this->precio[$i];
    
                }
             }
        
             return $pre;
        
        
            }



           public function obtenerUnidades(){
                for ($i=0;$i<$this->items;$i++){
                    if($this->idproducto[$i]!=-1){
                    $uni[] = $this->unidades[$i];
        
                    }
                 }
            
                 return $uni;
            
            
                }


}

?>