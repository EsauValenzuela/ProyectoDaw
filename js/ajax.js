$(document).ready(function(){





 //ajax para productos por marca y genero
$(document).on("change","#marcas",function(){
        $.get("productosControladorAjax.php", {
                    "marca":$("#marcas").val(),
                    "genero":$("#generos").data("genero"),

                },function(data){
                    $("#contenido").html(data);

                    
                      
            });
    
        });


        //ajax para productos paginacion
   $(document).on("click", "#enlace6",  function (){	
        paginas = $(this).data("page");   
         marcas = $("#marcas").val();
         generos = $("#generos").data("genero");
         $.ajax({
             url:"productosControladorAjax.php",
             type:"get",
             data:{numero:paginas,
                marca:marcas,
                genero:generos,

             },
             success: function(data){
                 $("#contenido").html(data);
             }
         });
         
         
         
         
        
     
     });


     //ajax para admin productos
     $(document).on("change","#marcas1",function(){
        $.get("adminControladorAjax.php", {
                    "marca":$("#marcas1").val(),
                    "genero":$("#generos1").data("generos1"),
                    "admin":$("#marcas1").data("admin"),
                    "operacion":"mostrar",
                    
                    
                },
                
            
                function (data){
                    
                    $("#contenidoAdmin").html(data);

                    
                      
            });
            
        });
        //ajax admin paginador
     $(document).on("click", "#enlace5",  function (){	
        paginas = $(this).data("page1");   
         marcas = $("#marcas1").val();
         operacion = "mostrar";
        // generos = $("#generos").data("genero");
         admin = $(this).data("admin");
         $.ajax({
             url:"adminControladorAjax.php",
             type:"get",
             data:{numero:paginas, 
                marca:marcas, 
                //genero:generos,
                admin:admin,
                operacion:operacion,
             },
             success: function(data){
                 $("#contenidoAdmin").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacion*/


  

     //subir foto y datos de formulario para insert into de productos.
     $(document).on("click", "#anadir", function() {	
        var file_data = $('#afile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('afile', file_data);
        form_data.append('idgenero', $("#generos16").val());
        form_data.append('idmarca', $("#marcas4").val());
        form_data.append('nombre', $("#nombre").val());
        form_data.append('precio', $("#precio").val()); 
        
        $.ajax({
            url: 'adminControladorAjax.php?admin=productos&operacion=anadir', 
            type: 'post',
            dataType: 'html',
            data: form_data,                      
            processData:false,
            cache:false,
            contentType: false,
            success: function(data, textStatus, jqXHR){
              $("#contenidoAdmin").html(data);
               
               
            }
            
         });    
    });


    //ediatr producto  boton admin
        $(document).on('click', 'button[name="editarB"]', function(){

             fila = $(this).closest("tr");
    
             idmarca= fila.find("td:eq(0)").text(); 
             idgenero= fila.find("td:eq(1)").text(); 
             nombre = fila.find("td:eq(2)").text(); 
             precio =  fila.find("td:eq(5)").text(); 
       id = $(this).data("editarboton");  
        operacion = "editar";
        admin = "productos";
        pag = $(".activado").data("num");
        idmarcaControl = $("#marcas1").val();
        
           
        $.ajax({
            url: 'adminControladorAjax.php', 
            type: 'get',
            dataType: 'html',
            data:{ admin:admin, operacion:operacion,  idproducto:id, nombre:nombre,
            idmarca:idmarca, idgenero:idgenero, precio:precio, pag:pag, idmarcaControl:idmarcaControl, },                      
            success: function(data){
               
                $("#contenidoAdmin").html(data);
               
            }
            
         });    
    });




    //editar producto formulario admin
   $(document).on("click", "#editado", function() {	
        var file_data = $('#afile2').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('afile2', file_data);
        form_data.append('idgenero2', $("#generos3").val());
        form_data.append('idmarca2', $("#marcas2").val());
        form_data.append('nombre2', $("#nombre2").val());
        form_data.append('precio2', $("#precio2").val());
        form_data.append('idproducto2', $("#id2").val());
        form_data.append('pag', $("#pag").val());
        form_data.append('idmarcaControl', $("#idmarcaControl").val());

       
        $.ajax({
            url: 'adminControladorAjax.php?admin=productos&operacion=editado', 
            type: 'post',
            dataType: 'html',
            data: form_data,                        
            processData:false,
            cache:false,
            contentType: false,
            success: function(data, textStatus, jqXHR){
                $("#contenidoAdmin").html(data);
                
               
            }
            
         });    
    });
    

    //borrar producto admin boton 
    $(document).on("click", 'button[name="borrarB"]', function(){
        id = $(this).data("borrarbotonp");
        admin = "productos";
        operacion  =  "borrar";
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin, operacion:operacion, idproducto:id,},
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });

    //borrado definitivo admin producto
    $(document).on("click", "#borrarR", function(){
        id = $(this).data("borraregis");
        admin = "productos";
        operacion  =  "borrado";
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin, operacion:operacion, idproducto:id,},
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });   

    //botón volver por no borrar producto
    $(document).on("click", "#volverP", function(){
        admin = "productos";
     
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin,},
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });




    //paginador usuarios
    $(document).on("click", "#enlace7",  function (){	
        paginas = $(this).data("page1");   
         
         admin = $(this).data("admin");
         $.ajax({
             url:"adminControladorAjax.php",
             type:"get",
             data:{numero:paginas, 
                admin:admin,
             },
             success: function(data){
                 $("#contenidoAdmin").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacion*/








    
     //editar  usuario boton admin
     $(document).on("click", "button[name='editarU']", function(){	
        
        fila = $(this).closest("tr");
    
             idusuario = fila.find("td:eq(0)").text(); 
             nombre = fila.find("td:eq(1)").text(); 
             apellidos = fila.find("td:eq(2)").text(); 
             dni =  fila.find("td:eq(3)").text(); 
             direccion =  fila.find("td:eq(4)").text(); 
             telefono =  fila.find("td:eq(5)").text(); 
             nick =  fila.find("td:eq(6)").text(); 
             mail =  fila.find("td:eq(7)").text(); 
             contrasena = fila.find("td:eq(8)").text(); 
             nivel = fila.find("td:eq(9)").text(); 
             alta = fila.find("td:eq(10)").text();
             operacion = "editar";
             admin = "usuarios";
             pag = $(".activado").data("num");
       
        $.ajax({
            url: 'adminControladorAjax.php', 
            type: 'get',
            dataType: 'html',
            data:{ admin:admin, operacion:operacion,  idusuario:idusuario, nombre:nombre,
                apellidos:apellidos, dni:dni, direccion:direccion, telefono:telefono, nick:nick,
            mail:mail, contrasena:contrasena, nivel:nivel, alta:alta, pag:pag,  },                      
            success: function(data){
           
                $("#contenidoAdmin").html(data);
               
            }
            
         });    
    });



    //editar formulario usuario boton admin
    $(document).on("click", "#editadoU", function() {	
        var form_data = new FormData();                  
        form_data.append('idusuario', $("#idusuarioU").val());
        form_data.append('nick', $("#nickU").val());
        form_data.append('apellidos', $("#apellidosU").val());
        form_data.append('dni', $("#dniU").val());
        form_data.append('nivel', $("#nivelU").val());
        form_data.append('nombre', $("#nombreU").val());
        form_data.append('telefono', $("#telefonoU").val());
        form_data.append('direccion', $("#direccionU").val());
        form_data.append('mail', $("#mailU").val());
        form_data.append('contrasena', $("#contrasenaU").val());
        form_data.append('pag', $("#pagU").val());


       
        $.ajax({
            url: 'adminControladorAjax.php?admin=usuarios&operacion=editado', 
            type: 'post',
            dataType: 'html',
            data: form_data,                        
            processData:false,
            cache:false,
            contentType: false,
            success: function(data, textStatus, jqXHR){
                $("#contenidoAdmin").html(data);
                
               
            }
            
         });    
    });
    
  //elegir registro para borrar usuario
    $(document).on("click", 'button[name="borrarU"]', function(){
        id = $(this).data("borraru");
        admin = "usuarios";
        operacion  =  "borrar";
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin, operacion:operacion, idusuario:id,},
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });

    //borrado de registro usuario
    $(document).on("click", "#borradou", function(){
        id = $(this).data("borraregisu");
        admin = "usuarios";
        operacion  =  "borrado";
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin, operacion:operacion, idusuario:id,},
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });

    //volver por no borrar usuario
    $(document).on("click", "#borrarV", function(){
        admin = "usuarios";
        $.ajax({
            url: 'adminControladorAjax.php',
            type:'get',
            dataType: 'html',
            data:{admin:admin, },
            success: function(data){
                $("#contenidoAdmin").html(data);
            }
        });
    });


    //paginacion marcas
    $(document).on("click", "#enlace8",  function (){	
        paginas = $(this).data("page1");   
         
         admin = $(this).data("admin");
         $.ajax({
             url:"adminControladorAjax.php",
             type:"get",
             data:{numero:paginas, 
                admin:admin,
             },
             success: function(data){
                 $("#contenidoAdmin").html(data);
             }
         });
     
     });


     //añadir marca
     $(document).on("click", "#anadirM", function() {	
        var form_data = new FormData();  
        form_data.append('nombre', $("#nombreM").val()); 
        
        $.ajax({
            url: 'adminControladorAjax.php?admin=marcas&operacion=anadir', 
            type: 'post',
            dataType: 'html',
            data: form_data,                      
            processData:false,
            cache:false,
            contentType: false,
            success: function(data, textStatus, jqXHR){
                $("#contenidoAdmin").html(data);
               
               
            }
            
         });    
    });

    //editar marca
    $(document).on("click", "button[name='editarM']", function(){	
        
        fila = $(this).closest("tr");
             idmarca = fila.find("td:eq(0)").text();
             nombre = fila.find("td:eq(1)").text(); 
             admin = "marcas";
             operacion = "editar";
             pag = $(".activado").data("num");
       
       
        $.ajax({
            url: 'adminControladorAjax.php', 
            type: 'get',
            dataType: 'html',
            data:{ admin:admin, operacion:operacion, idmarca:idmarca, nombre:nombre, pag:pag,  },                      
            success: function(data){
           
                $("#contenidoAdmin").html(data);
               
            }
            
         });    
    });

 //terminar editado marca
 $(document).on("click", "#editadoM", function() {	
    var form_data = new FormData();                  
    form_data.append('idmarca', $("#idmarcaE").val());
    form_data.append('nombre', $("#nombreM").val());
    form_data.append('pag', $("#pagM").val());
   

   
    $.ajax({
        url: 'adminControladorAjax.php?admin=marcas&operacion=editado', 
        type: 'post',
        dataType: 'html',
        data: form_data,                        
        processData:false,
        cache:false,
        contentType: false,
        success: function(data, textStatus, jqXHR){
            $("#contenidoAdmin").html(data);
            
           
        }
        
     });    
});

//elegir registro para borrar marca
$(document).on("click", 'button[name="borrarM"]', function(){
    id = $(this).data("borrarm");
    admin = "marcas";
    operacion  =  "borrar";
    $.ajax({
        url: 'adminControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{admin:admin, operacion:operacion, idmarca:id,},
        success: function(data){
            $("#contenidoAdmin").html(data);
        }
    });
});

//borrado de marca
$(document).on("click", "#borradoM", function(){
    id = $(this).data("borraregism");
    admin = "marcas";
    operacion  =  "borrado";
    $.ajax({
        url: 'adminControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{admin:admin, operacion:operacion, idmarca:id,},
        success: function(data){
            $("#contenidoAdmin").html(data);
        }
    });
});

//volver atrás por no borrar marca
$(document).on("click", "#marcaV", function(){
    admin = "marcas";
    $.ajax({
        url: 'adminControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{admin:admin, },
        success: function(data){
            $("#contenidoAdmin").html(data);
        }
    });
});

//   ----- pedidos------------

//paginador pedidos
$(document).on("click", "#enlace9",  function (){	
    paginas = $(this).data("page1");   
     admin = "pedidos";
      
     $.ajax({
         url:"adminControladorAjax.php",
         type:"get",
         data:{numero:paginas, admin:admin, 
         },
         success: function(data){
             $("#contenidoAdmin").html(data);
         }
     });
 
 });
  
 //detalle pedidos
 $(document).on("click", "#detalle", function(){
    id = $(this).data("detalle");
    admin = "pedidos";
    operacion  =  "detalle";
    pag = $(".activado").data("num");
    $.ajax({
        url: 'adminControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{admin:admin, operacion:operacion, idpedido:id, numero:pag,},
        success: function(data){
            $("#contenidoAdmin").html(data);
        }
    });
});


//volver a pedido
$(document).on("click", "#volver", function(){
    pag = $(this).data("volver");
    admin = "pedidos";
    operacion = "volver";
    $.ajax({
        url: 'adminControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{admin:admin, operacion:operacion, numero:pag,},
        success: function(data){
            $("#contenidoAdmin").html(data);
        }
    });
});






//gestion pedidos
$(document).on("click", "#gestion", function(){	
        
    fila = $(this).closest("tr");
         idpedido = fila.find("td:eq(0)").text();
         fecha = fila.find("td:eq(4)").text(); 
         estado = $(this).data("gestion");
         admin = "pedidos";
         operacion = "gestionar";
         pag = $(".activado").data("num");
        
   
    $.ajax({
        url: 'adminControladorAjax.php', 
        type: 'get',
        dataType: 'html',
        data:{ admin:admin, operacion:operacion, idpedido:idpedido, fecha:fecha, estado:estado, pag:pag,  },                      
        success: function(data){
       
            $("#contenidoAdmin").html(data);
           
        }
        
     });    
});




//volver de gestion
$(document).on("change","#estado",function(){


    fila = $("#desde").closest("tr");
    idpedido = fila.find("td:eq(0)").text();
    estado = $("#estado").val();
    admin = "pedidos";
    operacion = "gestionado";
    pag =  $("td:eq(1)").data("pagp");
   

$.ajax({
   url: 'adminControladorAjax.php', 
   type: 'get',
   dataType: 'html',
   data:{ admin:admin, operacion:operacion, idpedido:idpedido, estado:estado,  numero:pag,  },                      
   success: function(data){
  
       $("#contenidoAdmin").html(data);
      
   }
   
    });    
    

});

//boton volver pedido admisnistrador

$(document).on("click","#volverPe",function(){


    fila = $("#desde").closest("tr");
    idusuario = fila.find("td:eq(0)").data("id");
    idpedido = fila.find("td:eq(0)").text();
    estado = $("#estadoP").val();
    admin = "pedidos";
    perfil = "gestionado";
    pag =  $("td:eq(1)").data("pagp");
    
   

$.ajax({
   url: 'adminControladorAjax.php', 
   type: 'get',
   dataType: 'html',
   data:{ admin:admin, perfil:perfil, idpedido:idpedido, idusuario:idusuario, estado:estado,  numero:pag,  },                      
   success: function(data){
  
       $("#contenidoAdmin").html(data);
      
   }
   
    });    
    

});






//----- perfil ------- 


//editar perfil

$(document).on("click", "#editarLogin",  function (){	
    perfil = "editar";
    id = $(this).data("id");
     $.ajax({
         url:"perfilControladorAjax.php",
         type:"get",
         data:{perfil:perfil,
            id:id,

         },
         success: function(data){
         
             $("#contenido").html(data);
         }
     });

    });

//ediatando perfil

$(document).on("click", "#editadoLogin", function() {	
    var form_data = new FormData();                  
    form_data.append('idusuario', $("#idEditado").val());
    form_data.append('nick', $("#nickP").val());
    form_data.append('apellidos', $("#apellidosP").val());
    form_data.append('dni', $("#dniP").val());
    form_data.append('nombre', $("#nombreP").val());
    form_data.append('telefono', $("#telefonoP").val());
    form_data.append('direccion', $("#direccionP").val());
    form_data.append('contrasena', $("#contrasenaP").val());
    


   
    $.ajax({
        url: 'perfilControladorAjax.php?perfil=editado', 
        type: 'post',
        dataType: 'html',
        data: form_data,                        
        processData:false,
        cache:false,
        contentType: false,
        success: function(data, textStatus, jqXHR){
            $("#contenido").html(data);
            
           
        }
        
     });    
});

//paginacion factura perfil
$(document).on("click", "#enlace10",  function (){	
    paginas = $(this).data("page1");   
     perfil = "";
     id = $(this).data("idusuario"); 
     $.ajax({
         url:"perfilControladorAjax.php",
         type:"get",
         data:{numero:paginas, perfil:perfil, id,  
         },
         success: function(data){
             $("#contenido").html(data);
         }
     });
 
 });


//detalle pedido perfil

$(document).on("click", "#detallePedido", function(){
    id = $(this).data("detalle");
    perfil = "pedido";
    operacion  =  "detalle";
    pag = $(".activado").data("num");
    $.ajax({
        url: 'perfilControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{perfil:perfil, operacion:operacion, idpedido:id, numero:pag,},
        success: function(data){
            $("#contenido").html(data);
        }
    });
});

//volver a pedido perfil

$(document).on("click", "#volverPedido", function(){
    pag = $(this).data("volvere");
    perfil = "volver";
    id = $("#detallePerfil").data("perfil");
    $.ajax({
        url: 'perfilControladorAjax.php',
        type:'get',
        dataType: 'html',
        data:{perfil:perfil, id:id, numero:pag,},
        success: function(data){
            $("#contenido").html(data);
        }
    });
});











})//cierro jquery general
