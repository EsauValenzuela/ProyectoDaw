<?php
        //para evitar variables indefinidas
       (!isset($_GET['genero']))?$_GET['genero']=0:$_GET['genero']=$_GET['genero'];
       (!isset($_GET['marca']))?$_GET['marca']=12:$_GET['marca']=$_GET['marca'];
       (!isset($_GET['admin']))?$_GET['admin']="":$_GET['admin']=$_GET['admin'];
        isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;

           

    if($_GET['admin']=="productos"){
        require_once("modelos/productosModelo.php");
        require_once("modelos/paginadorModelo.php");
        require_once("modelos/imagenesModelo.php");
        $producto = new productosModelo();
        $paginador = new paginador();
        $imagen = new imagenes();
        $matrizMarca = $producto->getProductosMarcas(); 
        $matrizGenero = $producto->getGeneros();
        $matrizMarcaFiltro = $producto->getProductos($numero);
        $totalPaginas = $paginador->getPaginadorProductos();
       if(!isset($_GET['operacion'])){
            require_once("vistas/adminProductosVista.php");
           
       }
            if(@$_GET['operacion']=="anadir"){
                $foto = $imagen->getSubirNombrarImagen(@$_FILES['afile']); 
                $producto->insertarProducto($_POST['idgenero'], $_POST['idmarca'], $_POST['nombre'],
                $foto, $_POST['precio'] ); 
                $matrizMarcaFiltro = $producto->getProductos($numero);
               $totalPaginas = $paginador->getPaginadorProductos();
                require_once("vistas/adminProductosVista.php");
               
            } elseif(@$_GET['operacion']=="mostrar") {

                if($_GET['marca']==12){
                    $matrizMarcaFiltro = $producto->getProductos($numero);
                   $totalPaginas = $paginador->getPaginadorProductos(); 
                   
                    require_once("vistas/adminProductosVista.php");
                    

                    
                    } else {
                        $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_GET['marca'], $_GET['genero'], $numero);
                        $totalPaginas = $paginador->getPaginadorProductosMarcasGenero($_GET['marca'], $_GET['genero']);
                        require_once("vistas/adminProductosVista.php");
                       
                }




            }  elseif(@$_GET['operacion']=="editar"){
               $productoR = $producto->getProductoRegistro($_GET['idproducto']);  
               require_once("vistas/adminProductosVista.php");
            

            
            
            } elseif(@$_GET['operacion']=="editado") {
                if(isset($_FILES['afile2'])){
                  $foto =  $imagen->getSubirNombrarImagenEditar(@$_FILES['afile2']);
                  $producto->editarProductoFoto($foto, $_POST['idgenero2'], $_POST['idmarca2'], $_POST['nombre2'], $_POST['precio2'], $_POST['idproducto2'] );
                    if($_POST['idmarcaControl']==12){
                        $matrizMarcaFiltro = $producto->getProductos($_POST['pag']);
                        $totalPaginas = $paginador->getPaginadorProductos();
                        require_once("vistas/adminProductosVista.php"); 
                    } else {
                        $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_POST['idmarca2'], 0, $_POST['pag']); 
                        $totalPaginas = $paginador->getPaginadorProductos(); 
                        require_once("vistas/adminProductosVista.php");
                        
                    }
                  
                  require_once("vistas/adminProductosVista.php");
                } else {
                    
                        $producto->editarProducto($_POST['idgenero2'], $_POST['idmarca2'], $_POST['nombre2'], $_POST['precio2'], $_POST['idproducto2']);
                        if($_POST['idmarcaControl']==12){
                            $matrizMarcaFiltro = $producto->getProductos($_POST['pag']);
                            $totalPaginas = $paginador->getPaginadorProductos();   
                            require_once("vistas/adminProductosVista.php"); 
                        } else {
                        $matrizMarcaFiltro = $producto->getProductosMarcasGenero($_POST['idmarca2'], 0, $_POST['pag']); 
                        $totalPaginas = $paginador->getPaginadorProductos(); 
                        require_once("vistas/adminProductosVista.php");

                        }
              
                    } 


                
            } elseif(@$_GET['operacion']=="borrar"){

            $productoRegistro = $producto->getProductoRegistro($_GET['idproducto']);
                require_once("vistas/adminProductosVista.php");

            }  elseif(@$_GET['operacion']=="borrado"){
                $producto->borrarProducto($_GET['idproducto']);
                $matrizMarcaFiltro = $producto->getProductos($numero);
                $totalPaginas = $paginador->getPaginadorProductos(); 
                require_once("vistas/adminProductosVista.php");
            }    
                
           



       


    } elseif ($_GET['admin']=="marcas") {
        require_once("modelos/marcasModelo.php");
        require_once("modelos/paginadorModelo.php");
        $marcas = new marcas();
        $paginador = new paginador();
        $matrizMarca = $marcas->getMarcas($numero);
        $totalPaginas = $paginador->getPaginadorMarcas();
       

        if(!isset($_GET['operacion'])){
            require_once("vistas/marcasVista.php");
           
       }
          
            if(@$_GET['operacion']=="anadir"){
                $marcas->anadirMarca($_POST['nombre']);
                $matrizMarca = $marcas->getMarcas($numero);
                $totalPaginas = $paginador->getPaginadorMarcas();
                require_once("vistas/marcasVista.php");

            } elseif (@$_GET['operacion']=="editar") {
                require_once("vistas/marcasVista.php");
            
            
            
            } elseif (@$_GET['operacion']=="editado") {
                $marcas->editarMarca($_POST['idmarca'], $_POST['nombre']);
                $matrizMarca = $marcas->getMarcas($_POST['pag']);
                $totalPaginas = $paginador->getPaginadorMarcas();
                require_once("vistas/marcasVista.php");
           
            } elseif (@$_GET['operacion']=="borrar"){
                $marcaRegistro = $marcas->getMarcaRegistro($_GET['idmarca']);
                require_once("vistas/marcasVista.php");
            
            } elseif (@$_GET['operacion']=="borrado") {
                $marcas->borrarMarca($_GET['idmarca']);
                $matrizMarca = $marcas->getMarcas($numero);
                $totalPaginas = $paginador->getPaginadorMarcas();
                require_once("vistas/marcasVista.php");
            }



        
    } elseif ($_GET['admin']=="usuarios") {
        require_once("modelos/usuariosModelo.php");
        require_once("modelos/paginadorModelo.php");
        $usuarios = new usuarios();
        $paginador = new paginador();
        $matrizUsuario = $usuarios->getUsuarios($numero);
        $totalPaginas = $paginador->getPaginadorUsuarios();
        if(!isset($_GET['operacion'])){
            require_once("vistas/adminUsuariosVista.php");
           
       }
    
        

            if(@$_GET['operacion']=="editar"){
              
               require_once("vistas/adminUsuariosVista.php");

            } elseif(@$_GET['operacion']=="editado"){
                $usuarios->editarUsuario($_POST['idusuario'], $_POST['nick'] , $_POST['apellidos'], $_POST['dni'], $_POST['nivel'], 
                $_POST['nombre'], $_POST['telefono'], $_POST['direccion'], $_POST['mail'], $_POST['contrasena'] );
                $matrizUsuario = $usuarios->getUsuarios($_POST['pag']);
                $totalPaginas = $paginador->getPaginadorUsuarios();
                require_once("vistas/adminUsuariosVista.php");
                
               

            } elseif (@$_GET['operacion']=="borrar") {
               $usuarioRegistro = $usuarios->getUsuarioRegistro($_GET['idusuario']);
               require_once("vistas/adminUsuariosVista.php");
           
            } elseif (@$_GET['operacion']=="borrado") {
                $usuarios->borrarUsuario($_GET['idusuario']);
                $matrizUsuario = $usuarios->getUsuarios($numero);
                $totalPaginas = $paginador->getPaginadorUsuarios();
                require_once("vistas/adminUsuariosVista.php");
            }
            
        
    } elseif ($_GET['admin']=="pedidos") {
        require_once("modelos/pedidosModelo.php");
        require_once("modelos/paginadorModelo.php");
        $pedidos = new pedidos();
        $paginador = new paginador();
        $facturas = $pedidos->getPedidos($numero);
        $totalPaginas = $paginador->getPaginadorPedidos();
        if(!isset($_GET['operacion'])){
            require_once("vistas/adminPedidosVista.php");
        }


        if(@$_GET['operacion']=="detalle"){

           $detalle = $pedidos->getPedidoDetalle($_GET["idpedido"]);
            require_once("vistas/adminPedidosVista.php");

        } elseif(@$_GET['operacion']=="volver") {

            $facturas = $pedidos->getPedidos(@$_GET['numero']);
            require_once("vistas/adminPedidosVista.php");



        

        } elseif (@$_GET['operacion']=="gestionar") {
            
            require_once("vistas/adminPedidosVista.php");

        
        } elseif(@$_GET['operacion']=="gestionado"){

            $pedidos->gestionPedido($_GET['idpedido'], $_GET['estado']);
            $facturas = $pedidos->getPedidos(@$_GET['numero']);
            require_once("vistas/adminPedidosVista.php");

        }
        



    } else {

        require_once("vistas/adminPrincipal.php");




    }






    






?>