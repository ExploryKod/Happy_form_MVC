<?php
$pathMaker = new PathMaker(__DIR__);
require_once $pathMaker->getFilePath('Router.php','router');
$routeur = new Router();
$customerFormController = new CustomerFormController();
$routeur->addRoute("accueil", array($customerFormController, "accueil"));
$routeur->addRoute("formulaire", array($customerFormController, "page1"));
$routeur->handleRoutes($customerFormController);

