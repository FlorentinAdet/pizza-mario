<?php
abstract class Pizzeria 
{
    protected static $StockIng = [];

    public function __construct(){

    }
     /**
       * Retourne un objet de la pizza démande (Ex : $type="Regina" Retourne un objet de type PizzaRegina)
       * $type : Chaine de caractère contenant le nom de la pizza commandé
       */
    protected abstract function creerPizza($type); 

    /**
     *  Fonction qui prépare une pizza
     * Regarde si la création de la pizza est poissible en regardant le stock des ingrédients
     * Met à jour le stock des ingrédients en fonction de ceux utilisé par la pizza 
     * Exécute toutes les actions essentielles pour préparer une pizza
     * $pizza : Objet de type pizza
     */
    abstract static function preparePizza($pizza);

    /**
    * Commande d'une pizza classique
    * $type : Chaine de caractère contenant le nom de la pizza commandé
    */
    abstract function commanderPizza($type);

    /**
     * Retourne une pizza existante avec les ingrédients en plus et en moins à appliqué à celle-ci
     * $listeIngRet=[] : Liste des ingrédients en moins
     * $listeIngPlus=[] : Liste des ingrédients en plus
     */
    abstract function commanderPizzaModif($type,$listeIngRet,$listeIngPlus);      

    /**
     * Retourne une pizza avec la sauce et les ingrédients choisis
     * $sauce : Nom de la base de la pizza
     * $ListeIng : Listes des ingrédients choisis par le client
     */
    abstract function commanderPizzaCustom($type,$sauce,$ListeIng);

    /**
     * Ajout un ingrédient au stock de la pizzeria
     * $Ing : Objet de type ingrédient
     */
    abstract function ajoutIngStock($Ing);

    /**
     * Retourne le stock d'indrégient de la pizzeria
     */
    abstract function getStock();

    /**
     * Regarde si la création de la pizza est possible en regardant si les ingrédients nécessaire pour la faire sont en stock
     * $ListeIng : Liste d'ingrédient de la pizza 
     */
    abstract static function creaPizPossible($ListeIng);

    /**
     * Met à jour le stock de la pizzeria
     * $ListeIng : Liste d'ingrédients 
     */
    abstract static function updateStock($ListeIng);

    /**
     * Ajout de la quantité à un ingrédient du stock
     * $Ing : Objet de type Ingrédient
     * $NbStock : Int indiquant la quantité de l'ingrédient à ajouter 
     */
    abstract function ajoutQtitIng($Ing,$NbStock);

}
?>
