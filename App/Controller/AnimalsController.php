<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Manager\AnimalsManager;

class AnimalsController {

    public function __construct()
    {
        $this->manager = new AnimalsManager;
    }

    public function home()
    {
        $animals = $this->manager->getList();
        include ROOT."/templates/homeView.php";
    }

    public function animals()
    {
        $animals = $this->manager->getList();
        include ROOT."/templates/Animals/animalsView.php";
    }

    public function animal($id)
    {
        $animal = $this->manager->getOne($id);
        include ROOT."/templates/Animals/animalView.php";
    }

    public function addAnimal(/* $data */)
        {
            if (!empty($_POST)) {
                $animal = new Animals();
                $animal->hydrate($_POST);
                $this->manager->create($animal);
                header("Location:index.php?page=animals");
            }
            
            include ROOT."/templates/Animals/addAnimal.php";
        }
}