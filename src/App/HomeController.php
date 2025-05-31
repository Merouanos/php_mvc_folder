<?php
namespace App;

use App\Exceptions\VueNotFoundException;

class HomeController
{
    public function index():Vue{
        try {
            return Vue::make('home',['design1']);

            }catch (VueNotFoundException $e){
            echo $e->getMessage();
        }
    }
}