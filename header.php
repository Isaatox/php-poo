<?php
function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

//On enregistre la fonction en 
//Pour qu'elle soi appelée dès qu'on instanciera une classe non déclarée.
spl_autoload_register('chargerClasse');

include "conf.php";