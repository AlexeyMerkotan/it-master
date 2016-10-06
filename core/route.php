<?php
class Route {
    public static function main(){

        $action=isset($_GET['page'])?$_GET['page']:'index';
        $list=isset($_GET['list'])?$_GET['list']:'list';

        $model_name=$action.'_Model';
        $controller_name=$action.'_Controllers';

        $method_name=$list.'_method';

        $model_file=strtolower($model_name).'.php';
        $model_path="models/".$model_file;

        if(file_exists($model_path))
            require_once __DIR__ .'/../models/'.$model_file;

        $controller_file=strtolower($controller_name).'.php';
        $controller_path="controllers/".$controller_file;

        if(file_exists($controller_path))
            require_once __DIR__ .'/../controllers/'.$controller_file;
        else
            self::ErrorPage();


        $controller=new $controller_name;
        $method=strtolower($method_name);
        if(method_exists($controller,$method))
            $controller->$method();
        else
            self::ErrorPage();

    }
    public function ErrorPage(){
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
    }
}