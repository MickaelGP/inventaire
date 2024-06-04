<?php
namespace App;
use \PDO;
class Table{
    protected $pdo;

    protected $table = null;
    protected $class = null;

    public function __construct(PDO $pdo)
    {
        if($this->table === null){
            throw new \Exception("La classe n'a pas de propriété table");
        } 
        if($this->class === null){
            throw new \Exception("La classe n'a pas de propriété class");
        }
        $this->pdo = $pdo;
    }

 
}