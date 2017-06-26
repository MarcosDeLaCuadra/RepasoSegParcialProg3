$(document).ready(function() {

 $('body').css('background', '#CEE3F6');

 ///////Login////
          $("#registrarbtn").click(function() {  
             
                   $.ajax({
                          url:'validarLogin.php',
                          type:'POST',                   
                          async: true,
                          data:{pass: $("#password").val(), usuario: $("#usuario").val(), cookies: $('#recordarme').is(':checked')} ,
                          beforeSend: function () {                         
                            },
                          success: function (dataRespuesta){   
                            if(dataRespuesta == 'error'){
                                $("#respuesta").html("<b class= 'alert alert-danger'>No se pudo iniciar sesion,verifique los datos!.</b>");
                            }
                            else{
                                 window.location= "index.php";
                            }                                                      
                          }
                      });      
                });

                $("#cerrarSession").click(function() {  
             
                   $.ajax({
                          url:'nexo.php',
                          type:'POST',                   
                          async: true,  
                          data:{operacion: "cerrarSesion"},                      
                          success: function (dataRespuesta){   
                              alert("sesion cerrada");                             
                              window.location= "login.php";                                                                               
                          }
                      });      
                });


 ///////form Alta////////
        $("#formAlta").click(function() {   

         // alert("entro altaform");
            $.ajax({

                   url:'formularios/alta.php',
                   type:'POST',                   
                   async: true,
                   beforeSend: function () {                         
                    },
                  success: function (dataRespuesta){                    
                    $("#contenido").html(dataRespuesta);          
                  }
              });      
         });

///////form baja////////

        $("#formBaja").click(function() {   

         // alert("entro altaform");
            $.ajax({

                   url:'formularios/baja.php',
                   type:'POST',                   
                   async: true,
                   beforeSend: function () {                         
                    },
                  success: function (dataRespuesta){                    
                    $("#contenido").html(dataRespuesta);          
                  }
              });      
         });

/////form modificar//////
   $("#formFiltrar").click(function() {   

         // alert("entro altaform");
            $.ajax({

                   url:'formularios/buscarXlegajo.php',
                   type:'POST',                   
                   async: true,
                   beforeSend: function () {                         
                    },
                  success: function (dataRespuesta){                    
                    $("#contenido").html(dataRespuesta);          
                  }
              });      
         });
 //////alta///////

      //  $("#altabtn").click(function() {   
          $("#contenido").on("click","#altabtn", function(){    
             $.ajax({

                   url:'nexo.php',
                   type:'POST',
                   data:{operacion:"alta" , nombre: $("#nombre").val() , apellido: $("#apellido").val() , legajo: $("#legajo").val()},
                   async: true,
                   beforeSend: function () {
                            // $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                    $("#respuesta").html(dataRespuesta);
          
                  }

              });
              
             
         });

         ///////baja///////

         // $("#bajabtn").click(function() {
              $("#contenido").on("click","#bajabtn", function(){  
             $.ajax({

                   url:'nexo.php',
                   type:'POST',
                   data:{operacion:"baja" , legajo: $("#legajo").val()},
                   async: true,
                   beforeSend: function () {
                    },
                  success: function (dataRespuesta){                    
                    $("#respuesta").html(dataRespuesta);          
                  }

              });
              
             
         });

         //////////filtrar//////////

        // $("#filtrarbtn").click(function() {
            
            
          $("#contenido").on("click","#filtrarbtn", function(){
             $.ajax({

                   url:'nexo.php',
                   type:'POST',
                   data:{operacion:"filtrar" , legajo: $("#legajo").val()},
                   async: true,
                   beforeSend: function () {
                            // $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                    $("#respuesta").html(dataRespuesta);
          
                  }

              });
              
             
         });

         ///////modificar///////

         $("#contenido").on("click","#modibtn", function(){
            
          //  alert("entro");
             
             $.ajax({

                   url:'nexo.php',
                   type:'POST',
                   data:{operacion:"modificar", nombre: $("#nombre1").val() , apellido: $("#apellido1").val() , legajo: $("#legajo1").val() , legOriginal: $("#legOriginal1").val()},
                   async: true,
                   beforeSend: function () {
                            // $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                    $("#respuesta").html(dataRespuesta);
          
                  }

              });
              
             
         });

});