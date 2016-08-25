<?php
require_once ('../../myERP/inc.php');
$id = $_GET['id'];
$meterialname = $_GET['meterialname'];
$storeid=$_GET['storeid'];

$sql = "SELECT * FROM meterial WHERE id=$id;";
$res=mysql_query($sql);
$date=mysql_fetch_assoc($res);
$sum = $date['sum'];

$sql2 = "SELECT * FROM store WHERE id=$storeid;";
$res2=mysql_query($sql2);
$date2=mysql_fetch_assoc($res2);
$allsum = $date2['allsum'] - $sum;


$updatesql = "UPDATE FROM store SET allsum = $allsum";
$deletesql = "DELETE FROM meterial WHERE id=$id;";
$deletesql2 = "DELETE FROM storecontent WHERE meterialname='$meterialname';";
//    print_r($updatesql);

if( mysql_query($deletesql)&&mysql_query($deletesql2) ){
    echo "<script> alert('物料记录删除成功'); window.location.href='meterialmod.php';</script>";
}else{
    echo "<script> alert('物料记录删除失败'); window.location.href='meterialmod.php';</script>";
}
?>