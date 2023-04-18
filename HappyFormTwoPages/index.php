<?php
require_once("./controllers/Controller.php");
require_once("./controllers/CustomerFormController.php");
require_once __DIR__ .'/Router/Router.php';

$customerFormController = new CustomerFormController();
$routeur = new Routeur();

$routeur->addRoute("accueil", array($customerFormController, "accueil"));
$routeur->addRoute("formulaire", array($customerFormController, "page1"));

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    $routeur->handleRequest($page);
} catch (Exception $e) {
    $customerFormController->pageError($e->getMessage());
}





//try {
//    if (empty($_GET['page'])) {
//        $page = "accueil";
//    } else {
//        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
//        $page = $url[0];
//    }
//
//    switch ($page) {
//        case "accueil":
//            $customerFormController->accueil();
//            break;
//        case "formulaire":
//            $customerFormController->page1();
//            break;
//        default:
//            throw new Exception("La page n'existe pas");
//    }
//} catch (Exception $e) {
//    $mainController->pageError($e->getMessage());
//}

