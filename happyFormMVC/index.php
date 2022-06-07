<?php
require_once("./controllers/MainController.controller.php");
$mainController = new MainController();

try {
    if(empty($_GET['page'])){
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch($page){
        case "accueil" : $mainController->accueil();
        break;
        case "formulaire" : $mainController->page1();
        break;
        case "MainManager.model" : $mainController->page1();
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $mainController->pageErreur($e->getMessage());
}

//index.php?page=accueil
//index.php?page=form
