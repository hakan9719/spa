<?php

namespace App\Manager;
use Vendor\Manager\Manager;

class ArticleManager extends Manager{

    protected $db;
    protected $table = "articles";


    public function create ($article)
    {
        $statement = "INSERT INTO articles (title, content) 
                        VALUES (:title, :content)";
        
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $article->getTitle());
        $prepare->bindValue(":content", $article->getContent());
        $prepare->execute();
    }
    
    public function getOne($id)
    {
        $query = $this->db->query("SELECT * FROM articles WHERE id =".$id['id']);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Articles")[0];
    }

    public function update($article,$id)
    {
        $statement = "UPDATE articles SET title = :title, content = :content WHERE id =".$id." ";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $article->getTitle());
        $prepare->bindValue(":content", $article->getContent());
        $prepare->execute();
    }
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM articles WHERE id =".$id['id']);
    }

}