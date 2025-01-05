<?php

namespace Src\routes;

use Scream\Controller\UsuarioController;
use Scream\Core\Utils;
use Scream\Core\Router;

class Web{


    public static function register(Router $router){

        $router->get('/', function(){
            return '<p>Home</p>';
        });

        $router->get('/usuarios',[UsuarioController::class,'index']);
        $router->post('/usuarios',[UsuarioController::class,'create']);
    }

}