<?php

require_once 'peticiones.php';

if($_POST) {
    $peticiones = new Peticiones();
    $result = $peticiones->confirmPlatilloPrice();
    echo $result;
}