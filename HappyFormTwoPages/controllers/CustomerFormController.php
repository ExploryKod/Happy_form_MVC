<?php
require __DIR__ .'/Controller.php';

class CustomerFormController extends MainController {

    private $client_datas;

    protected function secureDatas()
    {
        // Récupération des données POST dans le tableau associatif $client_datas
        $this->client_datas = filter_input_array(INPUT_POST, [
            "id_client" => FILTER_SANITIZE_NUMBER_INT,
            "last_name" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "first_name" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "address" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "tel" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "meeting" => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        // Boucle sur chaque valeur du tableau $client_datas
        foreach ($this->client_datas as $key => $value) {
            // Application de la fonction htmlspecialchars sur la valeur
            $this->client_datas[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        }
    }

    public function accueil()
    {
        $getDatas = new GetData();
        $clients = $getDatas->getDatas();

        $data_page = [
            "page_description" => "Affichage de la liste des clients",
            "page_title" => "Liste des clients",
            "page_css" => ["index.css"],
            "page_javascript" => ["displayClients.js"],
            "clients" => $clients,
            "view" => "home.view.php",
            "template" => "common/template.php"
        ];

        $this->generatePage($data_page);
    }

    public function page1()
    {
        $getDataObj = new getData;
        $postDataObj = new postData;
        $id_client = null;
        if(isset($_GET["id"])) {
            $id_client = $_GET["id"];
        }


        $client = $getDataObj->getClientData($id_client);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['register'])) {

//                $this->secureDatas();

                // Nous vérifions qu'aucune entrée n'est vide

                $client_datas = [...$_POST];
                $postDataObj->CreateClient($client_datas);
            }

            if(isset($_POST['delete'])) {
                $this->secureDatas();
                $postDataObj->deleteClientData($this->client_datas);
            }

            if(isset($_POST['modify'])) {
                $this->secureDatas();
                $postDataObj->modifyClientData($this->client_datas);
            }
        }

        $data_page = [
            "page_description" => "Enregistrer ou modifier un client à l'aide du formulaire",
            "page_title" => "Formulaire",
            "page_css" => ["form.css"],
            "client" => $client,
            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
            "view" => "form.view.php",
            "template" => "common/template.php"
        ];

        $this->generatePage($data_page);
    }
}
