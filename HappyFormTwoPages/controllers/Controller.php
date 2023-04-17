<?php

require_once("models/Managers/getData.model.php");
require_once("models/Managers/postData.model.php");

/**
 * La class MainController génère une page dans la vue à partir des données du model
 * @method _construct est le constructeur : il instancie les class du model contenant toute la donnée pour pouvoir y accéder depuis cette class.
 * @method generatePage : en utilisant extract() nous obtenons des variables issu d'un tableau associatif ("key"=>"value")
 * generatePage va ensuite mettre le contenu en tampon puis le verser dans $page-content afin de l'afficher ensuite là où est $page-content.
 * $page-content se trouve dans views/common/template car tout passe par le template mais chaque structuration HTML du contenu est unique et définit dans les vues.
 * @method accueil : fait le lien entre la donnée issue du model et la page d'accueil dans la vue (le routeur index.php orientera le versement des données).
 * @method page1 : fait le lien entre la donnée issue du model et la page du formulaire
 * @method pageError : fait transiter la donnée pour que la donner à la page qui s'affiche en cas d'erreur 404 (toujours en passant par le routeur et le template).
 * $data_page : Dans chaque methode il y a ce tableau associatif qui récupère les données du model, des chaînes de charactères ou des urls. 
 * La clé "view" a comme valeur une url: celle-ci permet de singulariser la page reliée à la méthode (page1 ou accueil). 
 * la clé "template" reste commun à toute les pages mais avec un contenu différent par page.
 */
class MainController
{
    protected $postData;
    protected $getData;

    public function __construct()
    {
        $this->postData = new postData();
        $this->getData = new getData();
    }

    protected function generatePage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }


    public function pageError($messageError)
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "messageError" => $messageError,
            "page_css" => ["error.css"],
            "view" => "./views/error.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
}
