<?php

class MainController
{
    private $postData;
    private $getData;

    /**
     * @return mixed
     */
    public function getPostData()
    {
        return $this->postData;
    }

    /**
     * @param mixed $postData
     */
    public function setPostData(postData $postData): array
    {
        $this->postData = $postData;
    }

    /**
     * @return mixed
     */
    public function getGetData()
    {
        return $this->getData;
    }

    /**
     * @param mixed $getData
     */
    public function setGetData($getData)
    {
        $this->getData = $getData;
    }


    protected function generatePage(array $data)
    {
        extract($data);
        ob_start();
        if(isset($view)) {
            require PAGE_VIEWS_DIR . $view;
        } else {
            $this->pageError("la page n'existe pas", false);
        }
        $page_content = ob_get_clean();
        require PAGE_VIEWS_DIR . 'common/template.php';
    }

    public function pageError(string $messageError = "", bool $generate = true, string $view = 'error.view.php')
    {
        $data_page = [
            "page_description" => "Page d'erreur",
            "page_title" => "Erreur",
            "page_css" => ["error.css"],
            "messageError" => $messageError,
            "view" => $view,
            "template" => "common/template.php"
        ];

        if($generate)  {
            $this->generatePage($data_page);
        } else  {
            extract($data_page);
            require PAGE_VIEWS_DIR . $view;
        }
    }
}

define('PAGE_VIEWS_DIR', __DIR__ . '/../views/');