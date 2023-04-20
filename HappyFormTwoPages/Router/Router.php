<?php
require_once __DIR__ . '/Router/PathMaker.php';
$pathMaker = new PathMaker(__DIR__);
require_once $pathMaker->getFilePath('Controller.php','controllers');
require_once $pathMaker->getFilePath('CustomerFormController.php','controllers');
$customerFormController = new CustomerFormController();

class Router
{
    private $routes = array();

    public function addRoute($path, $callback)
    {
        $this->routes[$path] = $callback;
    }

    public function handleRequest($path)
    {
        if (isset($this->routes[$path])) {
            $callback = $this->routes[$path];
            $callback();
        } else {
            throw new Exception("La page demandée n'existe pas.");
        }
    }

    public function handleRoutes(CustomerFormController $errors)  {
        try {
            if (empty($_GET['page'])) {
                    $page = "accueil";
            } else {
                $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
                $page = $url[0];
            }

            $this->handleRequest($page);
            } catch (Exception $e) {
                $errors->pageError($e->getMessage());
            }
    }
}
