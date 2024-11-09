<?php
class Controller {
    public function loadModel($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    public function loadView($view, $data = []) {
        require_once 'views/' . $view . '.php';
    }
    
}