<?php
// This script was created by phpMyBackupPro 2.5 (http://www.phpMyBackupPro.net)
// In order to work probably, it must be saved in the directory /home/servishu/public_html/dbbak/.
$_POST['db']=array("servishu_svchub", );
$_POST['tables']="on";
$_POST['data']="on";
$_POST['drop']="on";
$period=(3600*24)/24;
$security_key="39fb30a77b752c372b63f6fa86973c87";
// switch to the phpMyBackupPro 2.5 directory
@chdir("/home/servishu/public_html");
@include("backup.php");
// switch back to the directory containing this script
@chdir("/home/servishu/public_html/dbbak/");
?>