<?php
require_once ('../../myERP/inc.php');
// print_r($_POST);//POST是从对应的页面中method提取的数据
if (! (isset($_POST['proname']) && (! empty($_POST['proname'])))) { // 入库前做一个简单的校验
    echo "<script> alert('产品名称不可为空'); window.location.href='craftmod.php';</script>";
}
$id = $_POST['id'];
$proname =$_POST['proname'];
$pronumber =$_POST['pronumber'];
$craftname =$_POST['craftname'];
$craftnumber =$_POST['craftnumber'];
$updatesql = "UPDATE craft SET proname='$proname', pronumber='$pronumber', craftname='$craftname', craftnumber='$craftnumber' WHERE id=$id;";

$lenth=count($_POST);
$content = 'content';
$meterial = 'meterial';
for($i=0;$i<($lenth-5)/3 ;$i++){
    $content = 'content'.($i+1);
    $meterial = 'meterial'.($i+1);
    $insertsql1 = "UPDATE craftcontent SET content =";
    $tempcontent = $_POST["$content"];
    $insertsql1 .= "'$tempcontent'";
    $insertsql1 .= " , meterial = ";
    $tempmeterial = $_POST["$meterial"];
    $insertsql1 .= "'$tempmeterial'";
    $insertsql1 .= " WHERE id = ";
    $tempid = 'craftcontentid'.($i+1);
    $craftcontentid = $_POST["$tempid"] ;
    $insertsql1 .= "$craftcontentid";
    $insertsql1 .= " ;";
    mysql_query($insertsql1);
    //    print_r($insertsql1);
    //    echo "<br/>";
}

// print_r($updatesql);

if (mysql_query($updatesql)) {
    echo "<script> alert('工艺流程修改成功'); window.location.href='craftmod.php';</script>";
} else {
    echo "<script> alert('工艺流程修改失败'); window.location.href='craftmod.php';</script>";
}
?>
