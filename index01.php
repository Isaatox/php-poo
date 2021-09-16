<?php

function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

//On enregistre la fonction en autoLoad
//Pour qu'elle soi appelée dès qu'on instanciera une classe non déclarée.
spl_autoload_register('chargerClasse');

print("Pour info, La force Faible = " .Personnage::FORCE_PETITE."<br/> ");
print("Pour info, La force Moyenne = ".Personnage::FORCE_MOYENNE."<br/>");
print("Pour info, La force Grande = " .Personnage::FORCE_GRANDE."<br/> ");

print("<h1>Jeu de combat</h1>");

// On crée deux personnages
$perso1 = new Personnage("Walter");
Personnage::parler();


$perso2 = new Personnage("Leny", Personnage::FORCE_MOYENNE, 0);
Personnage::parler();


print("Dégats du perso 1 = " . $perso1->setNom("Riad")->setExperience(15)->frapper($perso2)->getDegats());
$perso2->frapper($perso1);


print("<br>Résultat du combat : <br>");
$perso1->result();
$perso2->result();

?>