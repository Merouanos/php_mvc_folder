<?php
namespace App;




use App\Exceptions\RouteNotFoundException;

class Controller
{
    private array $routes=[];
    public function __construct()
    {

    }
    public function register(string $url,string $method,array $class):self{
        $this->routes[$url][$method]=$class;
        return $this;
    }
    public function post(string $url,array $class):self{
       return $this->register($url,'POST',$class);
    }
    public function get(string $url,array $class):self{
        return $this->register($url,'GET',$class);
    }

    public function resolve(string $urlPath,string $methodPath){
        $path = explode('?',$urlPath)[0];
        $class=$this->routes[$path][$methodPath];
        if(isset($class)){
            if(is_callable($class)){
                return call_user_func($class);
            }
            [$name,$method]=$class;
            $name =new $name();
            if(method_exists($name,$method)){
                return call_user_func([$name,$method]);
            }

        }
        else {
            throw new RouteNotFoundException();
        }

    }
}