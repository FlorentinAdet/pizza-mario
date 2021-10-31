<?php 

class IngFactory
{
    /**
     * Regarde si la classe $Ing existe si c'est le cas crée un objet de la classe $Ing
     * $Ing : String nom de la classe
     * $ref : référence de l'ingrédient
     */
    public static function build($ref,$Ing){
        $oClassIng = ucwords($Ing);
        if(class_exists($oClassIng)){
            return new $oClassIng($ref);
        }
        else
        {
            throw new Exception("invalide création impossible !");
        }
    }
}