var carrito = getCookie("carrito");
var cont = 0;
try {
    var arrayProductos = JSON.parse(carrito);
    
    for(var i = 0; i<arrayProductos.length; i++){
        cont += parseInt(arrayProductos[i].cantidad);
    }
    
    if(cont == 0){
        eraseCookie("carrito");
    }else{
        $("#carritoNav").text("Carrito[" + cont + "]");
    } 
}
catch(err) {
    eraseCookie("carrito");
}
 


