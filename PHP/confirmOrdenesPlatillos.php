<?php

require_once 'peticiones.php';

if($_POST) {
    $peticiones = new Peticiones();
    $result = $peticiones->confirmOrdenesPlatillos();
    echo $result;
}