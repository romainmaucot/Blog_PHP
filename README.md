# Base de PHP - blog

## Base de donnée
Une table *user* ayant pour champs : id (auto_increment primary key), username (unique), password
Une table *article* ayant pour champs : id (auto_increment primary key), title, content, author (référence à *user*)
Une table *commentaire* ayant pour champs : id (auto_increment primary key), username, content, article (référence à *article*)

## Liste des fonctionnalités
### En Backend

* Un espace d'authentification sécurisé (formulaire de login)
* Un formulaire pour ajouter un nouvel article, tout les champs sont obligatoire et l'auteur est l'utilisateur de la session
* Un espace permettant de voir la liste des articles de l'utilisateur avec des liens pour :
    * voir un article (lien en target blank, design du point numéro 3 de la section article)
    * éditer un article
    * supprimer un article
/!\ Cet espace ne doit pas être accessible si on est pas connecté

### En Frontend
#### Formulaire d'inscription
* Faites un formulaire de création d'utilisateur /!\ un username doit être unique
#### Article
1. Un affichage des articles avec une pagination : 5 articles par page
2. Sur chaque article, avoir un lien pour consulter uniquement l'article voulu ainsi que tout les commentaires associés. Il devra y avoir un formulaire pour ajouter un nouveau commentaire.
#### Navbar
* Si vous êtes authentifié sur le back vous devez voir dans la navbar a droite votre username sinon il faudra afficher 2 boutons (signin signup)

## Conseil
* Pensez à la sécurité : mettez en place les actions qui vous semble nécessaire afin de protéger votre site
* Pensez à la facilité de maintiens de votre application : respect des standard de code, la logique métier en anglais, découpage de vos fichiers
* Utilisez au maximum les fonctionnalités de PHP 7.2
* Utilisez un framework CSS (bootstrap/materialize-css)

Bonus: Gerer une image pour les articles (Upload a la creation + affichage)
