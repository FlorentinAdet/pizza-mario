<?php
//ajout des classes de la fabrique de pizzeria
include_once("Pizzeria/Pizzeria.php");
include_once("Pizzeria/PizzeriaMario.php");
include_once("Pizzeria/Pizza.php");

//ajout des classe de la fabrique d'ingredients 
include_once("FabriqueIngredient/Ingredient.php");
include_once("FabriqueIngredient/IngController.php");
include_once("FabriqueIngredient/IngFactory.php");

//include de la classe commande 
include_once("Pizzeria/Commande.php");


//Inclue toutes les classes concrètes INGREDIENT
$directory = 'FabriqueIngredient/model';
if( is_dir($directory) ){
	$dossier = opendir($directory);
	while($fichier = readdir($dossier)){
		if(is_file($directory.'/'.$fichier) && $fichier !='/' && $fichier !='.' && $fichier != '..' && strtolower(substr($fichier,-4))==".php"){
			require_once($directory.'/'.$fichier);
		}
	}
	closedir($dossier);
}

//Inclue toutes les classes concrètes PIZZA
$directory = 'Pizzeria/model';
if( is_dir($directory) ){
	$dossier = opendir($directory);
	while($fichier = readdir($dossier)){
		if(is_file($directory.'/'.$fichier) && $fichier !='/' && $fichier !='.' && $fichier != '..' && strtolower(substr($fichier,-4))==".php"){
			require_once($directory.'/'.$fichier);
		}
	}
	closedir($dossier);
}