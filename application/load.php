<?php

// загружаем файлы с основными классами
require_once('core/routing.php');
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/model.php';

Routing::execute();//Запуск роутинга

