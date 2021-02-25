/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validarLogin(formulario){
    var usuario = formulario.usuario.value;
    var clave = formulario.clave.value;
    //Expresiones regulares para validar correo electrónico y teléfono
    //Hay que checar cual emailRegex es la mejor
    //var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var emailRegex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    var telRegex = /^[0-9]{10}$/;
    var claveRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d]|[^ ]){6,15}$/;
    if(!emailRegex.test(usuario)||!telRegex.test(usuario)){
        alert("usuario invalido");
        return false;
    }
    if(!claveRegex.test(clave)){
        alert("contraseña invalida");
        return false;
    }
    alert("usuario correcto");
    return true;
}
