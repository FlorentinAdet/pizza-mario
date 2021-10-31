<?php

class Commande
{
    private $ref;
    private $listePizza = [];

    function __construct(){
        $this->ref = self::generateRef(10);
    }
    public function getRef(){
        return $this->ref;
    }
    public function getListePizza(){
        return $this->listePizza;
    }
    public function ajout($pizza){
        array_push($this->listePizza,$pizza);
    }
    /**
     * Retire une pizza de la commande
     */
    public function retirerPizza($Pizza){
        $cle = array_search($Pizza,$this->listePizza);
        unset($this->listePizza[$cle]);
    }
    /**
     *retourne le prix total de la liste des pizzas de la commande
    */ 
    private function getPrixCo(){
        $total = 0 ;
        foreach ($this->listePizza as $Pizza) {
            $total += $Pizza->getPrix();
         }
        return $total;
    }
    /**
     * Retroune un bon de commande avec son prix / les pizzas de la commande et un numéro de référence 
     */
    public function papierCommande(){
        $total = 0;
        echo "<h4> Commande</h4>";
        echo "<h4> Ref : ".$this->ref."</h4>";
        echo "Liste de(s) pizza(s) commandée(s) : <br><br>";
        foreach ($this->listePizza as $Pizza) {
            echo $Pizza->getNom()." : ".$Pizza->getPrix()." € <br>";
        }
        foreach ($this->listePizza as $Pizza) {
           $total += $Pizza->getPrix();
        }
        echo "<br><h4>Total : ".$total." € </h4><br>";
    }
    /**
     * Test si le client a assez d'argent pour payer la pizza et lance la préparatin cette commande
     */
    public function clientPaye($prix,$PizMario){
        if ($prix >= self::getPrixCo()){
            self::prepareCommande($PizMario);
            $ArgentRendu = $prix - self::getPrixCo();
            echo "Argent rendu : ".$ArgentRendu." € ";
        }else{
            echo "Pas assez d'argent pour payer les pizzas";
        }
    }
    /**
     * Prépare les pizzas de la commande 
     */
    public function prepareCommande($PizMario){
        foreach ($this->listePizza as $Pizza) {
            $PizMario::preparePizza($Pizza);
        }
    }
    /**
     * Génère une référence aléatoire pour la commande
     */
    public static function generateRef($length=2){
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i=0; $i < $length; $i++) { 
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }
        return $randomString;
    }
}   