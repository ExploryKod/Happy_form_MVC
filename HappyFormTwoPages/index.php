<?php
require_once("./controllers/Controller.php");
require_once("./controllers/CustomerFormController.php");
$mainController = new MainController();
$customerFormController = new customerFormController();

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $customerFormController->accueil();
            break;
        case "formulaire":
            $customerFormController->page1();
            break;
        case "getData.model":
            $customerFormController->page1();
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $mainController->pageError($e->getMessage());
}

