<?php

class PizzaCustom extends Pizza
{ 
  private $nom="Pizza Custom";
  private $sauce= "";
  private $prix=15;
  private $Ingredient=[];
  function __construct() {
    
  }

  public function preparer(){
    echo "Préparation de la pizza '".$this->nom."'...<br>";
    echo "Étalage de la pâte...<br>";
    echo "Ajout de la base : ".$this->sauce."...<br>";
    echo "Ajout des ingrédients : <br> ";
    foreach ($this->Ingredient as $Ing) {
      echo "-".$Ing."<br>";
    }
  }
  public function cuire(){
    echo "Cuisson de 20 minutes à 200°C...<br>";
  }
  
  //Retourne le nom de la pizza
  public function getNom()
  {
      return $this->nom;
  }  
 // Retourne la base de la pizza
 public function getSauce()
 {
     return $this->sauce;
 }
 // Retourne une liste des noms des ingrédients
 public function getIng()
 {
     return $this->Ingredient;
 }
 // Retourne le prix à payer 
 public function getPrix(){
     return $this->prix;
 }

 public function setIng($ListeIng)
 {
   foreach ($ListeIng as $Ing) {
       array_push($this->Ingredient,$Ing->getNom());
   }
 }

  public function setSauce($sauce2){
      $this->sauce = $sauce2;
  } 
  public function setPrix($prix2){
      $this->prix = $prix2;
  } 
  public function retirerIng($IngRet)
  {
      foreach ($this->Ingredient as $Ing) {
          if($Ing==$IngRet->getNom()){
              $cle = array_search($IngRet->getNom(),$this->Ingredient);
              unset($this->Ingredient[$cle]);
          }
      }
  }
  public function ajoutIng($IngAjout)
  {
      array_push($this->Ingredient,$IngAjout->getNom());
  }
  public function modifPizza($ListeIng)
  {
      $this->Ingredient=$ListeIng;
  }
  }
