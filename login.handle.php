<?php
require_once './myERP/connect.php';
$name = $_POST['name'];
$passowrd = $_POST['password'];
if ($name && $passowrd) {
    $sql = "SELECT * FROM user WHERE name = '$name' and password='$passowrd' ;";
    $sql2 = "SELECT type FROM user WHERE name = '$name';";
    $res = mysql_query($sql);
    $res2 = mysql_query($sql2);
    $rows = mysql_num_rows($res);
    $rows2 = mysql_fetch_array($res2);
    $rows3 = mysql_fetch_assoc($res);
    $_SESSION['name'] = $name;
    $_SESSION['id']=$rows3['id'];
    $_SESSION['type']=$rows3['type'];
    $_SESSION['realname']=$rows3['realname'];
    if ($rows) {
        if ($rows2['type'] == 0) {
            header("Location: admin/admin.php");
            exit();
        } else {
            header("Location:worker/worker.php");
            exit();
        }
    } else {
        echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
    }
} else {
    echo "<script language=javascript>alert('用户名密码不能为空');history.back();</script>";
}
?>
