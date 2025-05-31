<?php

namespace App;

class VueLayer
{
    public function __construct(protected string $url){

    }
    public static function select(string $url): static{
        return new static($url);
    }
    public function render():string{
        return VUE_PATH . '/' . $this->url . '.php';
    }

}