<?php
if(@$_GET['operacion']=="detalle"){ ?>

    <div class="ttabla">
<table class="dtabla" id="pedidos">
<tr>
    <th>idproducto</th><th>nombre</th><th>precio unidad</th><th>unidades</th><th>precio unidades</th>
</tr>
<?php
$total = 0;
foreach( $detalle  as $registro){?>
     <tr>
        <td><?=$registro['idproducto']?></td><td><?=$registro['nombre']?></td>
        <td><?=$registro['precio']?></td><td><?=$registro['unidades']?></td>
        <td><?=$registro['precio']*$registro['unidades']?></td>
        <?php

            $total =  $registro['precio']*$registro['unidades'] + $total;

        ?>
    </tr>
    

<?php } ?>
<tr>
<td>total</td><td><?=$total?></td><td><b>EUROS</b></td><td><button id="volver" name="volver" class="btn btn-blue"  data-volver="<?=$_GET['numero']?>">volver a pedido</button></td>
</tr>
</table>
    </div>


 <?php 



    
} elseif(@$_GET['operacion']=="gestionar"){ ?>
    <div class="ttabla">
<table  class="dtabla">
   <tr>
       <th>idpedido</th>
       <th>fecha</th>
   </tr>
   <tr id="desde">
       <td><?=$_GET['idpedido']?></td>
       <td id="pagp" data-pagp=<?=$_GET['pag']?>><?=$_GET['fecha']?></td>
     
       
   </tr>
</table>
    </div>
    <div class="form">
    <form class="formuregi">
    <h3>gestionar pedido </h3>
    <select name="select" class="field" id="estado">
    <option value=<?php if($_GET['estado']==0){ echo "0  selected";} else {echo "0";}?>>sin enviar</option> 
    <option value=<?php if($_GET['estado']==1){ echo "1  selected";} else {echo "1";}?>>enviado</option>
    <option value=<?php if($_GET['estado']==2){ echo "2  selected";} else {echo "2";}?>>anulado</option>
  </select>
  
  </form>
  <div class="bot"><button id="volverPe" class="btn btn-blue">volver pedidos</button></div>
  
        </div>
<?php

} else {



?>

    <div class="ttabla">
<table class="dtabla" id="pedidos">
<tr>
    <th>Nºfactura</th><th>dni</th><th>direccion</th><th>telefono</th><th>fecha</th><th>estado</th><th>detalle</th><th>gestionar</th>
</tr>
<?php

foreach( $facturas  as $registro){?>
     <tr>
        <td><?=$registro['idfactura']?></td><td><?=$registro['dni']?></td>
        <td><?=$registro['direccioenvio']?></td><td><?=$registro['telefonocontacto']?></td><td><?=$registro['fecha']?></td>
        <td  data-estado=<?=$registro['estado']?>><?php if($registro['estado']==0){echo "sin enviar"; } elseif($registro['estado']==1){echo "enviado";}elseif($registro['estado']==2){echo "anulado";}?></td><td><button name="detalle" id="detalle" data-detalle="<?=$registro['idfactura']?>" class="btn btn-blue">detalle pedido</button></td>
        <td><button id="gestion" name="gestion" class="btn btn-blue"  data-gestion="<?=$registro['estado']?>">gestionar pedido</button></td>
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
        echo "<div id='enlace9' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace9' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
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
        echo "<div id='enlace9'  class ='{$activado}'  data-admin={$_GET['admin']} data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
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
        echo "<div  id='enlace9' class ='{$activado}'  data-admin={$_GET['admin']}  data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas."<br>";



}

?>
</div>




