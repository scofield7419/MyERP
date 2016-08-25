<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];
$allsum = $_GET['sum'];
if($allsum >0){
    echo "<script> alert('库房物料不为零，不可删除仓库！请先处理本仓库所有物料！'); window.location.href='storemod.php';</script>";
}else{
    $deletesql = "DELETE FROM store WHERE id=$id;";
    //    print_r($updatesql);
    
    if( mysql_query($deletesql) ){
        echo "<script> alert('库房删除成功'); window.location.href='storemod.php';</script>";
    }else{
        echo "<script> alert('库房删除失败'); window.location.href='storemod.php';</script>";
    }
}
?>