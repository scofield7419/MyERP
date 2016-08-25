<?php
require_once ('../../myERP/inc.php');
// print_r($_POST);//POST是从对应的页面中method提取的数据
if (! (isset($_POST['proname']) && (! empty($_POST['proname'])))) { // 入库前做一个简单的校验
    echo "<script> alert('产品名称不可为空'); window.location.href='jobmod.php';</script>";
}
$id = $_POST['id'];
$proname = $_POST['proname'];
$jobnumber = $_POST['jobnumber'];
$jobmonth = $_POST['jobmonth'];
$jobgroup = $_POST['jobgroup'];
$getjobyear = $_POST['getjobyear'];
$getjobmonth = $_POST['getjobmonth'];
$stopjobyear = $_POST['stopjobyear'];
$stopjobmonth = $_POST['stopjobmonth'];
$remark = $_POST['remark'];
$dateline = time()+6*60*60 ;
$updatesql = "UPDATE job SET proname='$proname',jobnumber='$jobnumber',jobmonth='$jobmonth',jobgroup='$jobgroup',getjobyear='$getjobyear',getjobmonth='$getjobmonth', stopjobyear='$stopjobyear',stopjobmonth='$stopjobmonth',remark='$remark',dateline=$dateline WHERE id=$id;";

// print_r($updatesql);

if (mysql_query($updatesql)) {
    echo "<script> alert('任务修改成功'); window.location.href='jobmod.php';</script>";
} else {
    echo "<script> alert('任务修改失败'); window.location.href='jobmod.php';</script>";
}
?>
