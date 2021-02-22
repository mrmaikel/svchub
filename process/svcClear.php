<?php
include("svcProcess.php");

if (isset($_GET['func'])) { $func=($_GET['func']); }
if (isset($_GET['attr'])) { $attr=($_GET['attr']); }

if (isset($func)) { $func($attr); }

function clearAll() {

  $tbl="ad,adarea,adimg,usr,adjob,bookmark";

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

  $dir = "../adData";
  if (file_exists($dir)) { echo "<br>Deleting adData files..<br>"; }
  rmdir_recursive($dir);
}

function rmdir_recursive($dir) {
  if (file_exists($dir)) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) {
          rmdir_recursive("$dir/$file");
          echo "Deleted folder $dir$file<br>";
        } else {
          unlink("$dir/$file");
          echo "Deleted file $dir$file<br>";
        }
    }
    rmdir($dir);
  }
}

?>

<script language="javascript" src="../js/svcAjaxscript.js"></script>

<script language="javascript">

function clearAll() {
  if (confirm("Are you sure?")) {
    AjaxGo2("adClearStatus","clearAll","","","../process/svcClear");
  }
}

</script>

<div id="adClearStatus">
  <button onclick="clearAll()">Clear</button>
</div>
