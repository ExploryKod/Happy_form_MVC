<?php

require_once("models/MainManager.model.php");

class MainController{
    private $mainManager;

    public function __construct(){
        $this->mainManager = new MainManager();
    }

    private function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function accueil(){
        $clients = $this->mainManager->getDatas();

        $data_page = [
            "page_description" => "Affichage de la liste des clients",
            "page_title" => "Liste des clients",
            "page_css" => ["index.css"],
            "page_javascript" => ["displayClients.js"],
            "clients" => $clients,
            "view" => "views/home.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function page1(){
       
        $client = $this->mainManager->getClientData();
        $this->mainManager->deleteClientData();
        $this->mainManager->CreateClient();
        $this->mainManager->modifyClientData();
        
        $data_page = [
            "page_description" => "Enregistrer ou modifier un client à l'aide du formulaire",
            "page_title" => "Formulaire",
            "page_css" => ["form.css"],
            "client" => $client,
            "page_javascript" => ["inputsValidation.js","openCloseForm.js","confirmPopUp.js"],
            "view" => "./views/form.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
  
    public function pageErreur($messageError){
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "messageError" => $messageError,
            "page_css" => ["error.css"],
            "view" => "./views/error.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}