<?php
include("svcProcess.php");

$func=($_GET['func']);
$attr=($_GET['attr']);

$func($attr);

function chkSession() {
  if (isset($_SESSION["usrId"])!="") {
    echo $_SESSION["usrId"]."^".$_SESSION["usrName"]."^".$_SESSION["currLang"];
  } else {
    echo "";
  }
}

function login($attr) {
  $attrArr=explode("|^|",$attr);
  $loginEmail=$attrArr[0];
  $loginPass=$attrArr[1];
  $data="";

  $sql="select * from usr where email='".$loginEmail."' and password='".md5($loginPass)."'";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);

  if ($resCnt==1) {
    while($row = mysqli_fetch_array($res)) {
      // setting session
      if (isset($_SESSION["usrId"])) {
        unset($_SESSION["usrId"]);
        unset($_SESSION["usrName"]);
        unset($_SESSION["currLang"]);
      }
      $_SESSION["usrId"]=$row["id"];
      $_SESSION["usrName"]=$row["name"];
      $_SESSION["currLang"]=$row["lang"];

      $adData=popUsrPanel($row["id"]."|^|1");
      $data="Successfully logged in".$adData;
    }
  }
  echo $data;   //."^".$sql."^".$_SESSION["usrId"]."^".$x;
}

function register($attr) {
  $attrArr=explode("|^|",$attr);
  $loginName=$attrArr[0];
  $loginEmail=$attrArr[1];
  $loginPass=$attrArr[2];
  $data="";

  // check existing
  $sqlChk="select * from usr where email='".$loginEmail."'";
  $resChk = mysqli_query(conn(),$sqlChk);
  $resChkCnt = mysqli_num_rows($resChk);
  if ($resChkCnt<1) {

    $sql="insert into usr (name,email,password) values ('".$loginName."','".$loginEmail."','".md5($loginPass)."')";
    $link=conn();
    $res = mysqli_query($link,$sql);

    if ($res==1) {

      $usrId=mysqli_insert_id($link);

      // setting session
      if (isset($_SESSION["usrId"])) {
        unset($_SESSION["usrId"]);
        unset($_SESSION["usrName"]);
      }
      $_SESSION["usrId"]=$usrId;
      $_SESSION["usrName"]=$loginName;

      //$data="Successfully registered|~|".$usrId."|^|".$loginName;
      $data="Successfully registered".popUsrPanel($usrId."|^|1");
    }
  } else {
    $data="Email already registered";
  }
  echo $data;
}


function popUsrPanel($attr) {
  $ret="";
  $attrArr=explode("|^|",$attr);
  $usrId=$attrArr[0];
  $from=$attrArr[1];
  // $from = 1 - after login/register, 2 - after refresh

  $usrLang=getData("select lang from usr where id=".$usrId,"lang");
  // get username & language
  $ret="|~|".$usrId."|^|".getData("select name from usr where id=".$usrId,"name")."|^|";
  $ret=$ret.$usrLang."|^|";
  $ret=$ret.getData("select phone from usr where id=".$usrId,"phone")."|^|";
  $ret=$ret.getData("select count(id) as adCnt from ad where usrId=".$usrId." and status='active'","adCnt")."|^|";
  $ret=$ret.getData("select count(id) as bookCnt from bookmark where usrId=".$usrId,"bookCnt");
  $ret=$ret."|~|";

  $_SESSION["currLang"]=$usrLang;

  // fav
  $sqlFav="select * from bookmark where usrId=".$usrId;
  $resFav = mysqli_query(conn(),$sqlFav);
  $resFavCnt = mysqli_num_rows($resFav);
  if ($resFavCnt>0) {
    while($rowFav = mysqli_fetch_array($resFav)) {
      $ret=$ret.$rowFav["adId"]."|^|".getData("select title from ad where id=".$rowFav["adId"],"title");

      $sqlFavImg="select name from adimg where adId=".$rowFav["adId"]." and pos=1";
      $mainFavImg=getData($sqlFavImg,"name");

      $ret=$ret."|^|".$mainFavImg."|*|";
    }
  }

  $ret=$ret."|~|";

  // ad
  $sqlAd="select * from ad where usrId=".$usrId." order by status";
  $resAd = mysqli_query(conn(),$sqlAd);
  $resAdCnt = mysqli_num_rows($resAd);
  if ($resAdCnt>0) {
    while($rowAd = mysqli_fetch_array($resAd)) {
      $ret=$ret.$rowAd["id"]."|^|".$rowAd["title"]."|^|".$rowAd["status"];

      $sqlAdImg="select name from adimg where adId=".$rowAd["id"]." and pos=1";
      $mainAdImg=getData($sqlAdImg,"name");

      $ret=$ret."|^|".$mainAdImg."|*|";
    }
  }

  if ($from=="1") {
    return $ret;
  } else {
    echo $ret;
  }
}

function logout() {
  if (isset($_SESSION["usrId"])) {
    $_SESSION["usrId"]="";
    $_SESSION["usrName"]="";
    unset($_SESSION["usrId"]);
    unset($_SESSION["usrName"]);

    unset($_SESSION["currLang"]);
  }
}

function getUsrDetails() {
  $ret="";
  $sql="select * from usr where id=".$_SESSION["usrId"];
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt==1) {
    while($row = mysqli_fetch_array($res)) {
      $ret=$row["name"]."|^|".$row["email"]."|^|".$row["phone"]."|^|".$row["ssm"]."|^|".$row["company"]."|^|".$row["chkssm"];
    }
  }
  echo $ret;
}

function toggleAdStatus($attr) {
  $attrArr=explode("|^|",$attr);
  $adId=$attrArr[0];
  $statClick=$attrArr[1];
  $sql="update ad set status='".$statClick."' where id=".$adId;
  $res = mysqli_query(conn(),$sql);
  $ret="";
  $isSusccess="false";
  if ($res==1) {
    $isSusccess="true";
    if ($statClick=="inactive") {
      $textEn = "Successfully deactivate ad";
      $textBm = "Iklan berjaya di nyahaktifkan";
    } else {
      $textEn = "Successfully activate ad";
      $textBm = "Iklan berjaya di akifkan";
    }
    $ret=lang($lg,$textEn,$textBm);
  } else {
    $ret=lang($lg,"Failed to update ad status","Gagal untuk mengemaskini iklan");
  }
  echo $ret."^".$isSusccess."^".$adId."^".$statClick;
}

?>
