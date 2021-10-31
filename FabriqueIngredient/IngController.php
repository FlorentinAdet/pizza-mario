<?php
class IngController
{
    /**
     * Appel la fonction qui crée un objet de la classe $nomInf
     * Et retourne cet objet
     */
    public static function create($nomIng){
        $oIng = IngFactory::build(self::generateRef(8),$nomIng );
        return $oIng;
    }
   /**
    * Créé une référence 
    */
    public static function generateRef($length=2){
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i=0; $i < $length; $i++) { 
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }
        return $randomString;
    }
}
