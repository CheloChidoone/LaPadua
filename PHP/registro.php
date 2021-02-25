<?php              

if($_POST){
    $output = [];
    
    require '../LIB/config.php';
    
    spl_autoload_register(function($clase){
        require_once "../LIB/$clase.php";
    });

    extract($_POST, EXTR_OVERWRITE); 
    
    $db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    $validarDatos = $db->validarDatos('CorreoElectronico', 'usuario', $correo);

    if($validarDatos == 0){

        $validarDatos = $db->validarDatos('Telefono', 'usuario', $telefono);

        if($validarDatos == 0){
            
            if(strlen($contrasena) > 6){
                    
                    if($contrasena == $contrasena2){
                                
                        $hasher = new PasswordHash(8, FALSE);

                        $hash = $hasher->HashPassword($contrasena);

                        if($db->preparar("INSERT INTO usuario VALUES (NULL, '$contrasena', '$nombre', '$paterno', '$materno', '$telefono', '$correo', 'Cliente')")){

                            $db->ejecutar();
                            
                            $db->liberar();
                            
                            $db->preparar("SELECT idUsuario FROM usuario WHERE CorreoElectronico = '$correo'");

                            $db->ejecutar();

                            $db->prep()->bind_result( $dbIdUsuario);

                            $db->resultado();
                            
                            $db->liberar();
                                                        
                            $db->preparar("INSERT INTO direccion VALUES ('$nombreDireccion', '$dbIdUsuario', '$codigoPostal', '$numeroInterno', '$numeroExterno', '$colonia', '$calle', '$cruzamientos', '$informacionAdicional')");

                            $db->ejecutar();
                            
                            
                            $db->cerrar();
                        }else{
                            $output = ["error" => true, "tipoError" => "ERROR: Error al conectar a la base datos.", "numError" => "5"];
                        }

                    }else{
                        $output = ["error" => true, "tipoError" => "ERROR: Las Contraseñas no coinciden.", "numError" => "4"];
                    }

                }else{
                    $output = ["error" => true, "tipoError" => "ERROR: La Contraseña debe ser mayor a 6 caracteres.", "numError" => "3"];
                }

        }else{
            $output = ["error" => true, "tipoError" => "ERROR: Este Telefono ya esta ocupado por otra cuenta.", "numError" => "2"];
        }
    }else{
        $output = ["error" => true, "tipoError" => "ERROR: Este Correo ya esta ocupado por otra cuenta.", "numError" => "1"];
    }
    
    $json = json_encode($output);
    
    echo $json;
}