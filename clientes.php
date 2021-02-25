<?php 
session_start();

require "PHP/Template.php";
require 'LIB/config.php';

spl_autoload_register(function($clase){
    require_once "LIB/$clase.php";
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php include "INC/headMeta.inc";?>

    <link rel="stylesheet" href="CSS/styleClientes.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <script src="JS/jquery-3.3.1.min.js"></script>
    
</head>
<body>  
    
    <?php include "INC/header.inc";?> 
    
    <div id="modalClientes" class="modalBlue">
        <dic class="modalBlueContent">
           <form class="formBlue" id="formDatosUsuario">
               <div class="inputsBlue">
                    <div class="tituloFormBlue">
                        <h3>Datos del Cliente</h3>
                    </div>
                    <div class="formCampoBlue">
                        <input id="correo" name="correo" type="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="formCampoBlue">
                        <input id="telefono" name="telefono" type="tel" placeholder="Telefono" required>
                    </div>
                    <div class="formCampoBlue">
                        <input id="nombre" name="nombre" type="text" placeholder="Nombre(s)" required>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampoBlue">
                            <input id="paterno" name="paterno" type="text" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="formCampoBlue">
                            <input id="materno" name="materno" type="text" placeholder="Apellido Materno" required>
                        </div>
                    </div>
                    <div class="tituloFormBlue">
                        <h3>Direccion</h3>
                    </div>
                    <div class="formCampoBlue">
                        <input id="nombreDireccion" name="nombreDireccion" type="text" placeholder="Nombre de Tu direccion.(Ej: Casa, oficina, escuela)" required>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampoBlue">
                            <input id="codigoPostal" name="codigoPostal" type="text" placeholder="Codigo Postal" required>
                        </div>
                        <div class="formCampoBlue">
                            <input id="colonia" name="colonia" type="text" placeholder="Colonia" required>
                        </div>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampoBlue">
                            <input id="numeroExterno" name="numeroExterno" type="number" placeholder="Numero Externo" required>
                        </div>
                        <div class="formCampoBlue">
                            <input id="numeroInterno" name="numeroInterno" type="number" placeholder="Numero Interno(opcional)" required>
                        </div>
                    </div>
                    <div class="formCampoBlue">
                        <input id="calle" name="calle" type="text" placeholder="Calle" required>
                    </div>
                    <div class="formCampoBlue">
                        <input id="cruzamientos" name="cruzamientos" type="text" placeholder="Cruzamientos" required>
                    </div>
                    <div class="formCampoBlue">
                        <textarea id="informacionAdicional" name="informacionAdicional" id="informacionAdicional" cols="30" rows="5" placeholder="Informacion Adicional Direccion" required></textarea>
                    </div>
                </div>
                
               <div class="botonesBlue">
                   <input id="eliminar" type="button" value="Eliminar">
                   <input id="regresar" type="button" value="Regresar">
                   <input id="guardar" type="submit" value="Guardar">
               </div>
           </form>
        </dic>
    </div>
    
    
    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "Clientes");
            echo $profile->output();
     ?>
     
     <section id="tablaClientes">
         <?php 
            $profile = new Template("TEMP/titulo_Section.temp");
            $profile->set("titulo", "Lista Clientes");
            echo $profile->output();
        ?>
        
        <table>
           <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Correo Electronico</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include "PHP/clientesRows.php";
            ?>
            </tbody>
        </table>
        
        <button id="modClientes">Modificar Datos Cliente</button>

     </section>
    
    
    <?php include "INC/footer.inc";?> 
    
    <script src="JS/header.js"></script> 
    <script src="JS/scriptClientes.js"></script>
    
</body>
</html>