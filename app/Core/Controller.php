<?php
class Controller{
    public function model(string $model){
        require_once dirname(__DIR__) . '/models/' . $model . '.php';
        return new $model();
    }
    public function view(string $viewName, $data = []){
        extract($data);
        
        require_once dirname(__DIR__) . '/views/' . $viewName . '.php';
    }
}