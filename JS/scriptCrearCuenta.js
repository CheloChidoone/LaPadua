$(function(){
    
    var formulario = $('#formCrear'),
        mensaje = $('#mensaje');

    $(formulario).submit(function(event){
        event.preventDefault();
        var datos = formulario.serialize(),
        url = 'PHP/registro.php';

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
                    
                    mensaje.focus();
                    
                    var focusItem;
                    
                    switch(respuesta.numError){
                        case "1":
                            focusItem = $("[name='correo']");
                            break;
                        case "2":
                            focusItem = $("[name='telefono']");
                            break;
                        case "3":
                            focusItem = $("[name='contrasena']");
                            break;
                        case "4":
                            focusItem = $("[name='contrasena']");
                            break;   
                        default:
                            focusItem = null;
                    }
                    
                    if(focusItem != null){
                        setTimeout(function(){
                            focusItem.focus();
                        }, 1800); 
                    }
                    
                } else {
                    mensaje.css({display:'block'});
                    mensaje.toggleClass("exito");
                    mensaje.html("Exito al Crear Cuenta, Inicia Sesion!");
                    
                    setTimeout(function(){
                        $(location).attr('href', 'login.php');
                    }, 2000);
                }
            },  
            error : function(e){
                console.log(e)
            }
            
        });    
       return false;
   });

});