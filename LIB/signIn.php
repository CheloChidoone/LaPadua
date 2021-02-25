<?php 

if( (!isset($_SESSION['idUser']) && !isset($_SESSION['nombre']) && !isset($_SESSION['tipoUsuario']))){
    
    if( isset($_COOKIE['nombre']) ){
        $_SESSION['idUser'] = $_COOKIE['idUsuario'];
        $_SESSION['nombre'] = $_COOKIE['nombre'];
        $_SESSION['tipoUsuario'] = $_COOKIE['tipoUsuario'];
    }
}