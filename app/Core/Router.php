<?php


class Router{
    //hold all of route
    private $routes = [];
    private string $base = '';

   public function __construct(string $base = ''){
     $this->base = rtrim($base, '/');
     $this->loadRoutes();
   }

   //Router Registration

   public function get(string $path, string $handler):void{
        $this->addRoute('GET',$path, $handler);
   }
   public function post(string $path, string $handler){
        $this->addRoute('POST',$path, $handler);
   }

   private function addRoute(string $method , string $path , string $handler):void{
        $this->routes[] = [
            'method'=> $method,
            'pattern' => $this->compilePath($path),
            'handler' => $handler,
            'path' => $path,
        ];
   }

   private function loadRoutes():void{
    $routeFiles = glob(__DIR__ . "/../routes/*.php");
    sort($routeFiles);
    foreach($routeFiles as $routeFile){
        $registeredRoute = require $routeFile;

        if(is_callable($registeredRoute)){
            $registeredRoute($this);
        }
    }
   }
   private function compilePath(string $path): string {
        $pattern = preg_replace('/\/:([a-zA-Z_]+)/', '/(?P<$1>[^/]+)', $path);
        $fullPath = '/' . trim($this->base, '/') . '/' . ltrim($pattern, '/');
        return '#^' . rtrim($fullPath, '/') . '/?$#';
    }

    public function dispatch():void{
        $method = $_SERVER['REQUEST_METHOD'];
        // support POST method override 

        if($method === 'POST' && isset($_POST['_method'])){
            $method = strtoupper($_POST['_method']);
        }

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = '/'.trim($uri,'/');

        foreach($this->routes as $route){
            if($route['method'] !== $method) continue;

            if(preg_match($route['pattern'],$uri,$matches)){
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                [$controllerName, $action] = explode('@', $route['handler']);

                $controllerFile = '../app/Controllers/' . $controllerName . '.php';
                if(!file_exists($controllerFile)){
                    $this->abort(500, "Controller not found: $controllerName");
                    return;
                }

                require_once $controllerFile;

                if(!class_exists($controllerName)){
                    $this->abort(500, "Class not found: $controllerName");
                    return;
                }

                $controller = new $controllerName();

                if(!method_exists($controller, $action)){
                    $this->abort(500, "Controller method not found: $controllerName::$action");
                    return;
                }

                $controller->$action($params);
                return;
            }
        }

        // No route matched
        $this->abort(404, "Page not found");
    }

    private function abort(int $code, string $message):void{
        http_response_code($code);

        $errorView = '../view/errors/'.$code .'.php';
        if(file_exists($errorView)){
            require $errorView;
        }else{
            echo "<h1>$code $message</h1>";
        }
        }
}

