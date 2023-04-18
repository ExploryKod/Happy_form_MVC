<?php
//require_once("Controller.php");
//
//class customerFormController_old extends MainController_old
//{
//
//    public function secureDatas()
//    {
//        // Récupération des données POST dans le tableau associatif $client_datas
//        $this->client_datas = [...$_POST];
//
//        // Boucle sur chaque valeur du tableau $client_datas
//        foreach ($this->client_datas as $key => $value) {
//            // Application de la fonction htmlspecialchars sur la valeur
//            $this->client_datas[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
//        }
//    }
//
//    public function accueil()
//    {
//        $clients = $this->getData->getDatas();
//
//        $data_page = [
//            "page_description" => "Affichage de la liste des clients",
//            "page_title" => "Liste des clients",
//            "page_css" => ["index.css"],
//            "page_javascript" => ["displayClients.js"],
//            "clients" => $clients,
//            "view" => "views/home.view.php",
//            "template" => "views/common/template.php"
//        ];
//
//        $this->generatePage($data_page);
//    }
//
//    public function page1()
//    {
//        $id_client = null;
//        if(isset($_GET["id"]))    {
//            $id_client = $_GET["id"];
//        }
//
//        $client = $this->getData->getClientData($id_client);
//
//        if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//            if (isset($_POST['register'])) {
//
//                // Nous récupérons les entrées utilisateur via la méthode POST.
////                $last_name = filter_input(INPUT_POST, "last_name");
////                $first_name = filter_input(INPUT_POST, "first_name");
////                $address = filter_input(INPUT_POST, "address");
////                $tel = filter_input(INPUT_POST, "tel");
////                $meeting = filter_input(INPUT_POST, "meeting");
//
//                $this->secureDatas();
//
//                // Nous vérifions qu'aucune entrée n'est vide
//                if (!empty($client_datas)) {
//                    $this->secureDatas();
//                    $this->postData->CreateClient($client_datas);
//
//                }
//            }
//
//            if(isset($_POST['delete'])) {
//                $this->secureDatas();
//                $this->postData->deleteClientData($client_datas);
//            }
//
//            if(isset($_POST['modify'])) {
//                $this->secureDatas();;
//                $this->postData->modifyClientData($client_datas);
//            }
//        }
//
//        $data_page = [
//            "page_description" => "Enregistrer ou modifier un client à l'aide du formulaire",
//            "page_title" => "Formulaire",
//            "page_css" => ["form.css"],
//            "client" => $client,
//            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
//            "view" => "./views/form.view.php",
//            "template" => "views/common/template.php"
//        ];
//
//        $this->generatePage($data_page);
//    }
//}