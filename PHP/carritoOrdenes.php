<?php 
spl_autoload_register(function($clase){
    require_once "LIB/$clase.php";
});


if(isset($_COOKIE["carrito"])){
        
    $array = json_decode($_COOKIE["carrito"], true);
    $resultado = "";

    $db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    foreach ($array as $platillo){

        $id = $platillo["id"];
        $totalCantidad = $platillo["cantidad"]; 

        $validarDatos = $db->validarDatos('NumeroPlatillo', 'menu', $id);

        if($validarDatos!= 0){

            if($totalCantidad <= 100){
                $db->preparar("SELECT NombrePlatillo, Descripcion, PrecioUnitario FROM menu WHERE NumeroPlatillo = $id ");

                $db->ejecutar();

                $db->prep()->bind_result( $dbNombre, $dbDescripcion, $dbPrecio);

                $db->resultado();

                $dbPrecio *= $totalCantidad;

                $profile = new Template("TEMP/row_carrito.temp");
                $profile->set("producto", $dbNombre);
                $profile->set("id", $id);
                $profile->set("cantidad", $totalCantidad);
                $profile->set("precio", $dbPrecio);
                echo $profile->output();

                $db->liberar();

            }else{
                destruirCookie();
                break;
            }

        }else{
            destruirCookie();
            break;
        }   

    }

}
    

function destruirCookie(){
    $caduca = time()-9305;
    setcookie( "carrito",  "", $caduca, '/', null, false, true);
}