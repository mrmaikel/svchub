<?php
include("svcProcess.php");

if (isset($_GET['func'])) { $func=($_GET['func']); }
if (isset($_GET['attr'])) { $attr=($_GET['attr']); }

if (isset($func)) { $func($attr); }

function populate() {

  $tbl="ad,adarea,adimg,usr,adjob,bookmark";
  $adstate="1,2,3,4,5";
  /*

  not yet done

  $sql="insert into ad ";
  $res=mysqli_query(conn(),$del);

  $tblArr=explode(",",$tbl);
  foreach ($tblArr as $key=>$value) {
    $del="delete from $value";
    $res=mysqli_query(conn(),$del);
    $ai="alter table $value auto_increment = 1";
    $resAi=mysqli_query(conn(),$ai);
    if ($res==1) {
      echo ($key+1).") Deleted data in table $value<br>";
    } else {
      echo ($key+1).") Error clearing data in table $value ($del)(".mysqli_error().")<br>";
    }
  }
  */
}

?>

<script language="javascript" src="../js/svcAjaxscript.js"></script>

<script language="javascript">

function populate() {
  if (confirm("Are you sure?")) {
    AjaxGo2("adPopulateStatus","populate","","","../process/svcPopulate");
  }
}

</script>

<div id="adPopulateStatus">
  <button onclick="populate()">Populate</button>
</div>
