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
        
        if($validarDatos != 0){
            
            $db->preparar("SELECT clave FROM usuario WHERE CorreoElectronico = '$correo'");

            $db->ejecutar();

            $db->prep()->bind_result( $dbclave);

            $db->resultado();
            
            $para = $dbemail;
            
            $de = "luisjavier004@hotmail.com";

            $asunto = "Mensaje desde web, Olvido Contraseña";

            $mailheader  = 'MIME-Version: 1.0' . "\r\n";
            $mailheader .= "Content-type: text/html; charset-utf-8\r\n";
            $mailheader .= "From: ".$de."\r\n";
            $mailheader .= "Reply-To: ".$de."\r\n";

            $MESSAGE_BODY = "\n<br>Mensaje: ".nl2br($dbclave)."\n";
            $MESSAGE_BODY .= "\n<br><br>Hora de Envio: ".date("h:i:sa")."\n";
            $MESSAGE_BODY .= "\n<br>Fecha de Envio: ".date("Y-m-d")."\n";

            mail($para, $asunto, $MESSAGE_BODY, $mailheader);
            
            $db->cerrar();
            
            
        }else{
            $output = ["error" => true, "tipoError" => "ERROR: No existe este correo , ingresa un correo valido, o registrate!"];
        }
    
    $json = json_encode($output);
    
    echo $json;
}


?>