<?php

abstract class Pizza
{
    abstract function preparer(); 
    abstract function cuire();
    public function emballer(){
        echo "Emballage de la pizza <br>";
    }

    
}
