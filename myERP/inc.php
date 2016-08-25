<?php
require_once 'connect.php';


function checkLoginaddmin(){
    if(count($_SESSION)== 0){
        echo "<script> alert('请先登录'); window.location.href='../index.php';</script>";
        exit();
    }
    if($_SESSION['type'] == 1){
        echo "<script> alert('你没有权限访问管理员页面'); window.history.back(-1);</script>";
        exit();
    }
}
function checkLoginworker(){
    if(count($_SESSION)== 0){
        echo "<script> alert('请先登录'); window.location.href='../index.php';</script>";
        exit();
    }
    if($_SESSION['type'] == 0){
        echo "<script> alert('请访问管理员页面'); window.history.back(-1);</script>";
        exit();
    }
}
