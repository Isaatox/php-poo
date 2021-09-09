<?php
// Présence du mot-clé class suivi du nom de la classe.

class Personnage
{

    // Déclaration des attributs et méthodes ici
    private $_nom = "Inconnu";  // son nom, par défaut 'Inconnu'
    private $_force = 50;       // La force du personnage, par défaut est à 50
    private $_experience = 1;   // Son expérience, par défaut est à 1
    private $_degats = 0;       // Ses dégâts par défaut

    public function __construct($nom, $force = 50, $degats = 0)
    {
        $this->setNom($nom);         //init nvx perso
        $this->setForce($force);     //init de la force
        $this->setDegats($degats);   //init des dégats
        $this->setExperience(1);     //init expérience à 1
        
        print('Le personnage "'.$nom.'" à été créé !<br/>');
    }

    public function __toString()
    {
        return $this->getNom(); // . " (" . $this->getDegats() . ")";
    }

    public function setNom($nom)
    {
        if (!is_string($nom)) //s'il ne s'agit pas d'un texte
        {
            trigger_error('Le nom d\'un personnage doit être un texte',E_USER_ERROR);
            return;
        }
        $this->_nom = $nom;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function setForce($force)
    {
        if (!is_int($force)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('Le force d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return;
        }

        if ($force > 100 ) //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieur à 100
        {
            trigger_error('Le force d\'un personnage ne peut dépasser 100',E_USER_WARNING);
            return;
        }
        $this->_force = $force;
    }

    public function getForce()
    {
       return $this->_force;
    }

    public function setDegats($degats)
    {
        if (!is_int($degats)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('Les degats d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return;
        }
        $this->_degats = $degats;
    }

    public function getDegats()
    {
        return $this->_degats;
    }

    public function setExperience($experience)
    {
        if (!is_int($experience)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return;
        }

        if ($experience > 100) //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieur à 100
        {
            trigger_error('L\'expérience d\'un personnage ne peut pas dépasser 100',E_USER_WARNING);
            return;
        }
        $this->_experience = $experience;
    }

    public function getExperience()
    {
        return $this->_experience;
    }


    public function parler()
    { // Nous déclarons une méthode dont le seul but est d'afficher un texte
        print('Je suis un personnage !');
    }

    // Une méthode qui frappera un personnage (suivant la force qu'il a).
    public function frapper(Personnage $adversaire)
    {
        // $adversaire->_degats = adversaire->_degats + $this->$force;
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
        print('<br/>' . $adversaire->getNom() . ' a été frappé par ' . $this->__toString() . ' -> Dégats de ' . $adversaire->__toString() . ' = ' . $adversaire->getDegats());
        print('<br/>' . $this->getNom() . ' a reçu ' . $this->getExperience() . ' points d\'expérience !<br/>');
    }

    // Une méthode augmentant l'attribut $experience du personnage.
    public function gagnerExperience()
    {
        $this->_experience++;
    }

}

?>