<?php

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */

namespace application\core;

use application\core\View;

class Router {

    protected $routes = [];
    protected $params = [];

    //Подключает массив с роутами
    public function __construct() {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    //Выполняет поиск и замену по регулярному выражению в роутах
    //Записывает в переменную $routes массив с парой '#^'.$route.'$#' => "параметры(контроллер => экшен)"
    public function add($route, $params) {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    //Удаляет из урл первый слэш
    //Сравнивает урл с роутами
    //Записывает в переменную $params пару ключ значение "контроллер" => "экшен"
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    //Создает экземпляр класса контроллера и передает в него параметры(контроллер и экшен)
    //Вызывает определенный экшен
    //Если контроллер или экшен отсутствуют, выводит страницу 404
    public function run(){
        if ($this->match()) {
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}