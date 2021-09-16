<?php

function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

//On enregistre la fonction en 
//Pour qu'elle soi appelée dès qu'on nciera une classe non déclarée.
spl_autoload_register('chargerClasse');

include "conf.php";
try {
    $db = new PDO($dsn, $user, $password);
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse
    if ($db) {
        print('<br/>Lecture dans la base de données :');
        $request = $db->query('SELECT id, nom,`force`, degats, niveau, experience FROM personnages;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée 
        {
            $perso = new Personnage($ligne);
            print('<br/>' . $perso->getNom() . ' a '. $perso->getForce() . ' de force, ' . $perso->getDegats() 
            . ' de dégats, ' .  $perso->getExperience() . ' d\'expérience et est au niveau ' . $perso->getNiveau());
        }
    }
} catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}

?>