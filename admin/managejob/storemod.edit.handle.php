<?php
require_once ('../../myERP/inc.php');
// print_r($_POST);//POST是从对应的页面中method提取的数据
if(!(isset($_POST['storename']) && (!empty($_POST['storename'])))){ //入库前做一个简单的校验
    echo "<script> alert('库房名不可为空'); window.location.href='storemod.php';</script>";
}
$id = $_POST['id'];
$storename =$_POST['storename'];
$manager =$_POST['manager'];

$updatesql = "UPDATE store SET storename='$storename',manager='$manager' WHERE id=$id;";

// print_r($updatesql);

if (mysql_query($updatesql)) {
    echo "<script> alert('库房记录修改成功'); window.location.href='storemod.php';</script>";
} else {
    echo "<script> alert('库房记录修改失败'); window.location.href='storemod.php';</script>";
}
?>
