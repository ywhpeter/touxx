<?php

class database
{
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

        try {
            $this->pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
        } catch (PDOException $e) {
            die('数据库连接失败:' . $e->getMessage());
        };
    }


}

class user extends database
{
    public function actionindex()
    {
        include 'view/admin.user.html';
    }
}

class index extends database
{
    public function actionindex()
    {
        include 'view/admin.html';
    }
}

class news extends database
{
//admin.php?c=news&m=delete&id=x
    public function actiondelete()
    {
        sleep (1);
        $count = $this->pdo->exec("delete from  nmb where id = " . $_GET['id']);
        echo $count;
    }

    //admin.php?c=news&m=insert
    public function actioninsert()
    {
        sleep (1);
        $stmt = $this->pdo->prepare("insert into nmb(title,dsc,content)values(?,?,?)");
        $stmt->bindValue(1, '');
        $stmt->bindValue(2, '');
        $stmt->bindValue(3, '');
//        $stmt->execute();

        echo $stmt->execute();
    }

    //admin.php?c=news&m=update&k=title&id=2&v=abc
    public function actionupdate()
    {
        sleep (1);
        $stmt = $this->pdo->prepare('update nmb set ' .$_GET['k']. '= ?  where id = ?');
        $stmt->bindValue(1, $_GET['v']);
        $stmt->bindValue(2, $_GET['id']);
        $stmt->execute();

        echo $stmt->execute();
    }

    public function actionview()
    {
        sleep (1);
        $stmt = $this->pdo->query('select * from nmb');
        $row = $stmt->fetchAll();
        include('view/admin.news.html');
    }
}

;

class category extends database
{
    public function actionindex()
    {
        include 'view/admin-category.html';
    }
}
$o = new $_GET['c']();
$method_name = 'action' . $_GET['m'];

$o->$method_name();