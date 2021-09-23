<?php

class PersonnagesManager
{
    private $_db;

    public function __construct(PDO $db){
        $this->setDB($db);
    }

    public function setDB(PDO $db): PersonnagesManager {
        $this->_db = $db;
        return $this;
    }

    public function add(Personnage $perso):bool {
        //Préparation de la requête d'insertion
        //Assignation des valeurs pour le nom, la force ...
        //Exécution de la requête

    }
    
    
    public function delete(Personnage $perso):bool {
        //Execute une requête de type delete
    }

    public function getOne(int $id) {
        //Execute une requête de type SELECT avec une clause WHERE, et retourne un objet
    }

    public function getList():array {
        $listeDePersonnages = array();
        //Retourne la liste de tous les pers
        $request = $this->_db->query('SELECT id, nom,`force`, degats, niveau,
        experience FROM personnages;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée 
        {
            $perso = new Personnage($ligne);
            $listeDePersonnages[] = $perso;
        }
        return $listeDePersonnages;
    }

    public function update(Personnage $perso):bool {
        //Execute une requête de type UPDATE
    }
}