<?php
class News{

    public $pdo;
    public function __construct()
    {

    }
    public function actionindex(){
        include 'view/index.html';
    }
    public function actionvideo(){
        include 'view/video.html';
    }
    public function actionadd(){
        include 'view/add.html';
    }
    public function actionsearch(){
        include 'view/search.html';
    }

}
$page=new News();
if(isset($_GET['r'])){
    $method='action'.$_GET['r'];
}else{
    $method='actionindex';
}
$page->$method();