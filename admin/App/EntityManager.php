<?php

namespace App;

abstract class EntityManager {
    /**
     *
     * @var \PDO
     */
    protected $pdo;
    
    public function __construct() {
        $this->pdo = PDOFactory::getPDO();
    }
    
}
