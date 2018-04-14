<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     * @return string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();
        //Проверить наличие такого запроса в routes.php
        // $uriPattern == 'post'  $path == 'post/index'
        foreach ($this->routes as $uriPattern => $path){
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                //Получаем внутрений путь из внешнего согласно правлу.
                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);
                //Опредилить контроллер, action, параметры.
                //Если есть совпадение, опредилить какой контроллер
                //и action обрабатывают запрос
                $segments = explode('/', $internalRoute);
                //Ф-ция выризает первое значение и передает его в $controllerName
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                //Ф-ция выризает первое значение и передает его в $actionName
                //т.е. $controllerName имя класса а $actionName его метод
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;
                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                } else {
                    include_once(ROOT . '/views/errorpage/index.php');
                    break;
                }
                //Создать обьеккт, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);
                if ($result != null) {
                    break;
                }
                break;
            }
        }
    }
}