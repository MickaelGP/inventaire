<?php
namespace App;

class Recherche{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function rechercheInventaire(string $element)
    {
        $query = $this->pdo->prepare("SELECT * FROM inventaire WHERE aliments LIKE '%$element%' OR dates LIKE '%$element%'");
        $query->execute();
        $query->setFetchMode($this->pdo::FETCH_ASSOC);
        $result = $query->fetchAll();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}