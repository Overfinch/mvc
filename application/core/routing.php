<?php

class Routing {
    public static function execute(){
        $controllerName = "Main"; // контроллер по умолчанию
        $actionName = "index"; // экшн по умолчанию
        $piecesOfUrl = explode("/",$_SERVER["REQUEST_URI"]);

        if(!empty($piecesOfUrl[2])){ // в первом урле ищем имя контроллера
            $controllerName = $piecesOfUrl[2];
        }

        if(!empty($piecesOfUrl[3])){ // во втором урле ищем имя экшна
            $actionName = $piecesOfUrl[3];
        }

        $modelName = "Model_".$controllerName; // формируем имя модели
        $controllerName = "Controller_".$controllerName; // формируем имя контроллера
        $actionName = "action_".$actionName; // формируем имя экшна

        $fileWithModel = strtolower($modelName).".php"; // имя файла модели
        $fileWithModelPath = "application/models/".$fileWithModel; // путь к файлу модели
        
        if(file_exists($fileWithModelPath)){
            include $fileWithModelPath; // если такой файл с моделью есть, то подключаем его
        }else{
            print "$modelName - такой модели не существует<br>";
        }

        $fileWithController = strtolower($controllerName).".php"; // имя файла контроллера
        $fileWithControllerPath = "application/controllers/".$fileWithController; // путь к файлу контроллера
        if(file_exists($fileWithControllerPath)){
            include $fileWithControllerPath; // если такой файл с контроллером есть, то подключаем его
        }else{
            print "$controllerName - Такого контроллера не существует<br>";
        }

        $controller = new $controllerName; // создаём новый обьект класса контроллера который подключили
        $action = $actionName;

        if(method_exists($controller, $action)){ // если в этом обьекте($controller) есть такой метод($action)
            call_user_func(array($controller, $actionName), $piecesOfUrl); // вызываем метод
        }else{
            print "Нету конnроллера $controllerName или в нём нету метода $actionName <br>";
        }

    }
}

