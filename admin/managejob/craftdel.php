<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];
$deletesql = "DELETE FROM craft WHERE id=$id;";
$deletesql2 = "DELETE FROM craftcontent WHERE craftid=$id;";
//    print_r($updatesql);



if( mysql_query($deletesql) && mysql_query($deletesql2) ){
    echo "<script> alert('账户删除成功'); window.location.href='craftmod.php';</script>";
}else{
    echo "<script> alert('账户删除失败'); window.location.href='craftmod.php';</script>";
}
?>