<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];

$sel = "SELECT * FROM user WHERE id = $id";
$res=mysql_query($sel);
$data=mysql_fetch_array($res);
$type=$data['type'];

if($id == 1){
    echo "<script> alert('上帝管理员不可删除！'); window.location.href='usermanage.php';</script>";
    exit();
}
if($type == 0){
    echo "<script> alert('管理员只能被上帝管理员创建！'); window.location.href='usermanage.php';</script>";
    exit();
}
if($id == $_SESSION['id']){
    echo "<script> alert('不可删除自己！'); window.location.href='usermanage.php';</script>";
    exit();
}
$deletesql = "DELETE FROM user WHERE id=$id;";

//    print_r($updatesql);

if( mysql_query($deletesql) ){
    echo "<script> alert('账户删除成功'); window.location.href='usermanage.php';</script>";
}else{
    echo "<script> alert('账户删除失败'); window.location.href='accountmanage.php?id=$id';</script>";
}
?>