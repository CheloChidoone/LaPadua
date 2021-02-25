<?php
$db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$db->preparar("SELECT NumeroPlatillo, NombrePlatillo, Seccion, Descripcion, PrecioUnitario, Disponibilidad, Imagen FROM menu");

$db->ejecutar();

$db->prep()->bind_result( $dbNumero, $dbNombre, $dbSeccion, $dbDescripcion, $dbPrecio, $dbDisponibilidad, $dbImagen);

$seccion = null;

$cont = 0;

while($db->resultado()){
    
    if($dbSeccion != $seccion){

        if($seccion != null){

            $profile = new Template("TEMP/seccion_Menu.temp");
            $profile->set("tituloSeccion", $tituloSeccion);
            $profile->set("platillos", $platillos);
            echo $profile->output();
        }
        
        $seccion = $dbSeccion;
        
        $profile = new Template("TEMP/titulo_Section.temp");
        $profile->set("titulo", $dbSeccion);
        $tituloSeccion =  $profile->output(); 
        
        $platillos = "";
    }
    
    $profile = new Template("TEMP/platillo.temp");
    $profile->set("idPlato", $dbNumero);
    $profile->set("imagen", $dbImagen);
    $profile->set("producto", $dbNombre);   
    $profile->set("precio", "$".$dbPrecio);
    $profile->set("descripcion", $dbDescripcion);
    $profile->set("disponibilidad", $dbDisponibilidad);
    $platillo =  $profile->output();
    
    $platillos .= $platillo;
}

if($seccion != null){
    $profile = new Template("TEMP/seccion_Menu.temp");
    $profile->set("tituloSeccion", $tituloSeccion);
    $profile->set("platillos", $platillos);
    echo $profile->output();
}

$db->cerrar();