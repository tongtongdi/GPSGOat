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
    $sql = "select name,password from user where name = '$_POST[username]' and password = '$_POST[password]'";
    $result = $conn->query($sql);
    $number = mysqli_num_rows($result);
    if ($number) {
        $expire=time()+60*60*2;
        setcookie("username", $name, $expire,"/");
        echo '1';
    } else {
        echo '2';
    }
}
?>