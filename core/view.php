<?php
namespace core;
class View{
    function demonstration ($index,$data){
        require_once  __DIR__ .'./../view/'.$index;
    }
}