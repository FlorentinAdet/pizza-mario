<?php

class PizzaRegina extends Pizza
{ 
  private static $nom = "Regina";
  private static $sauce = "Tomate";
  private static $prix= 12;
  private static $Ingredient= ['Jambon','Oignion','Champignon'];
  
  /**
   * Function qui prépare une pizza 
   */
  public function preparer(){
    echo "Préparation de la pizza '".self::$nom."'...<br>";
    echo "Étalage de la pâte...<br>";
    echo "Ajout de la base : ".self::$sauce."...<br>";
    echo "Ajout des ingrédients : <br> ";
    foreach (self::$Ingredient as $Ing) {
      echo "-".$Ing."<br>";
    }
  }
  public function cuire(){
    echo "Cuisson de 20 minutes à 200°C...<br>";
  }
  
    //Retourne le nom de la pizza
    public function getNom()
    {
        return self::$nom;
    }  
    // Retourne la base de la pizza
    public function getSauce()
    {
        return self::$sauce;
    }
    // Retourne une liste des noms des ingrédients
    public function getIng()
    {
        return self::$Ingredient;
    }
    // Retourne le prix de la pizza 
    public function getPrix(){
        return self::$prix;
    }

    /**
     * function pour Modifier la liste des ingrédients de la pizza
     */
  public static function setIng($ListeIng)
  {
    $NewIng=[];
    foreach ($ListeIng as $Ing) {
      array_push($NewIng,$Ing->getNom());
    }
    self::$Ingredient = $NewIng;
  } 
  //Set le nom de la pizza
  public static function setNom($nom){
    self::$nom = $nom;
  }
  public static function setSauce($sauce2){
      self::$sauce = $sauce2;
  } 
  public static function setPrix($prix2){
      self::$prix = $prix2;
  } 
  /**
   * Retire un ingrédient 
   */
  public static function retirerIng($IngRet)
  {
      foreach (self::$Ingredient as $Ing) {
          if($Ing==$IngRet->getNom()){
              $cle = array_search($IngRet->getNom(),self::$Ingredient);
              unset(self::$Ingredient[$cle]);
          }
      }
  }
  /**
   * Ajout un ingrédient à la pizza 
   */
  public function ajoutIng($IngAjout)
  {
      array_push(self::$Ingredient,$IngAjout->getNom());
  }
  
}
