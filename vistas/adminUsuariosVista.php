<?php 
if(@$_GET['operacion']=="editar"){?>


 <form  id="formularioEditarU" class="formuregi" enctype="multipart/form-data" method="get">
   <h3>editar usuario</h3>
 <p>nick</p> <input type="text" class="field" id="nickU" value="<?=$_GET['nick']?>" ><br>
   <p>apellidos</p> <input type="text" class="field" id="apellidosU" value="<?=$_GET['apellidos']?>" ><br>
   <p>dni</p>  <input type="text" class="field" id="dniU" value="<?=$_GET['dni']?>" ><br>
   <p>nivel o roll</p>   <select name="nivel" id="nivelU"> 
        <option value="0" <?php if($_GET['nivel'] == "sin" ) { echo 'selected = "selected"';  }?>>usuario sin activar</option>
        <option value="1"  <?php if($_GET['nivel'] == "alta" ) { echo 'selected = "selected"';  }?>>usuario activado</option>
        <option value="2"  <?php if($_GET['nivel'] == "admi" ) { echo 'selected = "selected"';  }?>>usuario administrador</option>
    </select><br>
    <p>nombre</p>  <input type="text" class="field" id="nombreU" value="<?=$_GET['nombre']?>" ><br>
    <p>telefono</p>  <input type="text"  class="field" id="telefonoU" value="<?=$_GET['telefono']?>" ><br>
    <p>direccion</p>  <input type="text" class="field" id="direccionU" value="<?=$_GET['direccion']?>" ><br>
    <p>mail</p>  <input type="text" class="field" id="mailU" value="<?=$_GET['mail']?>" ><br>
    <p>contraseña</p>  <input type="text" class="field" id="contrasenaU" value="<?=$_GET['contrasena']?>" ><br>
    <input type="hidden" id="idusuarioU" value="<?=$_GET['idusuario']?>">
    <input type="hidden" id="pagU" value="<?=$_GET['pag']?>">
    <input class="btn btn-blue" type="button" id="editadoU" name="editadoU" value="editar usuario" >
</form>
 <?php } elseif(@$_GET['operacion']=="borrar") { ?>
    <table class="dtabla">

<th>nombre</th><th>apellidos</th><th>dni</th><th>nick</th><th>idusuario</th><th>borrar</th>
<?php

foreach( $usuarioRegistro  as $filasRegistro){?>
    <tr>
        <td><?=$filasRegistro['nombre']?></td><td><?=$filasRegistro['apellidos']?></td><td><?=$filasRegistro['dni']?></td><td><?=$filasRegistro['nick']?></td>
        <td><?=$filasRegistro['idusuario']?></td><td><button id="borradou" class="btn btn-blue"  data-borraregisu="<?=$filasRegistro['idusuario']?>">borrar</button></td>
    </tr>
    <tr><td><button id="borrarV" class="btn btn-blue">cancelar y volver</button></td></tr>
    

<?php } ?>
</table>

<?php
echo "<p class='pe'>¿seguro que desea borrar al siguiente usuario?</p>";




} else { ?>




<div class="ttabla">
    <table class="dtabla">
    <tr>
       <th> nombre </th><th> dni </th>
        <th> nick </th><th> mail </th><th>tipo de usuario<th> editar </th><th> borrar </th>
    </tr>
    <?php
    foreach($matrizUsuario as $filasUsuario){?>
    <tr> 
        <td style="display:none;"><?=$filasUsuario['idusuario']?></td><td><?=$filasUsuario['nombre']?></td><td style="display:none;"><?=$filasUsuario['apellidos']?></td>
        <td ><?=$filasUsuario['dni']?></td><td style="display:none;"><?=$filasUsuario['direccion']?></td><td style="display:none;"><?=$filasUsuario['telefono']?></td>
        <td><?=$filasUsuario['nick']?></td><td><?=$filasUsuario['mail']?></td><td style="display:none;"><?=$filasUsuario['contrasena']?></td>
        <td><?php if($filasUsuario['nivel']==0){echo "sin";}
                  elseif($filasUsuario['nivel']==1){echo "alta";}
                  elseif($filasUsuario['nivel']==2){echo "admi";}?></td><td style="display:none;"><?=$filasUsuario['alta']?></td>
        <td><button id="editarU" name="editarU" class="btn btn-blue"  data-editaru="<?=$filasUsuario['idusuario']?>"  >editar</button></td>
        <td><button id="borrarU"  name="borrarU" class="btn btn-blue"  data-borraru="<?=$filasUsuario['idusuario']?>"  >borrar</button></td>
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
         echo "<div id='enlace7' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
         }
 } elseif($numero<=3 && $totalPaginas>=5 ){
     for($i=1; $i<=5; $i++){
         if($numero==$i){
 
             $activado =  "activado";
         } else{
 
             $activado =  "enlace";
         }
         echo "<div  id='enlace7' class ='{$activado}' data-admin={$_GET['admin']} data-num={$numero} data-page1={$i}>".$i."</div>";
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
         echo "<div id='enlace7'  class ='{$activado}'  data-admin={$_GET['admin']} data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
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
         echo "<div  id='enlace7' class ='{$activado}'  data-admin={$_GET['admin']}  data-num={$numero} data-page1={$pagina}>".$pagina."</div>";
         $sumando++;
     }
 
 
 }
 
 echo "pag ".$numero." de ".$totalPaginas;


}
?>
</div>