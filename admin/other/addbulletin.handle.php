<?php
require_once ('../../myERP/inc.php');
$userid = $_POST['userid'];
if (! (isset($_POST['title']) && (! empty($_POST['title'])))) { // 入库前做一个简单的校验
    echo "<script> alert('公告标题不可为空'); window.location.href='bulletinmanage.php?id=" . "$userid" . "';</script>";
}
$title = $_POST['title'];
$content = $_POST['content'];
$dateline = time()+6*60*60 ;
$selctsql = "SELECT * FROM user WHERE id=$userid ;";
$res = mysql_query($selctsql);
$data = mysql_fetch_array($res);    
$distributor = $data['realname'];
$insertsql = "INSERT bulletin(title,distributor,content,dateline) VALUES('$title','$distributor','$content',$dateline);";

if (mysql_query($insertsql)) {
    echo "<script> alert('公告发布成功！'); window.location.href='bulletinmanage.php?id=" . "$userid" . "';</script>";
} else {
    echo "<script> alert('公告发布失败！'); window.location.href='bulletinmanage.php?id=" . "$userid" . "';</script>";
}