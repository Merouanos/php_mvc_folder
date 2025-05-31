<?php

namespace App;
use App\Exceptions\VueNotFoundException;
class Vue
{
    public function __construct(protected string $path,protected array $param=[]){

    }
    public function render(VueLayer $layout):string{
        $realPath = VUE_PATH.'/'.$this->path.'.php';
        if(file_exists($realPath)){

            if(isset($layout)) {
                ob_start();
                include $layout->render();
                return str_replace('{{content}}',file_get_contents($realPath),(string)ob_get_clean());


            }
            else{
                ob_start();
                require $realPath;
                return (string)ob_get_clean();
            }
        }
        else{
            throw new VueNotFoundException();
        }
    }
    public static function make(string $path,array $param=[]):Vue{
        return new static($path,$param);
    }
    public function __toString():string
    {
        return $this->render(VueLayer::select('design1'));
    }
}