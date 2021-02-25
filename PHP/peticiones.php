<?php
class Peticiones {
    protected $db;
    protected $noseas = " ¡Deja de estar jugando al hacker!";
  
    public function __construct() {
        require '../LIB/config.php';
        require 'Template.php';

        spl_autoload_register(function($clase){
            require_once "../LIB/$clase.php";
        });

        $this->db = new DataBase(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }
    
    public function confirmPlatilloPrice() {
        if($_POST){
            
            extract($_POST, EXTR_OVERWRITE); 
        
            $validarDatos = $this->db->validarDatos('NumeroPlatillo', 'menu', $id);
            
            $error = false;
        
            if($validarDatos!= 0){
        
                if($cantidad > 0){
                    
                    $totalCantidad = $cantidad;
                    
                        if($totalCantidad <= 100){
                            $this->db->preparar("SELECT NombrePlatillo, Descripcion, PrecioUnitario FROM menu WHERE NumeroPlatillo = $id ");
        
                            $this->db->ejecutar();
        
                            $this->db->prep()->bind_result( $dbNombre, $dbDescripcion, $dbPrecio);
        
                            $this->db->resultado();
        
                            $dbPrecio *= $totalCantidad;
        
                            $output = ["precio" => $dbPrecio, "id" => $id];
        
                            $this->db->cerrar();
        
                        }else{
                            $output = ["error" => true, "tipoError" => "ERROR: Has escedido la cantidad maxima de 100 productos que puedes pedir de este platillo."];
                        }
        
                }else{
                    $output = ["error" => true, "tipoError" => "ERROR: Ya te habia dicho que no exiten cantidades negativas. $this->noseas"];
                }    
            }else{
                $output = ["error" => true, "tipoError" => "ERROR: No existe este platillo. $this->noseas"];
            }
        
            $json = json_encode($output);
        
            return $json;
        }
    }

    public function confirmOrdenesPlatillos() {
        if($_POST){
    
            extract($_POST, EXTR_OVERWRITE); 
        
            $validarDatos = $this->db->validarDatos('NumeroPlatillo', 'menu', $id);
            
            $error = false;
        
            if($validarDatos!= 0){
        
                if($cantidad > 0){
                    
                    $totalCantidad = null;
                    
                    if(isset($cantidadOrden)){
                       if($cantidadOrden > 0){
                           $totalCantidad = $cantidadOrden + $cantidad;
                       }else{
                           $output = ["error" => true, "tipoError" => "ERROR: Ya te habia dicho que no exiten cantidades negativas. $this->noseas"];
                           $error = true;
                       }
                    }else{
                        $totalCantidad = $cantidad;
                    }
                    
                    if($error == false){
                        if($totalCantidad <= 100){
                            $this->db->preparar("SELECT NombrePlatillo, Descripcion, PrecioUnitario FROM menu WHERE NumeroPlatillo = $id ");
        
                            $this->db->ejecutar();
        
                            $this->db->prep()->bind_result( $dbNombre, $dbDescripcion, $dbPrecio);
        
                            $this->db->resultado();
        
                            $dbPrecio *= $totalCantidad;
        
                            $profile = new Template("../TEMP/row_pedido.temp");
                            $profile->set("idPlato", $id);
                            $profile->set("producto", $dbNombre);
                            $profile->set("cantidad", $totalCantidad);
                            $profile->set("precio", $dbPrecio);
                            $profile->set("datos", $dbDescripcion);
                            $resultado =  $profile->output();
        
                            $output = ["resultado" => $resultado, "cantidad" => $totalCantidad, "id" => $id];
        
                            $this->db->cerrar();
        
                        }else{
                            $output = ["error" => true, "tipoError" => "ERROR: Has escedido la cantidad maxima de 100 productos que puedes pedir de este platillo."];
                        }
                    }
                }else{
                    $output = ["error" => true, "tipoError" => "ERROR: Ya te habia dicho que no exiten cantidades negativas. $this->noseas"];
                }    
            }else{
                $output = ["error" => true, "tipoError" => "ERROR: No existe este platillo. $this->noseas"];
            }
        
            $json = json_encode($output);
        
            echo $json;
        }else{
            
            if(isset($_COOKIE["carrito"])){
                
                $array = json_decode($_COOKIE["carrito"], true);
                $resultado = "";
        
                foreach ($array as $platillo){
        
                    $id = $platillo["id"];
                    $totalCantidad = $platillo["cantidad"]; 
        
                    $validarDatos = $this->db->validarDatos('NumeroPlatillo', 'menu', $id);
        
                    if($validarDatos!= 0){
        
                        if($totalCantidad <= 100){
                            $this->db->preparar("SELECT NombrePlatillo, Descripcion, PrecioUnitario FROM menu WHERE NumeroPlatillo = $id ");
        
                            $this->db->ejecutar();
        
                            $this->db->prep()->bind_result( $dbNombre, $dbDescripcion, $dbPrecio);
        
                            $this->db->resultado();
        
                            $dbPrecio *= $totalCantidad;
        
                            $profile = new Template("../TEMP/row_pedido.temp");
                            $profile->set("idPlato", $id);
                            $profile->set("producto", $dbNombre);
                            $profile->set("cantidad", $totalCantidad);
                            $profile->set("precio", $dbPrecio);
                            $profile->set("datos", $dbDescripcion);
                            $resultado .=  $profile->output();
        
                            $this->db->liberar();
        
                        }else{
                            $output = ["error" => true, "tipoError" => "ERROR: Has escedido la cantidad maxima de 100 productos que puedes pedir de este platillo."];
                            $this->destruirCookie();
                            break;
                        }
        
                    }else{
                        $output = ["error" => true, "tipoError" => "ERROR: No existe este platillo. $this->noseas"];
                        $this->destruirCookie();
                        break;
                    }   
        
                }
        
                if(!isset($output["error"])){
                    $output = ["resultado" => $resultado];
                }
        
            }else{
                $output = ["nada" => true];
            }
            
            $json = json_encode($output);
        
            return $json;
            
        }
    }

    public function clienteMod() {
        if($_POST){
    
            extract($_POST, EXTR_OVERWRITE); 
        
            $validarDatos = $this->db->validarDatos('IdUsuario', 'usuario', $id);
            
        
            if($validarDatos!= 0){
                
                if(isset($eliminar)){
                    
                    $this->db->preparar("DELETE FROM direccion WHERE IdUsuario = '$id' ");
                
                    $this->db->ejecutar();
                    
                    $this->db->resultado();
                    
                    $this->db->liberar();
                    
                    $this->db->preparar("DELETE FROM usuario WHERE IdUsuario = '$id' ");
                    
                    $this->db->ejecutar();
                    
                    $this->db->resultado();
                    
                    $this->db->cerrar();
                    
                    $output = ["eliminacion" => true];
                    
                } else if(isset($modificar)){
                    
                    $this->db->preparar("UPDATE usuario SET Nombres = '$nombre' , ApellidoPaterno = '$paterno' , ApellidoMaterno = '$materno' , Telefono = $telefono , CorreoElectronico = '$correo' WHERE IdUsuario = '$id'");
        
                    $this->db->ejecutar();
                    
                    $this->db->resultado();
        
                    $this->db->liberar();
                    
                    $this->db->preparar("UPDATE direccion SET NombreDireccion = '$nombreDir' ,CodigoPostal = '$codigoP' , NumeroInterno = '$interno' , NumeroExterno = '$externo' , Colonia = '$colonia' , Calle = '$calle' , Cruzamientos = '$cruzamientos', InfoAdicional = '$info' WHERE IdUsuario = '$id'");
                    
                    $this->db->ejecutar();
                    
                    $this->db->resultado();
                    
                    $this->db->cerrar();
                    
                    $output = ["modificacion" => true, "mensaje" => "Exito al Modificar a el usuario $nombre"];
                    
                } else{
                    $this->db->preparar("SELECT Nombres, ApellidoPaterno, ApellidoMaterno, Telefono, CorreoElectronico FROM usuario WHERE IdUsuario = '$id' ");
                
                    $this->db->ejecutar();
        
                    $this->db->prep()->bind_result( $dbnombre, $dbpaterno, $dbmaterno, $dbtelefono, $dbemail);
        
                    $this->db->resultado();
        
                    $this->db->liberar();
        
                    $this->db->preparar("SELECT NombreDireccion, CodigoPostal, NumeroInterno, NumeroExterno, Colonia, Calle, Cruzamientos, InfoAdicional FROM direccion WHERE IdUsuario = '$id' ");
        
                    $this->db->ejecutar();
        
                    $this->db->prep()->bind_result( $dbnombreDir, $dbCP, $dbnumeroInterno, $dbnumeroExterno, $dbColonia, $dbCalle, $dbCruzamientos, $dbInfoAd);
        
                    $this->db->resultado();
        
                    $this->db->cerrar();
        
                    $output = ["Nombres" => $dbnombre, "Paterno" => $dbpaterno, "Materno" => $dbmaterno, "Telefono" => $dbtelefono, "Correo" => $dbemail, "NombreDireccion" => $dbnombreDir, "CodigoPostal" => $dbCP, "Interno" => $dbnumeroInterno, "Externo" => $dbnumeroExterno, "Colonia" => $dbColonia, "Calle" => $dbCalle, "Cruzamientos" => $dbCruzamientos, "InfoAdicional" => $dbInfoAd ];
                }
                   
            }else{
                $output = ["error" => true, "tipoError" => "ERROR: No existe este usario"];
            }
        
            $json = json_encode($output);
        
            return $json;
        }
    }

    private function destruirCookie(){
        $caduca = time()-9305;
        setcookie( "carrito",  "", $caduca, '/', null, false, true);
    }
}