<?php

namespace App\Core\Routing;
use App\Core\Request;

class Router
{
    private $request;
    // request for Request Class from User 

    private $routes;
    // routes for Route Class -> from web.php -> all route we define for our application

    private $currentRoute;
    // current route from Request Class / method () -> currenr roure users

    const BASECONTROLLER = '\App\Controllers\\';
    // this const variable for claa Class in Controllers

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->currentRoute = $this->findRoute($this->request);

        $this->runrouteMiddleware();
    }

    private function runrouteMiddleware()
    {
        if (isset($currentRoute['middleware'])) {
            $middleware = $this->currentRoute['middleware'];
            foreach ($middleware as $middlewareClass) {
                $middlewareObj = new $middlewareClass();
                $middlewareObj->handle();
            }
        }
    }

    private function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if (!in_array($request->method(), $route['methods'])) {
                return false;
            }
            if ($this->regexMath($route)) {
                return $route;
            }
        }
        return null;
    }


    private function regexMath($route)
    {
        global $request;
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . "$/";
        $result = preg_match($pattern, $this->request->uri(), $matches);
        if (!$result) {
            return false;
        }
        foreach($matches as $key => $value){
            if(!is_int($key)){
                $request->addRouteParam($key,$value);
            }
        }
        return true;

    }





    private function dispath404()
    {
        header('HTTP/1.0 404 Not Found');
        view("errors.404");
        die();
    }

    private function invalidRequest($request)
    {
        foreach ($this->routes as $route) {
            if (in_array($this->request->method(), $route['methods']) && $this->regexMath($route)) {
                return false;
            }
        }
        return true;
    }

    private function invalidUri($request)
    {

        foreach ($this->routes as $route) {
            if ($this->regexMath($route)) {
                return false;
            }
        }
        return true;
    }


    private function dispath405()
    {
        header("HTTP/1.0 405 Method Not Allowed");
        view("errors.405");
        die();
    }

    public function run()
    {
        // 404 : uri not exists
        if ($this->invalidUri($this->request)) {
            $this->dispath404();
        }

        // 405 : Invalid request method
        if ($this->invalidRequest($this->request)) {
            $this->dispath405();
        }

        // action : null
        $this->dispath($this->currentRoute);


    }

    private function dispath($route)
    {

        $action = $route['action'];
        if (!isset($action)) {
            throw new \Exception("Action Not Exsist");
        }
        if (is_null($action) || empty($action)) {
            return;
        }

        if (is_callable($action)) {
            $action();
        }

        if (is_string($action)) {
            $action = explode('@', $action);
        }

        if (is_array($action)) {
            $className = self::BASECONTROLLER . $action[0];
            $methodName = $action[1];
            if (!class_exists($className)) {
                throw new \Exception("Class $className Not Exists !!");
            }
            $controller = new $className();
            if (!method_exists($controller, $methodName)) {
                throw new \Exception("Method $methodName Not Exists !!");
            }

            $controller->{$methodName}();
        }

    }
}