<?php 
if(!isset($_SESSION['idUser']) && !isset($_SESSION['nombre']) && !isset($_SESSION['tipoUsuario'])){
    $login = false;
}else{
    $login = true;
}
?>
<header>
        <div id="headerUp">          
            <figure>
                <img src="IMG/logito.png" alt="logo">
                <div id="titulosLogo">
                    <p id="heyTi">La Padua!</p>
                    <p id="espaciosTi">La Casa de la Pizza</p>
                </div>
            </figure>
            
            
            <button id="menuButton" class="hamburger hamburger--elastic" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
<?php $archivoactual = $_SERVER['SCRIPT_NAME']; 
    if($archivoactual == "/ProyectoWeb/index.php"):
?>
        <nav id="myTopnav">
            <ul>
                <li><a href="#ahome" class="active"  onclick="desactivarNav()">Home</a></li>
                <li><a href="menu.php" onclick="desactivarNav()">Menu</a></li>
                <li><a id="carritoNav" href="carrito.php" onclick="desactivarNav()">Carrito</a></li>
                <?php if(!$login):?>
                <li><a href="login.php" onclick="desactivarNav()">Login</a></li>
                <?php endif; ?>
                <li><a href="#asobre" onclick="desactivarNav()">Sobre Nosotros</a></li>
                <li><a href="#agaleria" onclick="desactivarNav()">Galeria</a></li>
                <li><a href="#asiguenos" onclick="desactivarNav()">Síguenos</a></li>
                <li><a href="#acontacto" onclick="desactivarNav()">Contacto</a></li>
                <?php if($login):?>
                <li><a href="cerrar.php" onclick="desactivarNav()">(Cerrar Sesión)</a></li>
                <?php endif; ?>
            </ul>
        </nav>
<?php 
    elseif($archivoactual == "/ProyectoWeb/clientes.php"):
?>        
    <nav id="myTopnav">
            <ul>
                <li><a href="index.php" class="active"  onclick="desactivarNav()">Home</a></li>
                <li><a href="index.php#asobre" onclick="desactivarNav()">Sobre Nosotros</a></li>
                <li><a href="index.php#agaleria" onclick="desactivarNav()">Galeria</a></li>
                <li><a href="index.php#asiguenos" onclick="desactivarNav()">Síguenos</a></li>
                <li><a href="index.php#acontacto" onclick="desactivarNav()">Contacto</a></li>
                <?php if($login):?>
                <li><a href="cerrar.php" onclick="desactivarNav()">(Cerrar Sesión)</a></li>
                <?php endif; ?>
            </ul>
        </nav>        
<?php 
    else:
?>        
    <nav id="myTopnav">
            <ul>
                <li><a href="index.php" class="active"  onclick="desactivarNav()">Home</a></li>
                <li><a href="menu.php" onclick="desactivarNav()">Menu</a></li>
                <li><a id="carritoNav" href="carrito.php" onclick="desactivarNav()">Carrito</a></li>
                <?php if(!$login):?>
                <li><a href="login.php" onclick="desactivarNav()">Login</a></li>
                <?php endif; ?>
                <li><a href="index.php#asobre" onclick="desactivarNav()">Sobre Nosotros</a></li>
                <li><a href="index.php#agaleria" onclick="desactivarNav()">Galeria</a></li>
                <li><a href="index.php#asiguenos" onclick="desactivarNav()">Síguenos</a></li>
                <li><a href="index.php#acontacto" onclick="desactivarNav()">Contacto</a></li>
                <?php if($login):?>
                <li><a href="cerrar.php" onclick="desactivarNav()">(Cerrar Sesión)</a></li>
                <?php endif; ?>
            </ul>
        </nav>

<?php 
    endif;
?>

</header>

<div id="espacio"></div> <!--  espacio para el header pagina-->
