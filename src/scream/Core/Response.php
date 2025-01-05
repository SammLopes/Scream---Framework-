<?php

namespace Scream\Core;

class Response
{
    private $statusCode = 200;
    private $content = '';

    public function setStatusCode($statusCode){
        $this->statusCode = $statusCode;
        http_response_code($statusCode);
        return $this;
    }

    public function setContent($content){
        $this->content = $content;
        return $this;
    }

    public function send(){
        echo $this->content;
    }
}