ponerPrecio();

$("#propina").change(function(){
    ponerPrecio();
});

$("#btnCompra").on("click", function(){
    eraseCookie("carrito");
    $("#modalito").toggleClass('showM');
    setTimeout(function(){
        $(location).attr('href', 'index.php');
    }, 3000);
});

$(".cantidad").change(function(){
    var valor = $(this).val();
    var id = $(this).attr("data-id");
    var precioO = $(this).parent().parent().children().eq(2).children().eq(0);
    
    if(valor >= 0){
        var url = 'PHP/confirmPlatilloPrice.php';
        var datos = {
                'id': id,
                'cantidad': valor
            }
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
                setCarritoCookies(id, valor);
            },
            complete: function () {},
            success: function (respuesta) {
                if (respuesta.error) {
                    alert(respuesta.tipoError);
                } else {
                    $(precioO).html("$" + respuesta.precio);
                    ponerPrecio();
                }
            },
            error: function (e) {
                console.log(e)
            },
            async: false

        });
        
        actulizarCarritoNav();
    }
    
});

function ponerPrecio(){
    var precios = $(".precioI");
    var suma = 0;
    for(var i=0; i<precios.length; i++){
        var precio = $(precios[i]).html().replace("$", "");
        suma += parseFloat(precio);
    }
    
    var propina = $("#propina").val();
    
    $("#subtotal").html("$" + (suma).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    
    $("#total").html("$" + (suma*propina).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}

$('body').on('click', '.deleteButton', function () {
    event.preventDefault();
    var id = $(this).parent().parent().children().eq(1).children().attr("data-id");
    $(this).parent().parent().remove();
    eliminarCookieCarrito(id);
    actulizarCarritoNav();
    ponerPrecio();
});

