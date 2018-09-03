<?php
//数据类型
class phone{

    public $color='black';
    const PI=3.1415;
    public function call(){
        echo "call\n";
    }
    public function receive(){
        echo "receive\n";
    }
    public static function start(){
        echo "start";
    }
}

$mi=new phone;
var_dump($mi->color);
var_dump($mi::PI);
$mi->call();
$mi->receive();
