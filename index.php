<?php 
    // $controllerName = ucfirst( strtolower (($_GET['controller'])).'Controller');
    // $actionName =strtolower ($_GET['action']?? 'index');

    // require "./Controllers/${controllerName}.php";
    session_start();
    require_once "./MVC/Bridge.php";
    $myApp = new App();

?>