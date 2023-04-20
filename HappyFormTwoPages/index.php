<?php
// Formatage des routes
require_once __DIR__ . '/Router/PathMaker.php';
$pathMaker = new PathMaker(__DIR__);

// Appel du routeur
require_once $pathMaker->getFilePath('Router.php','router');
$routeur = new Router();

// Appel des contrôleurs
require_once $pathMaker->getFilePath('CustomerFormController.php','controllers');
$customerFormController = new CustomerFormController();

// Liste des routes
$routeur->addRoute("accueil", array($customerFormController, "accueil"));
$routeur->addRoute("formulaire", array($customerFormController, "page1"));
$routeur->handleRoutes($customerFormController);

