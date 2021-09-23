<?php

include "header.php";

$id=(int)$_GET["id"];

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse

    $personnesManager = new PersonnagesManager($db);
    $perso = $personnesManager->getOne($id);

print('<table>');
print('<tr>');
print('<td>Personnage :</td>');
print('<tr></tr>');
print('<td>Nom : </td>');
print('<td>'.$perso->getNom().'</td>');
print('<tr></tr>');
print('<td>Force : </td>');
print('<td>'.$perso->getForce().'</td>');
print('<tr></tr>');
print('<td>Dégâts : </td>');
print('<td>'.$perso->getDegats().'</td>');
print('<tr></tr>');
print('<td>Expérience : </td>');
print('<td>'.$perso->getExperience().'</td>');
print('<tr></tr>');
print('<td>Niveau : </td>');
print('<td>'.$perso->getNiveau().'</td>');
print('</tr>');
print('</table>');


    
} catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}

?>