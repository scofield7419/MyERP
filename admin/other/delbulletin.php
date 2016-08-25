<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];
$userid = $_GET['userid'];
$deletesql = "DELETE FROM bulletin WHERE id=$id;";

//    print_r($updatesql);

if( mysql_query($deletesql) ){
    echo "<script> alert('公告删除成功'); window.location.href='bulletinmanage.php?id="."$userid"."';</script>";
}else{
    echo "<script> alert('公告删除失败'); window.location.href='bulletinmanage.php?id="."$userid"."';</script>";
}
?>