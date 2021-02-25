<?php

session_start();


if( isset($_COOKIE['nombre'])){
    $caduca = time()-9305;
    setcookie( 'idUsuario',  $_SESSION['idUser'], $caduca, '/', null, false, true);
    setcookie( 'nombre',  $_SESSION['nombre'], $caduca, '/', null, false, true);
    setcookie( 'tipoUsuario',  $_SESSION['tipoUsuario'], $caduca, '/', null, false, true);
}


session_unset();
session_destroy();


header('Refresh:3; url=index.php');

?>


<?php include "PHP/Template.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php include "INC/headMeta.inc";?>

    <link rel="stylesheet" href="CSS/styleLogout.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <script src="JS/jquery-3.3.1.min.js"></script>
    
</head>
<body>   
    
    <?php include "INC/header.inc";?> 

    <?php 
            $profile = new Template("TEMP/titulo_Pagina.temp");
            $profile->set("titulo", "Logout");
            echo $profile->output();
     ?>
     
     <section id="cont">
         <h1 id="mensaje" class="mensaje error exito">Has cerrado correctamente sesión. Seras redireccionado a la pagina principal.</h1>
     </section>
    
    <?php include "INC/footer.inc";?> 
    
    <script src="JS/header.js"></script>
    <script src="JS/cookies.js"></script>
    <script src="JS/scriptCarritoItems.js"></script>

</body>
</html>