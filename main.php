<?php

include_once("include.php");
//Création de la pizzeria
$PizMario = new PizzeriaMario();

//Génération des ingrédients
$Champignon = IngController::create("Champignon");
$Jambon = IngController::create("Jambon");
$Oignion = IngController::create("Oignion");
$Olive = IngController::create("Olive");
$Mozarella = IngController::create("Mozarella");
$Salade= IngController::create("Salade");

//Ajout des ingrédients au stock de la pizerria
$PizMario->ajoutIngStock($Oignion);
$PizMario->ajoutIngStock($Jambon);
$PizMario->ajoutIngStock($Champignon);
$PizMario->ajoutIngStock($Olive);
$PizMario->ajoutIngStock($Salade);
$PizMario->ajoutIngStock($Mozarella);

//Tentative de création d'une pizza alors que les ingrédients nécessaire ne sont plus en stock
echo "<h1>Commande d'une pizza alors qu'il n'y a plus les stock</h1>";
$Commande0 = new Commande();
$Pizza = $PizMario->commanderPizza('Regina');
$Commande0->ajout($Pizza); //Ajout de cette pizza dans la commande
$Commande0->papierCommande(); //Donne une papier de la commande
$Commande0->clientPaye(30,$PizMario); //Test de si le client a payé et lance la préparation de la pizza

//Ajout d'ingrédient dans le stock 
$PizMario->ajoutQtitIng($Champignon,10);
$PizMario->ajoutQtitIng($Olive,10);
$PizMario->ajoutQtitIng($Jambon,10);
$PizMario->ajoutQtitIng($Mozarella,10);
$PizMario->ajoutQtitIng($Oignion,10);
$PizMario->ajoutQtitIng($Salade,10);


echo "<h1>Commande d'une pizza existante (modifiée)</h1>";
//Commande d'une pizza existante modifiée
$Commande1 = new Commande();  //Création d'une nouvelle commande
$ListeIngRet = [$Champignon,$Jambon]; //Ajout des ingrédients non voulu par le client dans un tableau
$ListeIngPlus = [$Olive]; //Ajout des ingrédients supplémentaire que le client veut 
$Pizza2 = $PizMario->commanderPizzaModif('Regina',$ListeIngRet,$ListeIngPlus); //Instanciation de la pizza
$Commande1->ajout($Pizza2); //Ajout de cette pizza dans la commande
$Commande1->papierCommande(); //Donne un papier de la commande
$Commande1->clientPaye(30,$PizMario); //Test de si le client a payé et lance la préparation de la pizza

echo "<h1>Commande d'une pizza Custom</h1>";
//Commande d'une Pizza Custom 
$Commande2 = new Commande();
$sauce = 'Crême'; //Choix de la base de la pizza
$ListeIng = [$Oignion,$Jambon,$Champignon,$Mozarella]; //Liste des ingrédients voulu
$PizzaCustom = $PizMario->commanderPizzaCustom('Custom',$sauce,$ListeIng); //Création de la pizza custom
$Commande2->ajout($PizzaCustom);
$Commande2->papierCommande();
$Commande2->clientPaye(30,$PizMario);

echo "<h1>Commande d'une pizza qui a été modifié par le Pizzaiolo</h1>";
//Le pizzaiolo change de recette le prix et de nom de pizza
PizzaRegina::setNom('Regina Orientale');// Changement de nom
PizzaRegina::setPrix(14);// Changement de prix
$ListeIng = [$Oignion,$Jambon,$Olive,$Salade];
PizzaRegina::setIng($ListeIng); //Changement de la recette 

//Pour commander cette nouvelle pizza faut toujours appeler la même class que celle de l'ancienne 
$Commande3 = new Commande();
$Pizza3 = $PizMario->commanderPizza('Regina');
$Commande3->ajout($Pizza3);
$Commande3->papierCommande();
$Commande3->clientPaye(30,$PizMario);

echo "<h1>Commande de plusieurs pizza + pizza retirée lors de la commande</h1>";
//Création d'une commande pour plusieurs pizzas 
$Commande4 = new Commande();
$Pizza4 = $PizMario->commanderPizza('Regina');
$Commande4->ajout($Pizza4);
$Pizza5 = $PizMario->commanderPizza('Regina');
$Commande4->ajout($Pizza5);
$sauce = 'Crême';
$ListeIng = [$Oignion,$Jambon,$Champignon,$Mozarella,$Olive];
$Pizza6 = $PizMario->commanderPizzaCustom('Custom',$sauce,$ListeIng);
$Commande4->ajout($Pizza6);
$Commande4->retirerPizza($Pizza5); // Retrait d'une pizza ajouté par erreur dans la commande 
//Si la commande est validé
$Commande4->papierCommande();
$Commande4->clientPaye(30,$PizMario);