<?php
class Controller{
    public function model(string $model){
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }
    public function view(string $viewName, $data = []){
        extract($data);
        
        require_once '../app/views/'.$viewName.'.php';
    }
}