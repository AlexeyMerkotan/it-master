<?php
function __autoload($name){
    require_once __DIR__ .'/config.php';
    require_once __DIR__ .'/core/controller.php';
    require_once __DIR__ .'/core/model.php';
    require_once __DIR__ .'/core/view.php';
    require_once __DIR__ .'/core/route.php';
}