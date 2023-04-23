<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
// Formatage des routes
require_once __DIR__ . '/Router/PathMaker.php';
$pathMaker = new PathMaker(__DIR__);
// Ajout des catégories de chemin de fichiers
$pathMaker->addDirPath('Router/','router');
$pathMaker->addDirPath('controllers/','controllers');
$pathMaker->addDirPath('models/Managers','models');
// Appel du routeur
require_once $pathMaker->getFilePath('Router.php','router');
$routeur = new Router();

// Appel des contrôleurs
require_once $pathMaker->getFilePath('getData.model.php','models');
require_once $pathMaker->getFilePath('postData.model.php','models');
require_once $pathMaker->getFilePath('CustomerFormController.php','controllers');
require_once $pathMaker->getFilePath('AccountsController.php','controllers');
$customerFormController = new CustomerFormController();
$accountsController = new AccountsController();

// Liste des routes
$routeur->addRoute("account", array($accountsController, "loginFormPage"));
$routeur->addRoute("login", array($accountsController, "login"));
$routeur->addRoute("register", array($accountsController, "signUp"));
$routeur->addRoute("out", array($accountsController, "signOut"));
$routeur->handleRoutes($accountsController);
$routeur->addRoute("accueil", array($customerFormController, "accueil"));
$routeur->addRoute("formulaire", array($customerFormController, "page1"));
$routeur->handleRoutes($customerFormController);






