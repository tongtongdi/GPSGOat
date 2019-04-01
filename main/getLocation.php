<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/29
 * Time: 17:28
 */
header("Content-type: text/html; charset=utf-8");
$id = $_POST['id'];
$dateBegin = $_POST['dateBegin'];
$dateEnd = $_POST['dateEnd'];

$conn = new mysqli('localhost', 'root', 'admin', 'gps');
if ($conn->connect_error) {
    echo '连接失败！';
    exit(0);
}else{
    $sql = "select lng,lat,id,time from position where userId = '$_POST[id]' and time between '$_POST[dateBegin]' and '$_POST[dateEnd]'";
    $result = $conn->query($sql);
    $jarr = array();
    while ($rows=mysqli_fetch_array($result,MYSQL_ASSOC)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
        for($i=0;$i<$count;$i++){
            unset($rows[$i]);//删除冗余数据
        }
        array_push($jarr,$rows);
    }
    echo json_encode($jarr);
}