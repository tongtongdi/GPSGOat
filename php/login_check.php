<?php
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
        echo '1';
    } else {
        echo '2';
    }
}
?>