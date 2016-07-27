<?php

class Controller_Main extends Controller{

    function action_index(){
        $this->model = new Model_Main(); // создаём новый обьект модели
        $data = $this->model->get(); // получаем даные с модели
        $this->view->generate($data,'main_page'); // вызываем метод generate(), в $this->view уже находится обьект класса View
    }
}

