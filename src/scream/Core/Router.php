<?php

namespace Scream\Core;

class Router
{
    private $routes = [];

    public function get($path, $callback){
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve($path, $method){
        $callback = $this->routes[$method][$path] ?? false;
        return $callback;
    }

    public function show(){
        print_r($this->routes);
    }

    public function isEmptyRoutes(){
        return empty($this->routes)?false:true;
    }
}