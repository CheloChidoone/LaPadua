<?php 
session_start();

if( (isset($_SESSION['idUser']) && isset($_SESSION['nombre']) && isset($_SESSION['tipoUsuario'])) || isset($_COOKIE['nombre'])){
    
    if( isset($_COOKIE['nombre']) ){
        $_SESSION['idUser'] = $_COOKIE['idUsuario'];
        $_SESSION['nombre'] = $_COOKIE['nombre'];
        $_SESSION['tipoUsuario'] = $_COOKIE['tipoUsuario'];
    }
    
    header("Location: index.php");
    exit;
    
}

require "PHP/Template.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php include "INC/headMeta.inc";?>

    <link rel="stylesheet" href="CSS/styleRegistrarse.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <script src="JS/jquery-3.3.1.min.js"></script>
    
</head>
<body>   
    
    <?php include "INC/header.inc";?> 

    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "CrearCuenta");
            echo $profile->output();
     ?>
    
    <section class="sectionForm">
        <div class="tituloSectionForm">
            <h3>Cliente Nuevo</h3>
        </div>
		<form class="formComplete" id="formCrear">
                <div id="soloInputs">
                    <div class="formCampo">
                        <input name="correo" type="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="formCampo">
                        <input name="telefono" type="tel" placeholder="Telefono" required>
                    </div>
                    <div class="formCampo">
                        <input name="nombre" type="text" placeholder="Nombre(s)" required>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampo">
                            <input name="paterno" type="text" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="formCampo">
                            <input name="materno" type="text" placeholder="Apellido Materno" required>
                        </div>
                    </div>
                    <div class="formCampo">
                        <input name="contrasena" type="password" placeholder="Contraseña" required>
                    </div>
                    <div class="formCampo">
                        <input name="contrasena2" type="password" placeholder="Confirmar Contraseña" required>
                    </div>
                    <div class="tituloSectionForm">
                        <h3>Direccion</h3>
                    </div>
                    <div class="formCampo">
                        <input name="nombreDireccion" type="text" placeholder="Nombre de Tu direccion.(Ej: Casa, oficina, escuela)" required>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampo">
                            <input name="codigoPostal" type="text" placeholder="Codigo Postal" required>
                        </div>
                        <div class="formCampo">
                            <input name="colonia" type="text" placeholder="Colonia" required>
                        </div>
                    </div>
                    <div class="doubleColumn">
                        <div class="formCampo">
                            <input name="numeroExterno" type="number" placeholder="Numero Externo" required>
                        </div>
                        <div class="formCampo">
                            <input name="numeroInterno" type="number" placeholder="Numero Interno(opcional)">
                        </div>
                    </div>
                    <div class="formCampo">
                        <input name="calle" type="text" placeholder="Calle" required>
                    </div>
                    <div class="formCampo">
                        <input name="cruzamientos" type="text" placeholder="Cruzamientos" required>
                    </div>
                    <div class="formCampo">
                        <textarea name="informacionAdicional" id="informacionAdicional" cols="30" rows="5" placeholder="Informacion Adicional Direccion" required></textarea>
                    </div>
                </div>
                <div class="botones">
                    <div class="formCampo">
                        <a href="login.php">Regresar</a>
                    </div>
                    <div class="formCampo">
                        <input name="crear" type="submit" value="Crear Cuenta">
                    </div>
                </div>
                
                <h1 tabindex="0" id="mensaje" class="mensaje error">
                 </h1>
            </form>
    </section>
    
    <?php include "INC/footer.inc";?> 
    
    <script src="JS/header.js"></script>
    <script src="JS/scriptCrearCuenta.js"></script>
    <script src="JS/cookies.js"></script>
    <script src="JS/scriptCarritoItems.js"></script>

</body>
</html>   