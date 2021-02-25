function eliminarCookieCarrito(id){
    var carrito = getCookie("carrito");
    var arrayProductos = JSON.parse(carrito);
    for(var i = 0; i<arrayProductos.length; i++){
        if(arrayProductos[i].id == id){
            arrayProductos.splice(i, 1);
            break;
        }
    }
    var json_str = JSON.stringify(arrayProductos);
    setCookie("carrito", json_str, 7);
}

function actulizarCarritoNav() {
    var carrito = getCookie("carrito");
    var cont = 0;
    try {
        var arrayProductos = JSON.parse(carrito);
        
        if(arrayProductos){
            for(var i = 0; i<arrayProductos.length; i++){
                cont += parseInt(arrayProductos[i].cantidad);
            }
            $("#carritoNav").text("Carrito[" + cont + "]");
        }else{
            eraseCookie("carrito");
        }
    }
    catch(err) {
        eraseCookie("carrito");
    }
}


function setCarritoCookies(respuestaId, respuestaCantidad){
    var carrito = getCookie("carrito");
    
    if(carrito){
        var arrayProductos = JSON.parse(carrito);
        var existe = false;

        for(var i = 0; i<arrayProductos.length; i++){
            if(arrayProductos[i].id == respuestaId){
                existe = true;
                arrayProductos[i].cantidad = respuestaCantidad;
                break;
            }
            
        }

        if(existe == false){
            arrayProductos.push({
                "id" : respuestaId,
                "cantidad": respuestaCantidad
            });
        }

        var json_str = JSON.stringify(arrayProductos);
        setCookie("carrito", json_str, 7);
        
    }else{
        var arrayProductos = [
            {"id" : respuestaId, "cantidad" : respuestaCantidad}
        ];
        var json_str = JSON.stringify(arrayProductos);
        setCookie("carrito", json_str, 7);
    }
}