<?php


if(@$_GET['operacion']=="editar"){?>
    <div class="form">
    <form  id="formularioanadirM" class="formuregi" enctype="multipart/form-data" method="get" acton="#">
    <h3>editar marca</h3>
    <p>nombre de marca</p><input type="text" class="field" id="nombreM" value="<?=$_GET['nombre']?>"><br>
    <input type="hidden" id="idmarcaE" value="<?=$_GET['idmarca']?>">
    <input type="hidden" id="pagM" value="<?=$_GET['pag']?>"  >
    <input class="btn btn-blue" type="button" id="editadoM" name="editadoM" value="editar">
   
    
    </form>
    </div>

 <?php } elseif(@$_GET['operacion']=="borrar") { ?>
    <div class="ttabla">
        
    <table class="dtabla">

<th>nombre</th><th>marca</th><th>borrar</th>
<?php

foreach( $marcaRegistro  as $filasRegistro){?>
    <tr>
        <td><?=$filasRegistro['idmarca']?></td><td><?=$filasRegistro['nombre']?></td>
      <td><button id="borradoM" class="btn btn-blue"  data-borraregism="<?=$filasRegistro['idmarca']?>">borrar</button></td>
    </tr> 
    <tr><td><button id="marcaV" class="btn btn-blue">cancelar y volver</button></td></tr>
    

<?php } ?>
</table>
    </div>
<?php
echo "<p class='pe'>¿seguro que desea borrar la siguiente marca?</p>";



} else { ?>






 <div class="ttabla">
 <table class="dtabla">
 <tr>
    <th> idmarca </th><th> nombre </th><th>editar</th><th> borrar </th>
 </tr>
 <?php
 foreach($matrizMarca as $filasMarca){?>
 <tr> 
     <td><?=$filasMarca['idmarca']?></td><td><?=$filasMarca['nombre']?></td>
     <td><button id="editarM" name="editarM" class="btn btn-blue">editar</button></td>
     <td><button id="borrarM"  name="borrarM" class="btn btn-blue"  data-borrarm="<?=$filasMarca['idmarca']?>"  >borrar</button></td>
 </tr>
 
 <?php } ?>

 </table>
 </div>
 <div id="paginador">
 <?php
 
 if($totalPaginas<5){
    for($i=1; $i<=$totalPaginas; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div id='enlace8' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace8' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
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
        echo "<div id='enlace8'  class ='{$activado}'  data-admin={$_GET['admin']} data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
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
        echo "<div  id='enlace8' class ='{$activado}'  data-admin={$_GET['admin']}  data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas."<br>";
?>

</div>




<form  id="formularioanadirM" class="formuregi" enctype="multipart/form-data" method="get" acton="#">
<h3>añadir marca</h3>
<p>nombre de marca</p><input type="text" class="field" id="nombreM"  ><br>
<input class="btn btn-blue" type="button" id="anadirM" name="anadirM" value="añadir marca" >

</form>


 <?php } ?>

