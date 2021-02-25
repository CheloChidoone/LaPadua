<?php 
spl_autoload_register(function($clase){
    require_once "LIB/$clase.php";
});

$db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$db->preparar("SELECT idUsuario, CONCAT(Nombres, ' ',ApellidoPaterno, ' ',ApellidoMaterno) as nombrecompleto, Telefono, CorreoElectronico FROM usuario WHERE TipoUsuario = 'Cliente'");

$db->ejecutar();

$db->prep()->bind_result( $dbId, $dbNombre, $dbTelefono, $dbCorreo);

while($db->resultado()){
    $profile = new Template("TEMP/row_cliente.temp");
    $profile->set("id", $dbId);
    $profile->set("nombre", $dbNombre);
    $profile->set("telefono", $dbTelefono);
    $profile->set("correo", $dbCorreo);
    echo $profile->output();
}