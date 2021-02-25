var ordenes = $("#ordenes");
var url = 'PHP/confirmOrdenesPlatillos.php';
var platillos = getCookie("carrito");

$.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    success: function (respuesta) {
        if (respuesta.error) {
            mostrarMensaje(respuesta.tipoError, true);
        } else if(respuesta.nada){
            
        }else{
            $(ordenes).append(respuesta.resultado);
        }
    },
    error: function (e) {
        console.log(e)
    }

});

$('body').on('click', '.agregar', function () {
    var id = $(this).parent().parent().attr("data-id");
    var cantidad = $(this).parent().parent().find("input.cantidad").val();

    if (cantidad <= 0 || id <= 0) {
        mostrarMensaje("¡Deja de estar jugando al hacker y pon todo en su lugar no hay valores negativos aqui!", true);
    } else {
        
            var orden = $(".orden[data-id=" + id + "]");

        var cantidadOrden = $(orden).attr("data-cantidad");
        var datos;
        if (cantidadOrden != undefined) {
            datos = {
                'id': id,
                'cantidad': cantidad,
                'cantidadOrden': cantidadOrden
            }
        } else {
            datos = {
                'id': id,
                'cantidad': cantidad
            }
        }

        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
                orden.remove();
            },
            complete: function () {},
            success: function (respuesta) {
                if (respuesta.error) {
                    mostrarMensaje(respuesta.tipoError, true);
                } else {
                    $(ordenes).append(respuesta.resultado);
                    
                    setCarritoCookies(respuesta.id, respuesta.cantidad);
                    
                    actulizarCarritoNav();
                }
            },
            error: function (e) {
                console.log(e)
            }

        });
    }

});

function mostrarMensaje(mensaje, error) {
    var mensajeOb = $("#mensaje");

    mensajeOb.css({
        display: 'block'
    });

    if (error == false) {
        $(mensajeOb).addClass("exito");
        setTimeout(function () {
            mensajeOb.css({
                display: 'none'
            });
        }, 3000);
    } else {
        $(mensajeOb).removeClass("exito");
    }

    mensajeOb.html(mensaje);
}


$('body').on('click', 'button.eliminarPedido', function () {
    var id = $(this).parent().attr("data-id");
    $(this).parent().remove();
    eliminarCookieCarrito(id);
    actulizarCarritoNav();
});

//function actulizarCarritoNav() {
//    var ordenes = $(".orden");
//    var cont = 0;
//    for (var i = 0; i < ordenes.length; i++) {
//        cont += parseInt($(ordenes[i]).attr("data-cantidad"));
//    }
//
//    $("#carritoNav").text("Carrito[" + cont + "]");
//}