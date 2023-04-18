<?php

class Routeur
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
}
