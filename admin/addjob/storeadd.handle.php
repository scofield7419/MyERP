<?php
    require_once ('../../myERP/inc.php');


if(!(isset($_POST['storename']) && (!empty($_POST['storename'])))){ //入库前做一个简单的校验
    echo "<script> alert('库房名称不可为空'); window.location.href='storeadd.php';</script>";
}
$storename =$_POST['storename'];
$manager =$_POST['manager'];
// print_r($manager);
$dateline = time() + 6*60*60 ;
$insertsql = "INSERT store(storename,allsum,manager,dateline) VALUES('$storename',0,'$manager',$dateline);";

if( mysql_query($insertsql) ){
    echo "<script> alert('库房创建成功！'); window.location.href='storeadd.php';</script>";
}else{
    echo "<script> alert('库房创建失败！'); window.location.href='storeadd.php';</script>";
}