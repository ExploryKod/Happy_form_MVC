<?php

require_once __DIR__ .'/../models/Managers/getData.model.php';
require_once __DIR__ .'/../models/Managers/postData.model.php';

class MainController
{
    protected PostData $postData;
    protected GetData $getData;

    public function __construct()
    {
        $this->postData = new PostData();
        $this->getData = new GetData();
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
