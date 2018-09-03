<?php

class database{
    public $pdo;
    public function __construct()
    {
        $db = array(
            'dsn' => 'mysql:host=localhost;dbname=w1805;port=3306;charset=utf8',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try{
            $this->pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
        }catch(PDOException $e){
            die('数据库连接失败:' . $e->getMessage());
        };
    }



}

class user  extends database{
    public function actionindex(){
        include 'view/admin.user.html';
    }
}
class index extends database{
    public function actionindex(){
        include 'view/admin.html';
    }
}

class news extends database
{

    public function actiondelete()
    {
        $count  =  $this->pdo->exec("delete from  nmb where id = ".$_GET['id']);
        echo $count;
    }
    public function actioninsert()
    {
        $stmt = $this->pdo->prepare("insert into nmb(title,dsc,content)values(?,?,?)");
        $stmt->bindValue(1, $_GET['title']);
        $stmt->bindValue(2, $_GET['dsc']);
        $stmt->bindValue(3, $_GET['content']);
        $stmt->execute();

        echo $stmt->execute();
    }
    public function actionupdate()
    {
        $stmt = $this->pdo->prepare("update nmb set title= ? where id = ?");
        $stmt->bindValue(1, $_GET['title']);
        $stmt->bindValue(2, $_GET['id']);
        $stmt->execute();

        echo $stmt->execute();
    }
    public function actionview()
    {
        $stmt = $this->pdo->query('select * from nmb');
        $row = $stmt->fetchAll();
        include('view/admin.news.html');
    }
};

class category extends database{
    public function actionindex(){
        include 'view/admin-category.html';
    }
}
$class_name =$_GET['c'];
$method_name='action'.$_GET['m'];
$o=new $class_name();
$o->$method_name();