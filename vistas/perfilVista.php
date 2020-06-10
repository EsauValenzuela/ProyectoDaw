
<?php


if(@$_GET['perfil']=="editar"){

        foreach($matrizUsuario as $usuario){?>

            <form  id="formularioPerfil"  class="formuregi" method="get">
                <h3>Editar perfil</h3>
   <p>nick</p> <input type="text" id="nickP" value="<?=$usuario['nick']?>" ><br>
   <p>apellidos</p> <input type="text" id="apellidosP" value="<?=$usuario['apellidos']?>" ><br>
   <p>dni</p>  <input type="text" id="dniP" value="<?=$usuario['dni']?>" ><br>
    <p>nombre</p>  <input type="text" id="nombreP" value="<?=$usuario['nombre']?>" ><br>
    <p>telefono</p>  <input type="text" id="telefonoP" value="<?=$usuario['telefono']?>" ><br>
    <p>direccion</p>  <input type="text" id="direccionP" value="<?=$usuario['direccion']?>" ><br>
    <p>contraseña</p>  <input type="text" id="contrasenaP" value="<?=$usuario['contrasena']?>" ><br>
    <input type="hidden" id="idEditado" value="<?=$usuario['idusuario']?>">
    <p></p><input  class='btn btn-blue' type="button" id="editadoLogin" name="editadoU" value="editar usuario" >
            </form>

   <?php  
   

}


} elseif(@$_GET['perfil']=="pedido"){?>
<div class="detalle">
<h3> detalle pedido</h3>
<table  class="dtabla" id="pedidos">
<tr>
    <th>idproducto</th><th>nombre</th><th>precio unidad</th><th>unidades</th><th>precio unidades</th>
</tr>
<?php
$total = 0;
foreach( $detalle  as $registro){?>
     <tr>
        <td id="detallePerfil" data-perfil="<?=$registro['idusuario']?>"><?=$registro['idproducto']?></td><td><?=$registro['nombre']?></td>
        <td><?=$registro['precio']?></td><td><?=$registro['unidades']?></td>
        <td><?=$registro['precio']*$registro['unidades']?></td>
        <?php

            $total =  $registro['precio']*$registro['unidades'] + $total;

        ?>
    </tr>
    

<?php } ?>
<tr>
<td>total</td><td><?=$total?></td><td><b>EUROS</b></td><td><button id="volverPedido" name="volver" class="btn btn-blue"  data-volvere="<?=$_GET['numero']?>"   >volver a perfil</button></td>
</tr>
</table>
</div>



<?php } else { ?>
    <div class="perfil">
    <table class="tperfil">
<?php
foreach($matrizUsuario as $usuario){?>
<tr>
    <td   data-miperfil="<?=$usuario['idusuario']?>">nombre:</td><td>&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td><td><?=$usuario['nombre']?></td>
</tr>

<tr>
    <td >apellidos:</td><td>&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td><td><?=$usuario['apellidos']?></td>
</tr>

<tr>
    <td >dni:</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td><?=$usuario['dni']?></td>
</tr>

<tr>
    <td>direccion:</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td><?=$usuario['direccion']?></td>
</tr>

<tr>
    <td>telefono</td><td>&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td><td><?=$usuario['telefono']?></td>
</tr>

<tr>
    <td>nick:</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td><?=$usuario['nick']?></td>
</tr>
<tr>
    <td>contraseña:</td><td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp</td><td><?=$usuario['contrasena']?></td>
</tr>


<?php 

$idusuario = $usuario['idusuario'];

} 




?>

</table>
<a id="editarLogin" href="#" data-id="<?=$idusuario?>" class='btn btn-blue'>editar perfil</a>
<a href="cerrar.php"  class='btn btn-blue'>cerrar sesion</a>
</div>
<div id="tablaperfil">
<?php if(empty($facturas)==false){?>
<h3>Pedidos</h3>
<table class="tablaperfil" id="pedidos">
<tr>
    <th>Nºfactura</th><th>dni</th><th>direccion</th><th>telefono</th><th>fecha</th><th>estado</th><th>detalle</th>
</tr>
<?php
   
foreach( $facturas  as $registro){?>
     <tr>
        <td><?=$registro['idfactura']?></td><td><?=$registro['dni']?></td><td><?=$registro['direccioenvio']?></td><td><?=$registro['telefonocontacto']?></td><td><?=$registro['fecha']?></td>
        <td  data-estado=<?=$registro['estado']?>><?php if($registro['estado']==0){echo "sin enviar"; } elseif($registro['estado']==1){echo "enviado";}elseif($registro['estado']==2){echo "anulado";}?></td><td><button class="btn btn-blue" name="detalle" id="detallePedido" data-detalle="<?=$registro['idfactura']?>" class="btn btn-warning">detalle pedido</button></td>

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
        echo "<div id='enlace10' class ='{$activado}'  data-num={$numero}  data-idusuario={$idusuario} data-page1={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace10' class ='{$activado}'  data-num={$numero} data-page1={$i}>".$i."</div>";
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
        echo "<div id='enlace10'  class ='{$activado}'  data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
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
        echo "<div  id='enlace10' class ='{$activado}'   data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas."<br>";



}

}




 ?>
</div>