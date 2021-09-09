<?php
// Présence du mot-clé class suivi du nom de la classe.

class Personnage
{

    // Déclaration des attributs et méthodes ici
    private $_nom = "Inconnu";  // son nom, par défaut 'Inconnu'
    private $_force = 50;       // La force du personnage, par défaut est à 50
    private $_experience = 1;   // Son expérience, par défaut est à 1
    private $_degats = 0;       // Ses dégâts par défaut

    public function definirForce($force)
    {
        $this->_force = $force;
    }

    public function definirDegats($degats)
    {
        $this->_degats = $degats;
    }

    public function definirExperience($experience)
    {
        $this->_experience = $experience;
    }

    public function afficherDegats()
    {
        return $this->_degats;
    }

    public function parler()
    { // Nous déclarons une méthode dont le seul but est d'afficher un texte
        print('Je suis un personnage !');
    }

    // Une méthode qui frappera un personnage (suivant la force qu'il a).
    public function frapper($adversaire)
    {
        // $adversaire->_degats = $adversaire->_degats + $this->$force;
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
    }

    // Une méthode augmentant l'attribut $experience du personnage.
    public function gagnerExperience()
    {
        $this->_experience++;
    }

    public function afficherExperience()
    {
        return $this->_experience;
    }
}

?>