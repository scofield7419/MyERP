<?php
    require_once ('../../myERP/inc.php');
if(!(isset($_POST['meterialname']) && (!empty($_POST['meterialname'])))){ //入库前做一个简单的校验
    echo "<script> alert('物料名称不可为空'); window.location.href='meterialadd.php';</script>";
}
$meterialname =$_POST['meterialname'];
$meterialnumber =$_POST['meterialnumber'];
$price =$_POST['price'];
$sum =$_POST['sum'];
$storename =$_POST['storename'];

/*对库房进行更新: 对store进行update，对storecontent进行插入 */
$selectstore = "SELECT * FROM store WHERE storename = '$storename' ;" ;
$query2 = mysql_query($selectstore);
$rows2 = mysql_fetch_assoc($query2);
$allsum = $rows2['allsum'] + $sum ;
$storeid = $rows2['id'];
$updstore = "UPDATE store SET allsum = $allsum WHERE storename = '$storename'; ";
mysql_query($updstore);
$inserstorecontent = "INSERT storecontent(storeid,meterialname,meterialnumber,meterialsum,meterialprice) VALUES($storeid,'$meterialname','$meterialnumber',$sum,$price);";
mysql_query($inserstorecontent);

$adddate = time()+6*60*60;
$remark =$_POST['remark'];
$insertsql = "INSERT meterial(meterialname,meterialnumber,price,sum,storeid,adddate,remark) VALUES('$meterialname',$meterialnumber,$price,$sum,$storeid,$adddate,'$remark');";
//print_r($insertsql);

if( mysql_query($insertsql) ){
    echo "<script> alert('物料存储成功！'); window.location.href='meterialadd.php';</script>";
}else{
    echo "<script> alert('物理存储失败！'); window.location.href='meterialadd.php';</script>";
}
