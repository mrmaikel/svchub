<?php
include("svcProcess.php");

$func=($_GET['func']);
$attr=($_GET['attr']);

$func($attr);

function getAdDetails($attr) {
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
      $usrSSM=getData("select ssm from usr where id=".$usrId,"ssm");
      $usrCompany=getData("select company from usr where id=".$usrId,"company");
      $usrChkSSM=getData("select chkssm from usr where id=".$usrId,"chkssm");

      // get service category description
      $catLang = lang($_SESSION["currLang"],"nameEN","nameBM");
      $servCat = getData("select ".$catLang." from servcat where id=".$servCatId,$catLang);

      // get images
      $sqlImg="select * from adimg where adId=".$adId." order by pos asc";
      $resImg = mysqli_query(conn(),$sqlImg);
      $resCntImg = mysqli_num_rows($resImg);
      $imgList="";
      if ($resCntImg>0) {
        while($rowImg = mysqli_fetch_array($resImg)) {
          $img=$rowImg["name"];
          if ($imgList=="") { $imgList=$img; } else { $imgList=$imgList."^".$img; }
        }
      }

      // get area details
      $sqlArea="select * from adarea where adId=".$adId." order by stateId,areaId";
      $resArea = mysqli_query(conn(),$sqlArea);
      $resCntArea = mysqli_num_rows($resArea);
      $areaList="";
      if ($resCntArea>0) {
        while($rowArea = mysqli_fetch_array($resArea)) {
          $area=$rowArea["areaId"];
          $state=$rowArea["stateId"];
          if ($area!="0") { $areaName=getData("select name from area where id=".$area,"name"); } else { $areaName=lang($_SESSION["currLang"],"All Area","Semua Kawasan"); }
          $stateName=getData("select name from state where id=".$state,"name");
          if ($areaList=="") { $areaList=$stateName.">".$areaName; } else { $areaList=$areaList."^".$stateName.">".$areaName; }
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

      // get bookmark details
      $bookmark="";
      if (isset($_SESSION["usrId"])!="") {
        $bookmark=getData("select adId from bookmark where usrId=".$_SESSION["usrId"]." and adId=".$adId,"adId");
      }

      //preg_replace('~/+~', '/', $desc) - replace double slash //
      $data=$adId."||".$title."||".preg_replace('~/+~', '/', $desc)."||".$usrName."||".$usrPhone."||".$servCat."||".$imgList."||".$areaList."||".$jobList."||".$days."||".$timeStart."||".$timeEnd."||".$usrId."||".$bookmark."||".$usrSSM."||".$usrCompany."||".$usrChkSSM."||".$quantity."||".$condition."||".$quality;
    }
  }
  echo $data;
}

function addToBookmark($attr) {
  $attrArr=explode("^",$attr);
  $adId=$attrArr[0];
  $usrId=$attrArr[1];
  $res=runSQL("insert into bookmark (adId,usrId) values (".$adId.",".$usrId.")");
  $img=getData("select name from adimg where adId=".$adId." and pos=1","name");
  $title=getData("select title from ad where id=".$adId,"title");
  if ($res==1) {
    $msg=lang($_SESSION["currLang"],"Bookmark added","Penanda telah ditambah");
    echo $msg."^1^".$adId."^".$usrId."^".$img."^".$title;
  } else {
    $msg=lang($_SESSION["currLang"],"Error adding bookmark"," Ralat semasa menambah penanda");
    echo $msg."^0";
  }
}

function removeFromBookmark($attr) {
  $attrArr=explode("^",$attr);
  $adId=$attrArr[0];
  $usrId=$attrArr[1];
  $res=runSQL("delete from bookmark where adId=".$adId." and usrId=".$usrId);
  if ($res==1) {
    $msg=lang($_SESSION["currLang"],"Bookmark removed","Penanda telah dibuang");
    echo $msg."^2^".$adId."^".$usrId;
  } else {
    $msg=lang($_SESSION["currLang"],"Error removing bookmark"," Ralat semasa membuang penanda");
    echo $msg."^0";
  }
}

?>
