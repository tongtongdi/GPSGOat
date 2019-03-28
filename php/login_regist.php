<?php
/**
 * Created by hujianpeng.
 * User: lenovo
 * Date: 2019/3/28
 * Time: 15:39
 */
header("Content-type: text/html; charset=utf-8");
$name = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','admin','gps');
if ($conn->connect_error){
    echo '数据库连接失败！';
    exit(0);
}else{
    $sql = "select name from user where name='$_POST[username]'";
    $result = $conn->query($sql);
    $number = mysqli_num_rows($result);
    if ($number) {
        echo 3;//用户名已存在
    }else{
        $sql_insert = "insert into user(name,password) values('$_POST[username]','$_POST[password]')";
        $res_insert = $conn->query($sql_insert);
        if ($res_insert) {
            echo 1;
        }else{
            echo 2;
        }
    }
}
