var anchorOlvidado = document.querySelector("#olvidado");
var botonRegresar = document.querySelector("#regresar");


var modal = document.querySelector("#modal")

anchorOlvidado.addEventListener("click", function(event){
    event.preventDefault();
    modal.classList.toggle('show');
});

botonRegresar.addEventListener("click", function(){
    modal.classList.toggle('show');
});

//Funcion Login

$(function(){
    
    var formulario = $('#formLogin'),
        mensaje = $('#mensaje');

    $(formulario).submit(function(event){
        event.preventDefault();
        var datos = formulario.serialize(),
        url = 'PHP/login.php';
        
        
        $.ajax({
            type: "POST",
            url : url,
            data : datos,
            dataType : "json", 
            beforeSend : function(){
            },
            complete:function(){
            },
            success: function(respuesta){
                if(respuesta.error){
                    mensaje.css({display:'block'});
                    mensaje.html(respuesta.tipoError);
                } else {
                    mensaje.css({display:'block'});
                    mensaje.toggleClass("exito");
                    mensaje.html("Exito al iniciar Sesion, Empieza a comprar!");
                    
                    setTimeout(function(){
                        $(location).attr('href', 'menu.php');
                    }, 2500);
                }
            },  
            error : function(e){
                console.log(e)
            }
            
        });    
       return false;
   });
    
    var formulario2 = $('#formOlvido'),
        mensaje2 = $('#mensaje2');
    
    $(formulario2).submit(function(event){
        event.preventDefault();
        var datos2 = formulario2.serialize(),
        url = 'PHP/olvido.php';
        
        
        $.ajax({
            type: "POST",
            url : url,
            data : datos2,
            dataType : "json", 
            beforeSend : function(){
            },
            complete:function(){
            },
            success: function(respuesta){
                if(respuesta.error){
                    mensaje2.css({display:'block'});
                    mensaje2.html(respuesta.tipoError);
                } else {
                    mensaje2.css({display:'block'});
                    mensaje2.toggleClass("exito");
                    mensaje2.html("Exito al enviar tu contraseña, Revisa tu correo!");
                    
                    setTimeout(function(){
                        modal.classList.toggle('show');
                    }, 2500);
                }
            },  
            error : function(e){
                console.log(e)
            }
            
        });    
       return false;
   });

});    

