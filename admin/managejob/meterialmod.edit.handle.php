<?php
require_once ('../../myERP/inc.php');
// print_r($_POST);//POST是从对应的页面中method提取的数据
if(!(isset($_POST['meterialname']) && (!empty($_POST['meterialname'])))){ //入库前做一个简单的校验
    echo "<script> alert('物料名称不可为空'); window.location.href='meterialmod.php';</script>";
}
$id = $_POST['id'];
$meterialname =$_POST['meterialname'];
$meterialnumber =$_POST['meterialnumber'];
$price =$_POST['price'];
$sum =$_POST['sum'];
$storename =$_POST['storename'];


/*对库房进行更新: 对store进行update，对storecontent进行插入 */
$selectmeter = "SELECT * FROM meterial WHERE id = '$id' ;" ;
$query3 = mysql_query($selectmeter);
$rows3 = mysql_fetch_assoc($query3);
$changesum = $rows3['sum'] - $sum ;
$oldmeterialname=$rows3['meterialname'];
$selectstore = "SELECT * FROM store WHERE storename = '$storename' ;" ;
$query2 = mysql_query($selectstore);
$rows2 = mysql_fetch_assoc($query2);
$allsum = $rows2['allsum'] - $changesum ;
$storeid = $rows2['id'];
$updstore = "UPDATE store SET allsum = $allsum WHERE storename = '$storename'; ";
mysql_query($updstore);
$updatstorecontent = "UPDATE storecontent SET meterialname='$meterialname',meterialnumber='$meterialnumber',meterialsum=$sum,meterialprice=$price , storeid=$storeid WHERE meterialname = '$oldmeterialname' ;";
mysql_query($updatstorecontent);

$remark =$_POST['remark'];
$updatesql = "UPDATE meterial SET meterialname='$meterialname',meterialnumber=$meterialnumber,price=$price,sum=$sum,storeid=$storeid ,remark='$remark' WHERE id=$id;";

// print_r($updatesql);

if (mysql_query($updatesql)) {
    echo "<script> alert('物料记录修改成功'); window.location.href='meterialmod.php';</script>";
} else {
    echo "<script> alert('物料记录修改失败'); window.location.href='meterialmod.php';</script>";
}
?>
