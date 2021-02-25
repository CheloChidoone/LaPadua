<?php        

session_start();

if($_POST){
    $output = [];
    
    require '../LIB/config.php';
    require "Template.php";
    
    spl_autoload_register(function($clase){
        require_once "../LIB/$clase.php";
    });

    extract($_POST, EXTR_OVERWRITE); 
    
    if($usuario && $clave){
        
        $db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        $buscarUsuario;
        
        $validarDatos = $db->validarDatos('CorreoElectronico', 'usuario', $usuario);
        
        if($validarDatos == 0){
            $validarDatos = $db->validarDatos('Telefono', 'usuario', $usuario);
            if($validarDatos == 0){
                $buscarUsuario = "error";            
            }else{
                $buscarUsuario = "telefono";
            }
        }else{
            $buscarUsuario = "correo";
        }

        if($buscarUsuario != "error"){
            
            if($buscarUsuario == "correo"){
                $db->preparar("SELECT idUsuario, CONCAT(nombres, ' ',ApellidoPaterno, ' ',ApellidoMaterno) as nombrecompleto, clave, CorreoElectronico, TipoUsuario FROM usuario WHERE CorreoElectronico = '$usuario'");
            }else{
                $db->preparar("SELECT idUsuario, CONCAT(nombres, ' ',ApellidoPaterno, ' ',ApellidoMaterno) as nombrecompleto, clave, CorreoElectronico, TipoUsuario FROM usuario WHERE Telefono = '$usuario'");
            }
            
            $db->ejecutar();

            $db->prep()->bind_result( $idUsuario, $dbnombrecompleto, $dbcontrasena, $dbemail, $dbtipo);

            $db->resultado();


//                $hasher = new PasswordHash(8, FALSE);
//                
//                if($hasher->CheckPassword($contrasena, $dbcontrasena)){

            if($dbcontrasena == $clave){

                $_SESSION['idUser'] = $idUsuario;
                $_SESSION['nombre'] = $dbnombrecompleto;
                $_SESSION['tipoUsuario'] = $dbtipo;

                $caduca = time()+365*24*60*60;


                if(isset($recordar)){
                    setcookie( 'idUsuario',  $_SESSION['idUser'], $caduca, '/', null, false, true );
                    setcookie( 'nombre',  $_SESSION['nombre'], $caduca, '/', null, false, true );
                    setcookie( 'tipoUsuario',  $_SESSION['tipoUsuario'], $caduca, '/', null, false, true );

                }

            $db->cerrar();

            }else{

                $output = ["error" => true, "tipoError" => "ERROR: Esta contrasena no coincide con la del correo o telefono."];
            }

        } else {
            $output = ["error" => true, "tipoError" => "ERROR: No existe este correo o usario, ingresa un usuario valido, o registrate!"];

        }
        
    }
    
    $json = json_encode($output);
    
    echo $json;
}


?>

