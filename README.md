<p align="center">
  <img width="30%" src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" />
</p>

# <p align="center"><a href="https://gladform.000webhostapp.com" align="center">Happy Form </a></p>
## <p align="center"> Formulaire pour gérer une base de donnée client </p>

### Buts

le but est d'apprendre pour le première fois deux types de compétences fondamentales:
- Usage du MVC (Model View Controller) pour la version en deux pages : HappyFormTwoPage.
- Usage de la technologie AJAX pour ne pas devoir recharger la page pour la version "OnePage": HappyFormOnePage.

## Technologie

Langages: PHP 8.1/JavaScript/HTML/CSS<br/>
Base de donnée: SQL/MySQL<br/>
Serveur: Apache

## Installation

Importer le fichier dans votre IDE via un git clone.<br/>

**Avec Docker, lancez la commande suivante:<br/>**
Allez dans HappyFormTwoPage
```bash
docker compose up -d --build
````
Puis dans le dossier où se trouve le package.json:
```bash
npm install
```

**Sans Docker ou sur la version "OnePage":**
Utilisez votre configuration custom ou via des outils comme MAMP, XAMPP etc...
Technologies nécessaire: Apache, PHP 7.4 ou +, MySQL, Node (pour npm)
Importer ou créer la base de donnée qui se trouve dans le repo: veiller à modifier les fichiers db_connexion (dans le model ou dans le dossier "data").<br/>
Utiliser localhost pour utiliser le projet. 

## Evolution 

Sur la base de ce formulaire, il est possible de penser de nombreuses fonctionnalités au service d'une organisation devant gérer ses données clients.
- Classer et ordonner les clients
- Ajouter des colonnes et des tables dans la base de donnée comme le fait d'avoir une réduction ou non
- Mieux intégrer les enjeux de sécurité
- Protéger l'ensemble par un formulaire d'accés au formulaire de gestion
- Repenser le router (abandonner le switch case) et repenser la POO.
- Ajouter l'autoload (via composer).
