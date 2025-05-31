<?php

namespace App;

class LoginController
{
    public function index(){
        return (Vue::make('Login/index'));

    }
    public function upload(){
        $path =STORAGE_PATH.'/'. $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
        return (Vue::make('Login/upload'));

    }
    public function download(){
        header('Content-Type :application/jpeg');
        header('Content-Disposition: attachement;filename="myfile.jpeg"');
        readfile(STORAGE_PATH.'/1.jpeg');


    }
}