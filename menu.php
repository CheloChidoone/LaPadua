<?php 
session_start();

require "PHP/Template.php";
require 'LIB/config.php';

spl_autoload_register(function($clase){
    require_once "LIB/$clase.php";
});

include 'LIB/signIn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php include "INC/headMeta.inc";?>

    <link rel="stylesheet" href="CSS/styleMenu.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    
    <script src="JS/jquery-3.3.1.min.js"></script>
    
</head>
<body>   
    
    <?php include "INC/header.inc";?> 

    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "Menu");
            echo $profile->output();
     ?>
    <h1 id="mensaje" class="mensaje error"></h1>
    <div id="menuSection">
        <div id="secciones">
           
           <?php include "PHP/getPlatillos.php";?>
            
        </div> 
        
        <div id="cuadroOrden">
            <div class="cuadro">
                <div id="tituloCuadro">
                    <h3>SU ORDEN</h3>
                </div>
                
                <div id="ordenes">
                   

                </div>
                
                
                <div id="botonCuadro" tabindex="0">
                    <a href="carrito.php">Ordenar Ahora</a> 
                </div>
            </div>
        </div>
    </div>
    
    <?php include "INC/footer.inc";?> 
    
    <script src="JS/header.js"></script>
    <script src="JS/cookies.js"></script>
    <script src="JS/carritoCookies.js"></script> 
    <script src="JS/scriptCarritoItems.js"></script>
    <script src="JS/scriptMenu.js"></script>

</body>
</html> 