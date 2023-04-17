<?php
require_once("Controller.php");

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
        $id_client = null;
        if(isset($_GET["id"]))    {
            $id_client = $_GET["id"];
        }
        $id = $_GET["id"];
        $client = $this->getData->getClientData($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['register'])) {

                // Nous récupérons les entrées utilisateur via la méthode POST.
//                $last_name = filter_input(INPUT_POST, "last_name");
//                $first_name = filter_input(INPUT_POST, "first_name");
//                $address = filter_input(INPUT_POST, "address");
//                $tel = filter_input(INPUT_POST, "tel");
//                $meeting = filter_input(INPUT_POST, "meeting");

                $client_datas = [...$_POST];

                // Nous vérifions qu'aucune entrée n'est vide
                if (!empty($client_datas)) {

                    // Pour chaque entrée utilisateur : retirer les balises HTML/PHP et encoder les charactères.
//                    $first_name = strip_tags($first_name);
//                    $first_name = htmlentities($first_name);
//
//                    $last_name = strip_tags($last_name);
//                    $last_name = htmlentities($last_name);
//
//                    $address = strip_tags($address);
//                    $address = htmlentities($address);
//
//                    $tel = strip_tags($tel);
//                    $tel = htmlentities($tel);
//
//                    $meeting = strip_tags($meeting);
//                    $meeting = htmlentities($meeting);


                    $this->postData->deleteClientData();
                    $this->postData->CreateClient($client_datas);
                    $this->postData->modifyClientData($client_datas);
                }
            }
        }

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