<?php

class Controller {
    public $model; // сюда зписывается модель
    public $view; // сюда записывается вид

    public function __construct(){
        $this->view = new View(); // создаётся новый обьект класса View
    }
    
    function action_index(){
    }
}

