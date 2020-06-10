
<?php


if(@$_GET['operacion']=="editar"){
   
 $generos =  $_GET['genero'];  
 ?>
    <div class="col-md-6 col-md-offset-5">
    <form  id="formularioeditar" class="formuregi" enctype="multipart/form-data" method="get" action="#">
    <h3>editar producto</h3>
    <p>genero:</p>
    <select name="generos16" class="field" id="generos3">
    <?php 
            foreach($matrizGenero as $filasGenero){ ?>
    <option id="generos" data-genero="<?=$generos?>" value="<?=$filasGenero['idgenero']?>" <?php if($filasGenero['idgenero']==$_GET['idgenero']){  echo 'selected = "selected"'; } ?>><?=$filasGenero['genero'] ?></option>
    <?php } ?> 
    </select><br>
   <p> marca:</p>
    <select class="field" name="marcas2" id="marcas2">
    <?php   foreach($matrizMarca as $filasMarca){ ?>
    
    <option id="generos2"  data-id=<?=$_GET['idproducto']?>    data-genero="<?=$generos?>" value="<?=$filasMarca['idmarca']?>" <?php if($filasMarca['idmarca']==$_GET['idmarca']){  echo 'selected = "selected"'; } ?> ><?=$filasMarca['nombre'] ?></option>
    <?php } 
    
    ?>
   </select><br>
        <p>nombre:</p> <input  type="text" class="field" id="nombre2" name="nombre"  value="<?=$_GET['nombre'] ?>"   required/><br>
    <br>
    <p>foto</p>  <input type="file" class="field" id="afile2" name="afile2"   /><br>
    <p>precio</p>  <input type="number"  class="field"id="precio2" value="<?=$_GET['precio']?>"  step="any"  /><br>
    <input type="hidden" id="id2" value="<?=$_GET['idproducto']?>"/><br>
    <input type="hidden" id="pag" value="<?=$_GET['pag']?>">
    <input type="hidden" id="idmarcaControl" value="<?=$_GET['idmarcaControl']?>">
            <input class="btn btn-blue" type="button" id="editado" name="editado" value="editar producto" >
    </form>
</div>



<?php
        
} elseif(@$_GET['operacion']=="borrar") {?>
    
    <table class="dtabla">

        <th>nombre</th><th>marca</th><th>genero</th><th>precio</th><th>borrar</th>
        <?php

        foreach( $productoRegistro  as $filasRegistro){?>
            <tr>
                <td><?=$filasRegistro['nombre']?></td><td><?=$filasRegistro['nombremarca']?></td><td><?=$filasRegistro['genero']?></td>
                <td><?=$filasRegistro['precio']?></td><td><button id="borrarR" class="btn btn-blue"  data-borraregis="<?=$filasRegistro['idproducto']?>">borrar</button></td>
                <tr><td><button  class="btn btn-blue" id="volverP">cancelar y volver</button></td></tr>
            </tr>
            

        <?php } ?>
</table>

<?php
echo "<p class='pe'>¿seguro que desea borrar el siguiente producto?</p>";



} else {


 if ($_GET['admin']=="productos"){
 $generos =  $_GET['genero'];   ?>
 <div class="ttabla">
 <label>filtrar por marcas</label>
<form id="formulario">
<select name="marcas1" id="marcas1"  data-admin="<?=$_GET['admin']?>">
  <?php 
  
  foreach($matrizMarca as $filasMarca){ 
 
  
  ?>
<option id="generos1" data-generos1="<?=$generos?>" value="<?=$filasMarca['idmarca']?>"   <?php if($_GET['marca'] == $filasMarca['idmarca']){ echo 'selected = "selected"';}?>  ><?=$filasMarca['nombre'] ?></option>

<?php } 
echo "</select>";
echo "</form>";

  }
?>
</div>


<div class="ttabla">
<table class="dtabla" id="produc">
<tr>
    <th>nombre</th><th>marca</th><th>genero</th><th>precio</th><th>editar</th><th>borrar</th>
</tr>
<?php

foreach( $matrizMarcaFiltro  as $registro){?>
     <tr>
        <td style="display: none;"><?=$registro['idmarca']?></td><td style="display : none;" ><?=$registro['idgenero']?></td>
        <td><?=$registro['nombre']?></td><td><?=$registro['nombremarca']?></td><td><?=$registro['genero']?></td>
        <td><?=$registro['precio']?></td><td><button name="editarB" id="editarB" data-editarboton="<?=$registro['idproducto']?>" class="btn btn-blue">editar</button></td>
        <td><button id="borrarB" name="borrarB" class="btn btn-blue"  data-borrarbotonp="<?=$registro['idproducto']?>">borrar</button></td>
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
        echo "<div id='enlace5' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace5' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
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
        echo "<div id='enlace5'  class ='{$activado}'  data-admin={$_GET['admin']} data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
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
        echo "<div  id='enlace5' class ='{$activado}'  data-admin={$_GET['admin']}  data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas."<br>";











?>

</div>







 


<!--a partir de aquí formu produccion-->

    <form  id="formularioanadir" class="formuregi" enctype="multipart/form-data" method="get" acton="#">
    <h3>Añadir producto</h3>
    <p>genero:</p>
    <select name="generos16" class="field" id="generos16">
    <?php foreach($matrizGenero as $filasGenero){ ?>
    
    <option id="generos4" data-genero="<?=$generos?>" value="<?=$filasGenero['idgenero']?>"  ><?=$filasGenero['genero'] ?></option>
    <?php } ?> 
    </select><br>
    <p>marca:</p>
    <select class="field" name="marcas" id="marcas4">
    <?php foreach($matrizMarca as $filasMarca){ ?>
    
    <option id="generos4" data-genero="<?=$generos?>" value="<?=$filasMarca['idmarca']?>"  ><?=$filasMarca['nombre'] ?></option>
    <?php } 
    
    ?>
   </select><br>
   <p> nombre:</p> <input class="field" type="text" id="nombre" name="nombre"  value=""  required/><br>
    <br>
    <p>foto</p>  <input type="file" class="field" id="afile" name="afile"   /><br>
    <p>precio</p>  <input type="number"  class="field" id="precio"  step="any"  /><br>
            <input class="btn btn-blue" type="button" id="anadir" name="anadir" value="añadir producto" >
    </form>


<?php } 
    
    ?>

