<?php
require_once ('../../myERP/inc.php');
if (! (isset($_POST['username']) && (! empty($_POST['username'])))) { // 入库前做一个简单的校验
    echo "<script> alert('文章标题不可为空'); window.location.href='article.add.php';</script>";
}
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];
$realname = $_POST['realname'];
$userdepartment = $_POST['userdepartment'];
$userrole = $_POST['userrole'];
if ($userrole == '管理员') {
    $type = 0;
} else {
    $type = 1;
}
$insertsql = "INSERT user(name,realname,department,role,password,type) VALUES('$username','$realname','$userdepartment','$userrole','$userpassword',$type);";

if (mysql_query($insertsql)) {
    echo "<script> alert('用户创建成功！'); window.location.href='usermanage.php';</script>";
} else {
    echo "<script> alert('用户创建失败！'); window.location.href='adduser.php';</script>";
}