<?php
include("svcProcess.php");

$func=($_GET['func']);
$attr=($_GET['attr']);

$func($attr);

function loadServType() {
  $data="";
  $sql="select * from servcat";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row[lang($_SESSION["currLang"],"nameEN","nameBM")];
    }
  }
  echo $data;
}

function loadAvailServType() {
  $data="";
  $catLang = lang($_SESSION["currLang"],"nameEN","nameBM");
  $sql="select b.id as id,b.".$catLang." as ".$catLang." from ad a inner join servcat b on a.servCatId=b.id group by a.servCatId";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row[lang($_SESSION["currLang"],"nameEN","nameBM")];
    }
  }
  echo $data;
}

function loadState() {
  $data="";
  $sql="select * from state";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row["name"];
    }
  }
  echo $data;
}

function loadAvailState() {
  $data="";
  $sql="select b.id as id, b.name as name from adarea a inner join state b on a.stateId=b.id inner join ad c on a.adId=c.id where c.status='active' group by a.stateId";
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $data=$data."||".$row["id"]."^".$row["name"];
    }
  }
  echo $data;
}

function loadArea($attr) {
  if ($attr!="") {
    $data="";
    $sql="select * from area where stateId=".$attr;
    $res = mysqli_query(conn(),$sql);
    $resCnt = mysqli_num_rows($res);
    if ($resCnt>0) {
      while($row = mysqli_fetch_array($res)) {
        $data=$data."||".$row["id"]."^".$row["name"];
      }
    }
    echo $data;
  } else {
    echo "";
  }
}

function loadAvailArea($attr) {
  if ($attr!="") {
    $data="";
    //$sql="select b.id as id, b.name as name from adarea a inner join area b on a.areaId=b.id inner where a.stateId=".$attr." group by a.areaId";
    $sql="select b.id as id, b.name as name from adarea a inner join area b on a.areaId=b.id inner join ad c on a.adId=c.id where a.stateId=".$attr." and c.status='active' group by a.areaId";
    $res = mysqli_query(conn(),$sql);
    $resCnt = mysqli_num_rows($res);
    if ($resCnt>0) {
      while($row = mysqli_fetch_array($res)) {
        $data=$data."||".$row["id"]."^".$row["name"]."^".$attr;
      }
    } else {
      $data="^^".$attr;
    }
    echo $data;
  } else {
    echo "";
  }
}






// search

function srcService($attr) {
  $attrArr=explode("^",$attr);
  $word=$attrArr[0];
  $servType=$attrArr[1];
  $state=$attrArr[2];
  $area=$attrArr[3];
  $pgno=$attrArr[4];
  $limit=$attrArr[5];
  
  if ($limit==0) { $limit=16; }   // ads per page =16
  if ($pgno=="") { $pgno=1; }
  $offset=($pgno-1)*$limit;
  $data="";
  $where="";
  $inner="";

  if ($state!="") { $inner="inner join adarea b on b.adId=a.id where b.stateId=".$state; }
  if ($area!="") { $inner=$inner." and b.areaId=".$area; }
  if ($servType!="") { if (($where=="")&&($inner=="")) { $where="where a.servCatId=".$servType; } else { $where=$where." and a.servCatId=".$servType; } }
  if ($word!="") { if (($where=="")&&($inner=="")) { $where="where (a.title like '%".$word."%' or a.description like '%".$word."%')"; } else { $where=$where." and (a.title like '%".$word."%' or a.description like '%".$word."%')"; } }
  //if ($word!="") { if (($where=="")&&($inner=="")) { $where="where a.title like '%".$word."%'"; } else { $where=$where." and a.title like '%".$title."%'"; } }

  if (($where=="")&&($inner=="")) { $where = "where a.status='active'"; } else { $where=$where."  and a.status='active'"; }

  // $pgCnt=ceil($resPgCnt/$limit); $pgDet -> count page numbers
  $sqlPg="select a.id as adId,a.title,a.description,a.usrId from ad a ".$inner." ".$where." group by a.id";

	$resPg = mysqli_query(conn(),$sqlPg);
	$resPgCnt = mysqli_num_rows($resPg);
	$pgCnt=ceil($resPgCnt/$limit);
  $pgDet=$resPgCnt."|^|".$pgCnt."|^|".$limit."|^|".$offset."|^|".$pgno;

  $sql="select a.id as adId,a.title,a.description,a.usrId from ad a ".$inner." ".$where." group by a.id limit ".$limit." offset ".$offset;
  $res = mysqli_query(conn(),$sql);
  $resCnt = mysqli_num_rows($res);
  if ($resCnt>0) {
    while($row = mysqli_fetch_array($res)) {
      $adId=$row["adId"];
      $usrId=$row["usrId"];
      $adTitle=$row["title"];
      $adDesc=preg_replace('~/+~', '/', nl2br($row["description"]));

      // get first image
      $img="select name from adimg where adId=".$adId." order by pos asc limit 1";
      $imgName=getData($img,"name");

      // get usr
      $usr="select * from usr where id=".$usrId;
      $usrName=getData($usr,"name");
      $usrPhone=getData($usr,"phone");
      $usrChkSSM=getData($usr,"chkssm");

      // get jobs
      $jobList="";
      $sqlJob="select * from adjob where adId=".$adId;
      $resJob = mysqli_query(conn(),$sqlJob);
      $resCntJob = mysqli_num_rows($resJob);
      if ($resCntJob>0) {
        while($rowJob = mysqli_fetch_array($resJob)) {
          if ($jobList=="") { $jobList=$rowJob["job"].">".$rowJob["price"]; } else { $jobList=$jobList.">>".$rowJob["job"].">".$rowJob["price"]; }
        }
      }

      // get bookmark
      $bookmark="";
      if (isset($_SESSION["usrId"])!="") {
        $bookmark=getData("select adId from bookmark where usrId=".$_SESSION["usrId"]." and adId=".$adId,"adId");
      }

      if ($data!="") {
        $data=$data."|*|".$adId."|^|".$adTitle."|^|".$adDesc."|^|".$imgName."|^|".$usrName."|^|".$usrPhone."|^|".$jobList."|^|".$bookmark."|^|".$usrChkSSM;
      } else {
        $data=$adId."|^|".$adTitle."|^|".$adDesc."|^|".$imgName."|^|".$usrName."|^|".$usrPhone."|^|".$jobList."|^|".$bookmark."|^|".$usrChkSSM;
      }
    }
  }

  //echo $title."^".$servType."^".$state."^".$area;
  //echo $sql."<br>".$data;
  echo $pgDet."|~|".$data."|~|".$sql;
}


























?>
