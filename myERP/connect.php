<?php
    require_once 'config.php';
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);//���ʹ��mysql()��������
    if(!($con = mysql_connect(HOST,USERNAME,PASSWORD)) ) 
        echo mysql_error();
    
    if(!mysql_select_db('myerp') )
        echo mysql_error();
    
    if(!mysql_query('SET names utf8') )
        echo mysql_error();
?>