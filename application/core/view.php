<?php

class View{
    function generate($data, $template) // метод который принимает данные и имя шаблона
    {
        include 'application/views/'.$template.".php"; // и подключает этот шаблон с данными
    }
}

