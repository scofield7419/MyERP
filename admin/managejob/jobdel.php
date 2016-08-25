<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];
$deletesql = "DELETE FROM job WHERE id=$id;";
//    print_r($updatesql);

if( mysql_query($deletesql) ){
    echo "<script> alert('账户删除成功'); window.location.href='jobmod.php';</script>";
}else{
    echo "<script> alert('账户删除失败'); window.location.href='jobmod.php';</script>";
}
?>