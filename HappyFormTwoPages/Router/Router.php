<?php

class Router
{
    private array $routes = array();

    public function addRoute($path, array $callback)
    {
        $path = htmlspecialchars($path);
        $this->routes[$path] = $callback;
    }

    public function handleRequest($path)
    {
        $path = htmlspecialchars($path);
        if (isset($this->routes[$path])) {
            $callback = $this->routes[$path];
            $callback();
        } else {
            throw new Exception("La page ' . $path .' n'existe pas.");
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
