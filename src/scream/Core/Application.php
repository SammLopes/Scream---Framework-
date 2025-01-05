<?php

namespace Scream\Core;
use Scream\Core\Utils;
class Application
{
    public $router;
    private $request;
    private $response;

    public function __construct(){
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();
    }

    public function run(){
        try{
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->router->resolve($path, $method);


            if($callback === false){
                throw new \Exception("Rota não encontrada", 404);
            }

            if(is_array($callback)){
                $controller = new $callback[0]();
                $callback[0] = $controller;
            }
            echo '<pre>';
            print_r($this->request->toArray()); // ou var_dump($this->request);
            echo '</pre>';
            return $this->response
                ->setStatusCode(200)
                ->setContent(call_user_func($callback, $this->request))
                ->send();

        }catch(\Exception $e){
            echo $this->response->setStatusCode($e->getCode())->setContent($e->getMessage());
        }
    }

}