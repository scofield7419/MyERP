<?php
    require_once ('../../myERP/inc.php');
//    print_r($_POST);//POST是从对应的页面中method提取的数据
    $id = $_POST['id'];//modify的input标签里的value键值对post过来的值在这里被接收。
    if(!(isset($_POST['username']) && (!empty($_POST['username'])))){ //入库前做一个简单的校验
        echo "<script> alert('账户名不可为空'); window.location.href='accountmanage.php?id=$id';</script>" ;
    }
    $username =$_POST['username'];
    $userpassword =$_POST['userpassword'];
    $realname =$_POST['realname'];
    $userdepartment =$_POST['userdepartment'];
    $userrole =$_POST['userrole'];
    if($userrole == '管理员'){
        $type=0;
    }else{
        $type = 1;
    }
    $updatesql = "UPDATE user SET name='$username',realname='$realname',department='$userdepartment',role='$userrole',password='$userpassword', type=$type WHERE id=$id;";
    
//    print_r($updatesql);
    
    if( mysql_query($updatesql) ){ 
        echo "<script> alert('账户修改成功'); window.location.href='usermanage.php';</script>";
    }else{
        echo "<script> alert('账户修改失败'); window.location.href='accountmanage.php?id=$id';</script>";
    }
?>