<?php

namespace Scream\Core;

class Controller
{
    public function render($view, $params = array()){
        return $this->renderView($view, $params);
    }

    protected function renderView($view, $params = array()){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(){
        ob_start();
        include_once __DIR__ . "/../../views/layouts/main.php";
        return ob_get_clean();
    }
    protected function renderOnlyView($view, $params = array()){
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__ . "/../../views/$view.php";
        return ob_get_clean();
    }
}