<?php
session_start();
include("svcConn.php");

// general functions

function getData($sql,$field) {
	$data="";
	$res = mysqli_query(conn(),$sql);
	$resCnt = mysqli_num_rows($res);
	if ($resCnt>0) {
		while($row = mysqli_fetch_array($res)) {
			$data=$row[$field];
		}
	}
	return $data;
}

function runSQL($sql) {
	$res = mysqli_query(conn(),$sql);
	return $res;
}

function lang($lg,$textEn,$textBm) {
	if ($lg=="") { $lg=$currLang; }
	if ($lg=="en") {
		return $textEn;
	} else {
		return $textBm;
	}
}

?>
