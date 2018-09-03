<?php

class news {
    public function cc(){
        echo 0;
    }
    public function bb(){
        echo 1;

    }
}
class p
{
    public function ee()
    {
        echo 2;
    }
    public function aa(){
        echo 3;
    }
}

$o=new $_GET['x']();
//var_dump($o);
$method=$_GET['y'];
//var_dump($method);
$o->$method();
//var_dump($o->$method());