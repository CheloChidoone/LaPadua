var servicios = $(".servicesItem");

var serviciosSize = servicios.length;
$(servicios).hide();

$(servicios[0]).show();
$(servicios[1]).show();

var paresServicios = serviciosSize/2;

var contadorMostrados = 0;

setInterval(siguienteServicio, 4000);

function siguienteServicio() {
    if(contadorMostrados >= serviciosSize){
        contadorMostrados = 0
    }
    $(servicios).hide();
    $(servicios[contadorMostrados]).fadeIn();
    $(servicios[contadorMostrados + 1]).fadeIn();
    contadorMostrados += 2;
}