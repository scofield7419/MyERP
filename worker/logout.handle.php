<?php
require_once ('../myERP/inc.php');
$_SESSION=array();
session_destroy();
header("location:../index.php");
?>