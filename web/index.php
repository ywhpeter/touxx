<?php
 class News{

     public $pdo;
     public function __construct()
     {

     }
     public function actionindex(){
            include 'view/index.html';
     }
     public function actioncategory(){
         include 'view/category.html';
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


//$db = array(
//    'dsn' => 'mysql:host=localhost;dbname=w1805;port=3306;charset=utf8',
//    'username' => 'root',
//    'password' => '',
//    'charset' => 'utf8',
//);
//$options = array(
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//);
//
//try{
//    $pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
//}catch(PDOException $e){
//    die('数据库连接失败:' . $e->getMessage());
//};
//$stmt = $pdo->query('select * from nmb');
//$row = $stmt->fetchAll();
////echo "<pre>";
////var_dump($row);
////echo "</pre>";
//
//
//include "view/index.html";