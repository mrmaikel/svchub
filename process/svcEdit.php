<?php
include("svcProcess.php");
include("svcUpload.php");

$func=($_GET['func']);
$attr=($_GET['attr']);

$func($attr);

function loadServType() {
  $data="";
  $catLang = lang($_SESSION["currLang"],"nameEN","nameBM");
  $sql="select * from servcat order by ".$catLang;
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row[lang($_SESSION["currLang"],"nameEN","nameBM")];
    }
  }
  echo $data;
}

function loadState($attr) {
  $attrArr=explode("|^|",$attr);
  $selected=$attrArr[0];

  $data="";
  $sql="select * from state";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row["name"];
    }
  }
  echo $data."|~|".$selected;
}

function loadArea($attr) {
  $attrArr=explode("^",$attr);
  $stateVal=$attrArr[0];
  $selected=$attrArr[1];

  $data="";
  $sql="select * from area where stateId=".$stateVal;
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row["name"];
    }
  }
  echo $data."|~|".$selected;
}

function saveAd($attr) {
  //mysqli_real_escape_string
  //mysqli_real_escape_string
  //echo $attr;
  $ret="";

  $attrData=explode("|$|",$attr);
  $attrParam=$attrData[0];
  $attrNext=$attrData[1];
  //$attrNext="";

  $attrArr=explode("|^|",$attrParam);
  $servType=$attrArr[0];
  $adTitle=mysqli_real_escape_string(conn(),$attrArr[1]);
  $adDesc=mysqli_real_escape_string(conn(),$attrArr[2]);
  $usrId=$attrArr[3];
  $usrEmail=mysqli_real_escape_string(conn(),$attrArr[4]);
  $usrPassword=$attrArr[5];
  $usrName=mysqli_real_escape_string(conn(),$attrArr[6]);
  $usrPhone=$attrArr[7];
  $adId=$attrArr[8];
  $daysArr=$attrArr[9];
  $timeStart=$attrArr[10];
  $timeEnd=$attrArr[11];
  $areaData=$attrArr[12];
  $jobData=$attrArr[13];
  $files=$attrArr[14];
  $pos=$attrArr[15];
  $usrSSM=$attrArr[16];
  $usrCompany=$attrArr[17];
  $quantity=$attrArr[18];
  $condition=$attrArr[19];
  $quality=$attrArr[20];

  // update usr details
  if ($usrId!="") {
    $sqlusr="update usr set name='".$usrName."',phone='".$usrPhone."',ssm='".$usrSSM."',company='".$usrCompany."' where id=".$usrId;
    $resusr=mysqli_query(conn(),$sqlusr);
    if ($resusr!=1) {
      //$ret="Error updating user (".$sqlusr.")";
      $ret="Error updating user";
    }
  } else {  // insert new usr
    $sqlusr="insert into usr (name,email,password,phone,ssm,company) values ('".$usrName."','".$usrEmail."','".$usrPassword."','".$usrPhone."','".$usrSSM."','".$usrCompany."')";
    $link=conn();
    $resusr=mysqli_query($link,$sqlusr);
    $usrId=mysqli_insert_id($link);
    if ($resusr!=1) {
      //$ret="Error inserting user (".$sqlusr.")";    
      $ret="Error inserting user";
    }
  }

  // return
  //echo $adId."^Updated^".$sqlUpdAd;
  //echo $adId."^Saved^".$sqlInsAd;

  // update ad
  if (($adId!="")&&($usrId!="")) {
    $sqlUpdAd="update ad set title='".$adTitle."',description='".$adDesc."',days='".$daysArr."',timeStart='".$timeStart."',timeEnd='".$timeEnd."',servCatId=".$servType.",usrId=".$usrId.",quantity='".$quantity."',cond='".$condition."',quality='".$quality."' where id=".$adId;
    $resUpd=mysqli_query(conn(),$sqlUpdAd);
    if ($resUpd==1) {
      $ret="Updated";
    } else {
      //$ret="Error updating ad (".$sqlUpdAd.")";
      $ret="Error updating ad";
    }
  } else {  // insert new ad
    if ($usrId!="") {
      $sqlInsAd="insert into ad (title,description,days,timeStart,timeEnd,servCatId,usrId,createDT,quantity,cond,quality) values ('".$adTitle."','".nl2br($adDesc)."','".$daysArr."','".$timeStart."','".$timeEnd."',".$servType.",".$usrId.",now(),'".$quantity."','".$condition."','".$quality."')";
      $link=conn();
      $resIns=mysqli_query($link,$sqlInsAd);
      $adId=mysqli_insert_id($link);
      if ($resIns==1) {
        $ret="Saved";
      } else {
        //$ret="Error inserting ad (".$sqlInsAd.")";
        $ret="Error inserting ad";
      }
    }
  }

  if ((($ret=="Saved")||($ret=="Updated"))&&($adId!="")) {
    // insert area
    $delArea="delete from adarea where adId=".$adId;
    $resDelArea = mysqli_query(conn(),$delArea);

    if ($areaData!="") {
      $areaDataArr=explode("|*|",$areaData);
      foreach ($areaDataArr as $value) {
        $valueArr=explode("|~|",$value);
        $area=$valueArr[0];
        $state=$valueArr[1];
        $sqlArea="insert into adarea (adId,areaId,stateId) values (".$adId.",".$area.",".$state.")";
        $resArea = mysqli_query(conn(),$sqlArea);
        if ($resArea!=1) {
          //$ret="Error inserting area (".$sqlArea.")";
          $ret="Error inserting area";
        }
      }
    }

    // insert job
    $delJob="delete from adjob where adId=".$adId;
    $resDelJob = mysqli_query(conn(),$delJob);

    if ($jobData!="") {
      $jobDataArr=explode("|*|",$jobData);
      foreach ($jobDataArr as $value) {
        $valueArr=explode("|~|",$value);
        $job=$valueArr[0];
        $price=$valueArr[1];
        $sqlJob="insert into adjob (adId,job,price) values (".$adId.",'".$job."','".$price."')";
        $resJob = mysqli_query(conn(),$sqlJob);
        if ($resJob!=1) {
          //$ret="Error inserting services (".$sqlJob.")";
          $ret="Error inserting services";
        }
      }
    }
  }

  // insert image
  //if ($files!="") {




    $fileRet=uploadImage($files,$adId,$pos);
    
    //echo $adId."^>".$fileRet."^".$attrNext."^".$pos;
    //return;

    if (isset($fileRet['error'])) {
      $ret="Error uploading images (".$fileRet['error'].")";
    }
  //}

  echo $adId."^".$ret."^".$attrNext."^".$pos;
}

