<?php
    require_once ('../../myERP/inc.php');
if(!(isset($_POST['proname']) && (!empty($_POST['proname'])))){ //入库前做一个简单的校验
    echo "<script> alert('产品名称不可为空'); window.location.href='craftadd.php';</script>";
}
$creator = $_SESSION['realname'];
$proname =$_POST['proname'];
$pronumber =$_POST['pronumber'];
$craftname =$_POST['craftname'];
$craftnumber =$_POST['craftnumber'];
$dateline = time()+6*60*60 ;
$insertsql = "INSERT craft(proname,pronumber,craftname,craftnumber,dateline,creator) VALUES('$proname',$pronumber,'$craftname',$craftnumber,$dateline,'$creator');";
mysql_query($insertsql);
$sql = "SELECT * FROM craft ORDER BY id DESC";
$lastidarray=mysql_fetch_array(mysql_query($sql));
$craftid = $lastidarray['id'];

$lenth=count($_POST);
//echo "<script> alert($lengh); </script>";
//var_dump($_POST);
// print_r($_POST);

$content = 'content';
$meterial = 'meterial';
for($i=0;$i<($lenth-4)>>1 ;$i++){
    $insertsql1 = "INSERT craftcontent(craftid,craftorder,content,meterial) VALUES(";
    $content = 'content'.($i+1);
    $meterial = 'meterial'.($i+1);
    $insertsql1 .= $craftid;
    $insertsql1 .= ",";
    $insertsql1 .= ($i+1);
    $insertsql1 .= ",";
    $insertsql1 .= "'$_POST[$content]'";
    $insertsql1 .= ",";
    $insertsql1 .= "'$_POST[$meterial]'";
    $insertsql1 .= ");";
    mysql_query($insertsql1);
//    print_r($insertsql1);
//    echo "<br/>";
}
echo "<script> alert('任务发布成功！'); window.location.href='craftadd.php';</script>";

// $getjobyear =$_POST['getjobyear'];
// $getjobmonth =$_POST['getjobmonth'];
// $stopjobyear =$_POST['stopjobyear'];
// $stopjobmonth =$_POST['stopjobmonth'];
// $remark =$_POST['remark'];
// $insertsql = "INSERT job(proname,jobnumber,jobmonth,jobgroup,getjobyear,getjobmonth,stopjobyear,stopjobmonth,remark,dateline) VALUES('$proname',$jobnumber,$jobmonth,'$jobgroup',$getjobyear,$getjobmonth,$stopjobyear,$stopjobmonth,'$remark',$dateline);";
// //print_r($insertsql);

// if( mysql_query($insertsql) ){
//     echo "<script> alert('任务发布成功！'); window.location.href='craftadd.php';</script>";
// }else{
//     echo "<script> alert('任务发布失败！'); window.location.href='craftadd.php';</script>";
// }
?>