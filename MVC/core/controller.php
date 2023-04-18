<?php
class controller{
  
    public function model($model){
        require_once "./MVC/Models/".$model."Model.php";
        $model = $model.'Model';
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./MVC/Views/".$view."View.php";
        // return new $view;
    }
}
?>