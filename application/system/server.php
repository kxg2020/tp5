<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2017/8/2
 * Time: 15:33
 */

use Workerman\Worker;
require __DIR__ .'/workerman/Autoloader.php';

// 创建一个Worker监听2346端口，使用websocket协议通讯
$ws_worker = new Worker("websocket://0.0.0.0:2346");

// 启动4个进程对外提供服务
$ws_worker->count = 4;

// 当收到客户端发来的数据后返回hello $data给客户端
$ws_worker->onMessage = function($connection, $data) use ($ws_worker) {

    $info = GetUserInfo();

    // 向客户端发送hello $data
    echo  $connection->send($data);

    // 将用户发来的信息转发给所有的用户
    foreach($connection->worker->connections as $con)
    {
        $con->send($data);
    }

};

// 运行worker
Worker::runAll();

function GetUserInfo(){

    //初始化数据库连接
    $dsn = "mysql:host=localhost;dbname=xm_db;port=3306";
    $user = "root";
    $pwd = "root";
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('set names utf8');

    // 查询用户的数据
    $sql = "Select * From `xm_user` Where id = :id ";

    // 准备查询
    $stmt = $pdo->prepare($sql);

    // 执行查询
    $stmt->execute([':id'=>1]);

    // 定义一个容器
    $result = [];
    // 取出数据
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }

   return $result[0];
}