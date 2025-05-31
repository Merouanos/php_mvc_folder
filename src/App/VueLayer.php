<?php

namespace App;

class VueLayer
{
    public function __construct(protected string $url){

    }
    public static function select(string $url): static{
        return new static($url);
    }
    public function render($realPath):string{
        ob_start();
        include VUE_PATH .'/'.$this->url.'.php';
        $template =ob_get_clean();
        ob_start();
        include $realPath;
        $executed=ob_get_clean();
        return str_replace('{{content}}',$executed,$template);
    }

}