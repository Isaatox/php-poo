<?php
// Présence du mot-clé class suivi du nom de la classe.

class Personnage
{

    // Déclaration des attributs et méthodes ici
    private $_id = 0;
    private $_nom = "Inconnu";  // son nom, par défaut 'Inconnu'
    private $_force = 50;       // La force du personnage, par défaut est à 50
    private $_experience = 1;   // Son expérience, par défaut est à 1
    private $_degats = 0;       // Ses dégâts par défaut
    private $_niveau = 0;

    const FORCE_PETITE  = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE  = 80;

    private static $_texteADire = 'La partie est démarré. Qui veut se battre !<br/>';
    private static $_nbreJoueurs = 0;

    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
        self::$_nbreJoueurs++;
        print('<br/>Le personnage "'.$ligne['nom'].'" à été créé !');

    }


    public function hydrate(array $ligne)
    {

        $this->setNom($ligne['nom']);         //init nvx perso
        $this->setForce((int)$ligne['force']);     //init de la force
        $this->setDegats($ligne['degats']);   //init des dégats
        $this->setNiveau($ligne['niveau']);
        $this->setExperience(1);     //init expérience à 1

    }

    public function __toString():string
    {
        return $this->getNom(); // . " (" . $this->getDegats() . ")";
    }

    public function setNom(string $nom):Personnage
    {
        if (!is_string($nom)) //s'il ne s'agit pas d'un texte
        {
            trigger_error('Le nom d\'un personnage doit être un texte',E_USER_ERROR);
            return $this;
        }
        $this->_nom = $nom;
        return $this;

    }

    public function getNom():string
    {
        return $this->_nom;
    }

    public function setId(int $id):Personnage
    {
        if (!is_int($id)) //s'il ne s'agit pas d'un entier
        {
            trigger_error('L\'id d\'un personnage doit être un entien',E_USER_ERROR);
            return $this;
        }
        $this->_id = $id;
        return $this;

    }

    public function getId():int
    {
        return $this->_id;
    }


    public function setNiveau(int $niveau):Personnage
    {
        if (!is_int($niveau)) //s'il ne s'agit pas d'un entier
        {
            trigger_error('Le Niveau d\'un personnage doit être un entien',E_USER_ERROR);
            return $this;
        }
        $this->_niveau = $niveau;
        return $this;

    }

    public function getNiveau():int
    {
        return $this->_niveau;
    }

    public function setForce(int $force):Personnage
    {
        if (!is_int($force)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('Le force d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return $this;
        }

        if ($force > 100 ) //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieur à 100
        {
            trigger_error('Le force d\'un personnage ne peut dépasser 100',E_USER_WARNING);
            return $this;
        }

        if (in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE))){
            $this->_force = $force;
        }
        else{
            trigger_error('La force n\'est pas correcte', E_USER_ERROR);
            return $this;
        }
        return $this;

    }

    public function getForce():int
    {
       return $this->_force;
    }

    public function setDegats(int $degats):Personnage
    {
        if (!is_int($degats)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('Les degats d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return $this;
        }
        $this->_degats = $degats;
        return $this;

    }

    public function getDegats():int
    {
        return $this->_degats;
    }

    public function setExperience(int $experience):Personnage
    {
        if (!is_int($experience)) //s'il ne s'agit pas d'un nombre entier
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier',E_USER_WARNING);
            return $this;
        }

        if ($experience > 100) //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieur à 100
        {
            trigger_error('L\'expérience d\'un personnage ne peut pas dépasser 100',E_USER_WARNING);
            return $this;
        }
        $this->_experience = $experience;
        return $this;

    }

    public function getExperience():int
    {
        return $this->_experience;
    }


    public static function parler()
    { // Nous déclarons une méthode dont le seul but est d'afficher un texte
        print('<br/>Je suis un personnage n°'.self::$_nbreJoueurs.'<br/>'. self::$_texteADire.'<br/>');
    }

    // Une méthode qui frappera un personnage (suivant la force qu'il a).
    public function frapper(Personnage $adversaire):Personnage
    {
        // $adversaire->_degats = adversaire->_degats + $this->$force;
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
        print('<br/>' . $adversaire->getNom() . ' a été frappé par ' . $this->__toString() . ' -> Dégats de ' . $adversaire->__toString() . ' = ' . $adversaire->getDegats());
        print('<br/>' . $this->getNom() . ' a reçu ' . $this->getExperience() . ' points d\'expérience !<br/>');
        return $this;

    }

    public function result():Personnage
    {
        print('<br/>' . $this->getNom() . ' : Force = '
        . $this->getForce() . ' | Dégats = '
        . $this->getDegats() . ' | Expérience = '
        . $this->getExperience());
        return $this;

    }

    // Une méthode augmentant l'attribut $experience du personnage.
    public function gagnerExperience():Personnage
    {
        $this->_experience++;
        return $this;
    }



}

?>