<?php
class App
{
    protected $__controller = "Login";
    protected $__action     = "index";
    protected $__params     = [];
    protected $__routes ;

    
    function __construct()
    {
        $this->__routes = new route();
        $urlArr = $this->UrlProcess();
        // echo '<pre>';
        // print_r($urlArr);

        //xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0].'Controller');
            // echo $this->__controller;
        }else{
            $this->__controller = ucfirst($this->__controller.'Controller');
            $this->__controller;
        }
        if (file_exists('MVC/Controllers/'.$this->__controller.'.php')) {
            require_once('Controllers/'.$this->__controller.'.php');
            $this->__controller = new $this->__controller();
            unset($urlArr[0]);
        } else {
            echo 'loi';
        }
        //xu ly action
        if(!empty($urlArr[1])){
            $this->__action = $urlArr[1];
            unset ($urlArr[1]);
        }
        //xu ly params
        $this->__params = array_values($urlArr);
        call_user_func_array([$this->__controller, $this->__action], $this->__params);
    }

    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->__routes->handleRoute($url);
            return array_values(array_filter(explode("/", filter_var(trim($url, "/")))));
        }
    }
}
