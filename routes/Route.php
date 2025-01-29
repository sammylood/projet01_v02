<?php
namespace App\Routes;

class Route{
    private static $routes = [];

    public static function get($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'GET'];
    }

    public static function post($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'POST'];
    }

    public static function dispatch(){
        $url = $_SERVER['REQUEST_URI'];
        $urlSegments = explode('?', $url);
        $urlPath = rtrim($urlSegments[0], '/');
        $method = $_SERVER['REQUEST_METHOD'];
       
        foreach(self::$routes as $route){
            if(BASE.$route['url'] ==  $urlPath && $route['method'] == $method ){
                //echo BASE.$route['url'].' = '.$urlPath;
                //echo $route['controller'];
                $controllerSegments = explode('@',$route['controller']);
                //print_r($controllerSegments);
                //die();
                $controllerName = "App\\Controllers\\".$controllerSegments[0];
                $methodName = $controllerSegments[1];
                $constrollerInstance = new $controllerName();

                if($method=='GET'){
                    if(isset($urlSegments[1])){
                        //echo $urlSegments[1];
                        //echo "<br>";
                        parse_str($urlSegments[1], $queryParams);
                        //print_r($queryParams);
                        $constrollerInstance->$methodName($queryParams);
                    }else {
                        $constrollerInstance->$methodName();
                    }
                    
                }elseif($method=='POST'){
                    if(isset($urlSegments[1])){
                        parse_str($urlSegments[1], $queryParams);
                        $constrollerInstance->$methodName($_POST, $queryParams);
                    }else {
                        $constrollerInstance->$methodName($_POST);
                    }
                }
                return;
            } 
        }
        http_response_code(404);
        echo "404 Not found";
    } 
}
?>