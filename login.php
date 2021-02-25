
<?php 

session_start();

if( (isset($_SESSION['idUser']) && isset($_SESSION['nombre']) && isset($_SESSION['tipoUsuario'])) || isset($_COOKIE['nombre'])){
    
    if( isset($_COOKIE['nombre']) ){
        $_SESSION['idUser'] = $_COOKIE['idUsuario'];
        $_SESSION['nombre'] = $_COOKIE['nombre'];
        $_SESSION['tipoUsuario'] = $_COOKIE['tipoUsuario'];
    }
    
    header("Location: menu.php");
    exit;
    
}


include "PHP/Template.php";?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "INC/headMeta.inc";?>

    <link rel="stylesheet" href="CSS/styleLogin.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <script src="JS/jquery-3.3.1.min.js"></script>


</head>

<body>


    <?php include "INC/header.inc";?>

    <div id="modal">
        <div class="contenido">
            <form id="formOlvido">
                <div class="instrucciones">
                    <h3>Ingrese su correo electrónico recuperar su contraseña.</h3>
                    <div class="formCampo">
                        <input name="correo" type="text" placeholder="Tu Correo" required>
                    </div>
                </div>
                <div class="botonesModal">
                    <div class="formCampo">
                        <input name="regresar" id="regresar" type="button" value="Regresar">
                    </div>
                    <div class="formCampo">
                        <input name="enviarCorreo" id="enviarCorreo" type="submit" value="Enviar">
                    </div>
                </div>
                <h1 id="mensaje2" class="mensaje error">
                </h1>
            </form>
        </div>
    </div>

    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "Login");
            echo $profile->output();
     ?>

    <section class="sectionForm">
        <div class="tituloSectionForm">
            <h3>Acceda a Su Cuenta</h3>
        </div>
        <h1 id="mensaje" class="mensaje error">
        </h1>
        <form class="formComplete" id="formLogin">
            <div id="soloInputs">
                <div class="formCampo">
                    <label for="usuario">Correo o Telefono:</label>
                    <input name="usuario" type="text" placeholder="Tu Correo o Telefono" required>
                </div>
                <div class="formCampo contra">
                    <label for="clave">Contraseña:</label>
                    <input name="clave" type="password" placeholder="Tu Contraseña" required>
                </div>
            </div>
            <a id="olvidado" href="#">¿Has olvidado tu contraseña?</a>
            <div class="botones">
                <div class="formCampo">
                    <a href="registrarse.php">Crear Cuenta</a>
                </div>
                <div class="formCampo">
                    <input id="enviar" name="enviar" type="submit" value="Entrar">
                </div>
            </div>
            <div class="formCampo recordar">
                <input type="checkbox" id="recordar" name="recordar" />
                <label for="recordar"><span></span>Recordar Contraseña</label>
            </div>
        </form>

    </section>

    <?php include "INC/footer.inc";?>

    <script src="JS/header.js"></script>
    <script src="JS/scriptLogin.js"></script>
    <script src="JS/cookies.js"></script>
    <script src="JS/scriptCarritoItems.js"></script>

</body>

</html>  