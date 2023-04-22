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
            $messageError = 'Page 404 - la page recherché n\'existe pas';
            $view = 'error.view.php';
            require PAGE_VIEWS_DIR . $view;
        }
        $page_content = ob_get_clean();
        require PAGE_VIEWS_DIR . 'common/template.php';
    }

    public function pageError(string $messageError = "")
    {
        $data = new PageData(
            "Page d'erreur",
            "Page permettant de gérer les erreurs",
            ["error.css"],
            new ErrorViewModel($messageError)
        );
        $this->generatePage($data->toArray());
    }
}

class PageData
{
    private $title;
    private $description;
    private $css;
    private $viewModel;

    public function __construct(string $title, string $description, array $css, $viewModel)
    {
        $this->title = $title;
        $this->description = $description;
        $this->css = $css;
        $this->viewModel = $viewModel;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'css' => $this->css,
            'viewModel' => $this->viewModel
        ];
    }
}

class ErrorViewModel
{
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}

define('PAGE_VIEWS_DIR', __DIR__ . '/../views/');