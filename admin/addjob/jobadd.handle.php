<?php
    require_once ('../../myERP/inc.php');
if(!(isset($_POST['proname']) && (!empty($_POST['proname'])))){ //入库前做一个简单的校验
    echo "<script> alert('产品名称不可为空'); window.location.href='jobadd.php';</script>";
}
$proname =$_POST['proname'];
$jobnumber =$_POST['jobnumber'];
$jobmonth =$_POST['jobmonth'];
$jobgroup =$_POST['jobgroup'];
$getjobyear =$_POST['getjobyear'];
$getjobmonth =$_POST['getjobmonth'];
$stopjobyear =$_POST['stopjobyear'];
$stopjobmonth =$_POST['stopjobmonth'];
$remark =$_POST['remark'];
$dateline = time()+6*60*60 ;
$insertsql = "INSERT job(proname,jobnumber,jobmonth,jobgroup,getjobyear,getjobmonth,stopjobyear,stopjobmonth,remark,dateline) VALUES('$proname',$jobnumber,$jobmonth,'$jobgroup',$getjobyear,$getjobmonth,$stopjobyear,$stopjobmonth,'$remark',$dateline);";
//print_r($insertsql);

if( mysql_query($insertsql) ){
    echo "<script> alert('任务发布成功！'); window.location.href='jobadd.php';</script>";
}else{
    echo "<script> alert('任务发布失败！'); window.location.href='jobadd.php';</script>";
}
