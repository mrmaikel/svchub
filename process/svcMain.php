<?php
include("svcProcess.php");
include("svcUpload.php");

$func=($_GET['func']);
$attr=($_GET['attr']);

$func($attr);

function loadDrawer() {
  $data="";
  $sql="select * from servcat order by id";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data.$row["id"]."^".$row["nameEN"]."^".$row["nameBM"]."||";
    }
  }
  echo $data;
}

function loadLang($attr) {
  if ($attr=="") {    // initial load - 1st time user
    //$attr is passed as "null"
    $attr = "en";
  }
  if (isset($_SESSION["usrId"])!="") {
    echo $_SESSION["currLang"];
  } else {
    $_SESSION["currLang"]=$attr;
    echo $attr;
  }
}

function setLang($attr) {
  $attrArr=explode("^",$attr);
  $currLang=$attrArr[0];
  $usrId=$attrArr[1];
  $sql="update usr set lang='".$currLang."' where id=".$usrId;
  $res = mysqli_query(conn(),$sql);
  $_SESSION["currLang"]=$currLang;
  echo $currLang;
}

function loadInit() {
  $data="";
  $sql="select * from servcat";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      if ($data=="") { $data=$row["id"]."|^|".$row[lang($_SESSION["currLang"],"nameEN","nameBM")]; }
      else { $data=$data."|~|".$row["id"]."|^|".$row[lang($_SESSION["currLang"],"nameEN","nameBM")]; }
    }
  }
  $data=$data."|*|";
  $sql="select * from state";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data.$row["id"]."|^|".$row["name"]."|~|";
    }
  }
  $data=$data."|*|";
  $sql="select * from area";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data.$row["id"]."|^|".$row["name"]."|~|";
    }
  }

  echo $data;
}

?>
