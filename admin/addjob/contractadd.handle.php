<?php
    require_once ('../../myERP/inc.php');
if(!(isset($_POST['companyother']) && (!empty($_POST['companyother'])))){ //入库前做一个简单的校验
    echo "<script> alert('公司名不可为空'); window.location.href='contractadd.php';</script>";
}
$companyother =$_POST['companyother'];
$corporateother =$_POST['corporateother'];
$companyus =$_POST['companyus'];
$corporateus =$_POST['corporateus'];
$content =$_POST['content'];
$remark =$_POST['remark'];
$dateline = time()+6*60*60 ;
$insertsql = "INSERT contract(companyother,companyus,corporateother,corporateus,content,remark,dateline) VALUES('$companyother','$companyus','$corporateother','$corporateus','$content','$remark',$dateline);";
//print_r($insertsql);

if( mysql_query($insertsql) ){
    echo "<script> alert('合同存档成功！合同一旦建立不能删除不能修改！'); window.location.href='contractadd.php';</script>";
}else{
    echo "<script> alert('合同存档失败！'); window.location.href='contractadd.php';</script>";
}
