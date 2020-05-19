<?php

namespace App;

abstract class Entity {
    /**
     *
     * @var int
     */
    protected $id;
    protected $errors = [];


    public function __construct(array $data = []) {
        $this->hydrate($data);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * 
     * @param array $data
     */
    private function hydrate(array $data){
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if(method_exists($this, $setter)){
                $this->$setter($value);
            }
        }
    }
    
    public function getErrors() {
        return $this->errors;
    }

    public function setErrors($errors) {
        $this->errors = $errors;
        return $this;
    }

    public function addErrors($error) {
        $this->errors[] = $error;
        return $error;
    }
    
}
