var modal = $("#modalClientes");

var url = 'PHP/clienteMod.php';

$("#tablaClientes tbody tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var value=$(this).find('td:first').html();
});

$('#eliminar').on('click', function(e){
    var id = $("#tablaClientes tr.selected").attr("data-id");
    var datos = {
                'id': id,
                'eliminar': true
            }
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
            },
            complete: function () {},
            success: function (respuesta) {
                if (respuesta.error) {
                    alert(respuesta.tipoError);
                } else {
                    $("#tablaClientes tr.selected").remove();
                    modal.toggleClass('show');
                }
            },
            error: function (e) {
                console.log(e)
            },
            async: false

        });
});

$('#guardar').on('click', function(e){
    e.preventDefault();
    var id = $("#tablaClientes tr.selected").attr("data-id");
    
    var correo = $("#correo").val();
    var telefono = $("#telefono").val();
    var nombre = $("#nombre").val();
    var paterno = $("#paterno").val();
    var materno = $("#materno").val();

    var nombreDir = $("#nombreDireccion").val();
    var codigoP = $("#codigoPostal").val();
    var colonia = $("#colonia").val();
    var externo = $("#numeroExterno").val();
    var interno = $("#numeroInterno").val();
    var calle = $("#calle").val();
    var cruzamientos = $("#cruzamientos").val();
    var info =  $("#informacionAdicional").val();
    
    alert(nombreDir + nombre + externo);
    
    var datos = {
                'id': id,
                'modificar': true,
                'correo' : correo,
                'telefono' : telefono,
                'nombre' : nombre,
                'paterno' : paterno,
                'materno' : materno, 
                'nombreDir' : nombreDir,
                'codigoP' : codigoP,
                'colonia' : colonia, 
                'externo' : externo,
                'interno' : interno,
                'calle' : calle, 
                'cruzamientos' : cruzamientos,
                'info' :  info
            }
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
            },
            complete: function () {},
            success: function (respuesta) {
                if (respuesta.error) {
                    alert(respuesta.tipoError);
                } else {
                    alert(respuesta.mensaje);
                }
            },
            error: function (e) {
                console.log(e)
            },
            async: false

        });
});


$('#modClientes').on('click', function(e){
    if($("#tablaClientes tr.selected").attr("data-id")){
        
        var id = $("#tablaClientes tr.selected").attr("data-id");
        
        var datos = {
                'id': id,
            }
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
            },
            complete: function () {},
            success: function (respuesta) {
                if (respuesta.error) {
                    alert(respuesta.tipoError);
                } else {
                    setModal(respuesta);
                    modal.toggleClass('show');
                }
            },
            error: function (e) {
                console.log(e)
            },
            async: false

        });
    }else{
        alert("Ningun Cliente Seleccionado");
    }
});

function setModal(respuesta){
    $("#correo").val(respuesta.Correo);
    $("#telefono").val(respuesta.Telefono);
    $("#nombre").val(respuesta.Nombres);
    $("#paterno").val(respuesta.Paterno);
    $("#materno").val(respuesta.Materno);
    
    $("#nombreDireccion").val(respuesta.NombreDireccion);
    $("#codigoPostal").val(respuesta.CodigoPostal);
    $("#colonia").val(respuesta.Colonia);
    $("#numeroExterno").val(respuesta.Interno);
    $("#numeroInterno").val(respuesta.Externo);
    $("#calle").val(respuesta.Calle);
    $("#cruzamientos").val(respuesta.Cruzamientos);
    $("#informacionAdicional").val(respuesta.InfoAdicional);
}


$('#regresar').on('click', function(e){
    modal.toggleClass('show');
});