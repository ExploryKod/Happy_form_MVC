<?php
require_once './Controller.php';

class customerFormController extends MainController
{

    public function accueil()
    {
        $clients = $this->getData->getDatas();

        $data_page = [
            "page_description" => "Affichage de la liste des clients",
            "page_title" => "Liste des clients",
            "page_css" => ["index.css"],
            "page_javascript" => ["displayClients.js"],
            "clients" => $clients,
            "view" => "views/home.view.php",
            "template" => "views/common/template.php"
        ];

        $this->generatePage($data_page);
    }

    public function page1()
    {

        $client = $this->getData->getClientData();
        $this->postData->deleteClientData();
        $this->postData->CreateClient();
        $this->postData->modifyClientData();

        $data_page = [
            "page_description" => "Enregistrer ou modifier un client à l'aide du formulaire",
            "page_title" => "Formulaire",
            "page_css" => ["form.css"],
            "client" => $client,
            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
            "view" => "./views/form.view.php",
            "template" => "views/common/template.php"
        ];

        $this->generatePage($data_page);
    }
}