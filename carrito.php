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

    <link rel="stylesheet" href="CSS/styleCarrito.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <script src="JS/jquery-3.3.1.min.js"></script>
    
</head>
<body>  
    
    <?php include "INC/header.inc";?> 
    
    <div id="modalito">
       <div id="cont">
           <h1>Pedido Completado Tiempo estimado de entrega 30 minutos</h1>
       </div>
    </div>
    
    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "Carrito");
            echo $profile->output();
    
                
            
            if(!isset($_SESSION['idUser']) && !isset($_SESSION['nombre']) && !isset($_SESSION['tipoUsuario'])):
     ?>

     <section id="cont">
         <h1 id="mensaje" class="mensaje error ">Inicia sesion para poder identificarte y poder concretar tu compra. Seras redireccionado al login....</h1>
     </section>

     <?php      include "INC/footer.inc";?> 
                <script src="JS/header.js"></script> 
                <script src="JS/cookies.js"></script>
                <script src="JS/scriptCarritoItems.js"></script> 
         </body>
    </html>
    <?php       
                header('Refresh:5; url=login.php');
                exit;
        else:
    ?>
     
     <div class="contenido">
         <div class="titulo">
             <h3>Verifique Su Orden</h3>
         </div>
         <div class="info">
             <table class="table">
                <thead>
                    <tr>
                        <th class="column-pedido">Pedido</th>
                        <th class="column-cantidad">Cantidad</th>
                        <th class="column-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                        include "PHP/carritoOrdenes.php";
                    ?>
                </tbody>
            </table>

            <div class="total">
                 <div class="datos">
                     <p>Subtotal</p><p id="subtotal" class="gridCenter">$99.9</p>
<!--                     <p>Promocion</p><p class="gridCenter">$0.0</p>-->
                     <p>Propina</p><select id="propina" name="propina" class="gridCenter">
                                    <option value="1.10" selected>10%</option>
                                    <option value="1.15">15%</option>
                                    <option value="1.20">20%</option>
                                    <option value="1.25">25%</option>
                                  </select>
                     <p>Total</p><p id="total" class="gridCenter">$99.9</p>
                 </div>
                 <button id="btnCompra">Continuar con la orden</button>
             </div>
        </div>
     </div>
    
    <?php 
    endif;
    
    include "INC/footer.inc";?> 
    
    <script src="JS/header.js"></script> 
    <script src="JS/cookies.js"></script>
    <script src="JS/carritoCookies.js"></script> 
    <script src="JS/scriptCarritoItems.js"></script>   
    <script src="JS/scriptCarrito.js"></script> 

</body>
</html> 