function chkPass($attr) {
  $attrData=explode("|@|",$attr);
  $attrParam=$attrData[0];
  $attrUsrId=$attrData[1];
  $attrPass=$attrData[2];

  $chk="select * from usr where id=".$attrUsrId." and password='".$attrPass."'";
  $resChk = mysqli_query(conn(),$chk);
  $resCnt = mysqli_num_rows($resChk);
  if ($resCnt>0) {
    echo "1|@|".$attrParam;
  } else {
    echo "0|@|".$attrParam;
  }

}

function checkUsr($attr) {
  $usrEmail=explode("^",$attr)[0];
  $chk="select * from usr where email='".$usrEmail."'";
  $resChk = mysqli_query(conn(),$chk);
  $resCnt = mysqli_num_rows($resChk);
  $data="";
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($resChk)) {
      $data=$row["id"]."^".$row["name"]."^".$row["password"]."^".$row["phone"];
    }
  } else {
    $data="";
  }
  echo $data;
}

function getAdEditDetails($attr) {
  $attrArr=explode("^",$attr);
  $adId=$attrArr[0];

  $data="";

  $sql="select * from ad where id=".$adId;
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $title=$row["title"];
      $desc=nl2br($row["description"]);
      $days=$row["days"];
      $timeStart=$row["timeStart"];
      $timeEnd=$row["timeEnd"];
      $servCatId=$row["servCatId"];
      $usrId=$row["usrId"];
      $quantity=$row["quantity"];
      $condition=$row["cond"];
      $quality=$row["quality"];

      // get usr details
      $usrName=getData("select name from usr where id=".$usrId,"name");
      $usrPhone=getData("select phone from usr where id=".$usrId,"phone");
      $usrEmail=getData("select email from usr where id=".$usrId,"email");
      $usrSSM=getData("select ssm from usr where id=".$usrId,"ssm");
      $usrCompany=getData("select company from usr where id=".$usrId,"company");
      $usrChkSSM=getData("select chkssm from usr where id=".$usrId,"chkssm");

      // get images
      $sqlImg="select * from adimg where adId=".$adId." order by pos asc";
      $resImg = mysqli_query(conn(),$sqlImg);
      $resCntImg = mysqli_num_rows($resImg);
      $imgList="";
      if ($resCntImg>0) {
        while($rowImg = mysqli_fetch_array($resImg)) {
          $img=$rowImg["name"];
          $pos=$rowImg["pos"];
          if ($imgList=="") { $imgList=$img.">".$pos; } else { $imgList=$imgList."^".$img.">".$pos; }
        }
      }

      // get area details
      $sqlArea="select * from adarea where adId=".$adId;
      $resArea = mysqli_query(conn(),$sqlArea);
      $resCntArea = mysqli_num_rows($resArea);
      $areaList="";
      if ($resCntArea>0) {
        while($rowArea = mysqli_fetch_array($resArea)) {
          $area=$rowArea["areaId"];
          $state=$rowArea["stateId"];
          if ($areaList=="") { $areaList=$state.">".$area; } else { $areaList=$areaList."^".$state.">".$area; }
        }
      }

      // get job list
      $sqlJob="select * from adjob where adId=".$adId;
      $resJob = mysqli_query(conn(),$sqlJob);
      $resCntJob = mysqli_num_rows($resJob);
      $jobList="";
      if ($resCntJob>0) {
        while($rowJob = mysqli_fetch_array($resJob)) {
          $job=$rowJob["job"];
          $price=$rowJob["price"];
          if ($jobList=="") { $jobList=$job.">".$price; } else { $jobList=$jobList."^".$job.">".$price; }
        }
      }
      //preg_replace('~/+~', '/', $desc) - replace double slash //
      $data=$adId."||".$title."||".preg_replace('~/+~', '/', $desc)."||".$usrId."||".$usrName."||".$usrPhone."||".$usrEmail."||".$servCatId."||".$imgList."||".$areaList."||".$jobList."||".$days."||".$timeStart."||".$timeEnd."||".$usrSSM."||".$usrCompany."||".$usrChkSSM."||".$quantity."||".$condition."||".$quality;
    }
  }
  echo $data;
}

?>
