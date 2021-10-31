# PizzaMario

# Personne du groupe : ADET Florentin LAOUER Nathan

# Expérience optimal pour le projet :

Le lancer depuis un navigateur afin de voir les différents simulations préparées

# Les Différentes classes :
-Il y a les classes Ingrédients qui hérite de la classe Ingrédient, elles définissent les différentes caractéristiques des ingrédients
-Il y a les classes Pizza qui hérite de la classe Pizza, elles définissent les différentes caractéristiques des pizzas tels que le nom, les ingrédients ou encore la sauce de celle-ci. Elles hérite de la classe pizza car les pizzas possèdent des comportements communs mais avec certains changement c'est pour cela que ces comportements sont redéfinis dans les classes filles de pizzas.


# Factory Pizzeria (Pizzeria/ Pizzeria.php PizzeriaMario.php Pizza.php model/): 

Une factory Pizzeria a été créé afin de permettre l'extension de l'application sans modification du code. 
Ces extensions peuvent être traduit par l'ajout de nouvelle pizza (créant une nouvelle classe et rajoutant quelque ligne dans la factory de la pizzariaMario), ou encore l'ajout de nouveau plat autre que des pizzas (en créant une nouvelle classe qui gère les nouveaux plats et la classe pizzeriaMario implémentera toutes les fonctionnalités nécessaire) mais aussi l'ajout de nouvelle pizzeria si Mario souhaite s'étendre il suffira juste de créer un nouvelle classe qui héritera de la class Pizzeria(Factory pizzeria).

# Factory Ingrédient (FabriqueIngredient/ IngController.php IngFactory.php Ingredient.php model/) :

La factory permet de créer des ingrédients en déplaçant les appels des objets Ingrédient dans la fabrique IngFactory. Cela permet de changer les classes héritants d'ingrédients plus facilement et d'en rajouter sans touché au code déjà écrit.

# main.php : 

Différentes "histoires" ont déjà été construite on peut toujours essayer d'en rajouter pour tester. 
