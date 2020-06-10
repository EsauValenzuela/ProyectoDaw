
    <div id="filtro">
<label>FILTRAR POR MARCA</label>
<?php


 $generos =  $_GET['genero']   ?>
<form id="formulario">
<select name="marcas" id="marcas">
  <?php 
  
  foreach($matrizMarca as $filasMarca){ 
 
  
  ?>
<option id="generos" data-genero="<?=$generos?>" value="<?=$filasMarca['idmarca']?>"   <?php if($_GET['marca'] == $filasMarca['idmarca']){ echo 'selected = "selected"';}?>  ><?=$filasMarca['nombre'] ?></option>

<?php } 
echo "</select>";
echo "</form>";
?>
</div>



    <div id="catalogo">

    <?php
    foreach( $matrizMarcaFiltro  as $registro){?>

        <div class = "pro">
        <img src="uploads/<?=$registro['foto']?>" width="200"
       height="100">
       <p><?=$registro['nombre']?></p>
       <p><?=$registro['nombremarca']?></p>
       <p><?=$registro['precio']." Euros"?></p>
       
       <form action="carrito.php" id="carrito"  method="post">
    <input type="hidden"  name="idproducto" value="<?=$registro['idproducto']?>">
    <input type="hidden"  name="nombre" value="<?=$registro['nombre']?>">
    <input type="hidden"  name="precio" value="<?=$registro['precio']?>">
    <select name="unidad">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>
    <input type="submit"  class="btn btn-blue" value="añadir a carrito">
        </form>
        </div>
        <?php
      



    }

?> </div>

    <div id= "paginador">
<?php
    if($totalPaginas<5){
        for($i=1; $i<=$totalPaginas; $i++){
            if($numero==$i){
    
                $activado =  "activado";
            } else{
    
                $activado =  "enlace";
            }
            echo "<div id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
            }
    } elseif($numero<=3 && $totalPaginas>=5 ){
        for($i=1; $i<=5; $i++){
            if($numero==$i){
    
                $activado =  "activado";
            } else{
    
                $activado =  "enlace";
            }
            echo "<div  id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
        }
    } elseif ($numero>3 && $numero<=$totalPaginas-2) {
        $sumando = -2;
        for($i=1; $i<=5; $i++){
            $pagina=$numero+$sumando;
            if($numero==$pagina){
    
                $activado =  "activado";
            } else{
    
                $activado =  "enlace";
            }
            echo "<div id='enlace6'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
            $sumando++;
        }
    } else {
        $sumando = -2;
        $grupoFinal = $totalPaginas - 2;
        for($i=1; $i<=5; $i++){
            $pagina=$grupoFinal+$sumando;
            if($numero==$pagina){
    
                $activado =  "activado";
            } else{
    
                $activado =  "enlace";
            }
            echo "<div  id='enlace6' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
            $sumando++;
        }
    
    
    }
    
    echo "pag ".$numero." de ".$totalPaginas."<br>";
    
 
   

    ?>
      </div>
    <div id="pie">
      
    </div>
     
</div>







    

 




