<?php

namespace App\Manager;
use Vendor\Manager\Manager;

class AnimalManager extends Manager{

    protected $db;
    protected $table = "animal";


    public function create ($animal)
    {
        $statement = "INSERT INTO animal (name, species, size, race,gender,birthdate,color,description,location) 
                        VALUES (:name, :species, :size, :race,:gender,:birthdate,:color,:description,:location)";
        
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $animal->getName()) ;
        $prepare->bindValue(":species", $animal->getSpecies()) ;
        $prepare->bindValue(":size", $animal->getSize()) ;
        $prepare->bindValue(":race", $animal->getRace()) ;
        $prepare->bindValue(":gender", $animal->getGender()) ;
        $prepare->bindValue(":birthdate", $animal->getBirthdate()) ;
        $prepare->bindValue(":color", $animal->getColor()) ;
        $prepare->bindValue(":description", $animal->getDescription()) ;
        $prepare->bindValue(":location", $animal->getLocation());
        $prepare->execute();
    }
    
    public function getOne($id)
    {
        $query = $this->db->query("SELECT * FROM animal WHERE id =".$id['id']);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Animal")[0];

        // $statement = "SELECT * FROM animal WHERE id = ? ";
        // $prepare = $this->db->prepare($statement);
        // $prepare->execute([$id['id']]);
        // $res = $prepare->fetchAll();
        // return $res;
    }

    public function update($article)
    {

    }
    public function delete($id)
    {
        
    }

}