<?php
class PizzeriaMario extends Pizzeria
{
    public function creerPizza($type){ 
        if($type=='Margherita'){
            return new PizzaMargherita();
        }else if($type=='Regina'){
            return new PizzaRegina();
        }else if($type=='Champignon'){
            return new PizzaChampignon();
        }else if($type=='Custom'){
            return new PizzaCustom();
        }
    }
    public static function preparePizza($pizza){
        if(self::creaPizPossible($pizza->getIng())==true){
            self::updateStock($pizza->getIng());
            $pizza->preparer();
            $pizza->cuire();
            $pizza->emballer();
            echo "<br><br>";
        }else{
            echo "<h5>Impossible de créer la pizza ingrédient(s) manquant(s)</h5>";
        }
    }
    public function commanderPizza($type){
        $pizza = $this->creerPizza($type);
        return $pizza;
    }
    public function commanderPizzaModif($type,$listeIngRet,$listeIngPlus)
    {
        $pizza = $this->creerPizza($type);
        $nom =  $pizza->getNom();
        //Retrait des ingrédients à enlever dans la recette de la pizza
        foreach ($listeIngRet as $Ing) {
            $nom .= " sans ".$Ing->getNom();
            $pizza->retirerIng($Ing);
        }
        //Ajout des ingrédients à ajouter dans la recette de la pizza
        foreach ($listeIngPlus as $Ing) {
            $nom .= " avec ".$Ing->getNom();
            $pizza->ajoutIng($Ing);
        }
        $pizza->setNom($nom); //Création du nom de la pizza modifiée
        return $pizza;
    }
    
    public function commanderPizzaCustom($type,$sauce,$ListeIng){
        $pizzaCustom = $this->creerPizza($type);
        $pizzaCustom->setSauce($sauce);
        $pizzaCustom->setIng($ListeIng);
        return $pizzaCustom;
    }
    public static function creaPizPossible($ListeIng){
        $possibleCrea=true;
        foreach ($ListeIng as $Ing) {
            if(Pizzeria::$StockIng[$Ing] <= 0){
                $possibleCrea=false;
                Echo "<h4> Les stocks de '".$Ing."' sont épuisés </h4>";
            }
        }
        return $possibleCrea;
    }
    public function ajoutQtitIng($Ing,$NbStock){
        self::$StockIng[$Ing->getNom()]+=$NbStock;
    }
    public static function updateStock($ListeIng){
        foreach ($ListeIng as $Ing) {
            self::$StockIng[$Ing] -= 1;
        }
    }
    public function getStock(){
        return self::$StockIng;
    }
    public function ajoutIngStock($Ing){
        self::$StockIng[$Ing->getNom()]=0;
    }
    public function ingPizza($listeIngPizza){
        $PizzaIng=[];
        foreach ($listeIngPizza as $IngPizza) {
            foreach (self::$StockIng as $ingStock) {
                if($ingStock->getNom()==$IngPizza){
                    array_push($PizzaIng,$ingStock);
                }
            }   
        }
        return $PizzaIng;
    }
}
