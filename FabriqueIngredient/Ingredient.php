<?php 

abstract class Ingredient{
    protected $ref;
    protected $nom;
    protected $type=null;

    public function __construct($ref){
        $this->ref = $ref;
    }
    public function getType(){
        return $this->type;
    }
    public function getRef(){
        return $this->ref;
    }
    public function getNom(){
        return $this->nom;
    }  
}

