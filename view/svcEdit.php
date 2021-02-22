<?php include("../process/svcProcess.php"); ?>
<script language="javascript" src="js/svcEdit.js"></script>

<script language="javascript">

  $(document).ready(function(){
    initForm();
    $("#quantity").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
        return false;
    }
   });
  });

</script>

<style>

* {
  letter-spacing: 0.5px;
}

.drop {
  float: left;
  width: 50px;
  height: 50px;
  border:1px gray solid;
  display: inline;
  position: absolute;
  padding: 52px 0 0 0;
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  z-index: 2;
}
.drop2 {
  float: left;
  width: 50px;
  height: 54px;
  border:1px gray solid;
  position: relative;
  display: inline;
  padding: 0 0 0 0;
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  z-index: 1;
}
.float {
  float: left;
  padding-left: 5px;
  padding-bottom: 5px;
}
#editTable {
  border: 0px rgb(200,200,200) solid;
  margin-bottom: 10px;
  margin-top: 50px;
  padding: 0px;
  border-radius: 5px;
}

#adEditTitle {
  position: absolute;
  border: 1px rgb(200,200,200) solid;
  margin-bottom: 20px;
  width: 100%;
  height: 40px;
  padding: 0px;
  margin-left: -20px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(188,252,228,1) 89%);
  display: table;
  border-radius: 5px 5px 0px 0px;
}

#adEditTitleText {
  display: table-cell;
  vertical-align: middle;
  font-weight: 600;
  font-size: 15px;
  padding-left: 20px;
}

#editTable td.editTitle {
  font-size: 13px;
  font-weight: 400;
  vertical-align: top;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 5px;
  color: #555;
  text-align: left;
  width: 30%;
}
#editTable td.editValue {
  font-size: 13px;
  font-weight: 300;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 5px;
  padding-right: 0px;
  color: #555;
  text-align: left;
  width: 70%;
}

.bgColored {
  background-color: #F5F5F5;
  border-radius: 55px;
}

.inputValue {
  height: 30px;
  letter-spacing: 0.5px;
  padding-left: 10px;
  border: 1px lightgray solid;
  border-radius: 5px;
  outline: none;
  width: 90%;
}

.imgValue {
  height: 30px;
  letter-spacing: 0.5px;
  padding-left: 10px;
  border: 1px lightgray solid;
  border-radius: 5px;
  outline: none;
}

.selectValue {
  height: 30px;
  letter-spacing: 0.5px;
  border: 1px lightgray solid;
  border-radius: 5px;
  outline: none;
  width: 45%;
}

.textAreaValue {
  letter-spacing: 0.5px;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 5px;
  padding-bottom: 5px;
  border: 1px lightgray solid;
  border-radius: 5px;
  outline: none;
  width: 90%;
}

.chkValue {
  font-size: 13px;
  font-weight: 300;
  border: 0px rgb(230,230,230) solid;
  padding-top: 0px;
  padding-bottom: 5px;
  padding-left: 5px;
  padding-right: 5px;
  color: #555;
  text-align: left;
}

#timeStart {
  width: 25%;
}

#timeEnd {
  width: 25%;
}

#usrPassword {
  width: 45%;
}

#usrPassword2 {
  width: 46%;
}

#usrSSM {
  width: 30%;
}

#usrCompany {
  width: 61%;
}

input {
  padding-left: 5px;
}

textarea {
  padding-left: 5px;
}

select {
  padding-left: 5px;
}

@media screen and (max-width: 850px) {
  #timeStart {
    width: 45%;
  }
  #timeEnd {
    width: 45%;
  }
  #usrPassword {
    width: 43%;
  }
  #usrPassword2 {
    width: 44%;
  }
  #usrSSM {
    width: 30%;
  }
  #usrCompany {
    width: 57%;
  }

  #editTable td.editTitle {
    font-size: 13px;
    font-weight: 400;
    vertical-align: top;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 5px;
    color: #555;
    text-align: left;
    width: 30%;
  }
  #editTable td.editValue {
    font-size: 13px;
    font-weight: 300;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 5px;
    padding-right: 0px;
    color: #555;
    text-align: left;
    width: 70%;
  }
  .inputValue {
    height: 30px;
    letter-spacing: 0.5px;
    padding-left: 10px;
    border: 1px lightgray solid;
    border-radius: 5px;
    outline: none;
    width: 50%;
  }

  .imgValue {
    height: 30px;
    letter-spacing: 0.5px;
    padding-left: 10px;
    border: 1px lightgray solid;
    border-radius: 5px;
    outline: none;
  }

  .selectValue {
    height: 30px;
    letter-spacing: 0.5px;
    border: 1px lightgray solid;
    border-radius: 5px;
    outline: none;
    width: 25%;
  }

  .textAreaValue {
    letter-spacing: 0.5px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    border: 1px lightgray solid;
    border-radius: 5px;
    outline: none;
    width: 50%;
  }

  .chkValue {
    font-size: 13px;
    font-weight: 300;
    border: 0px rgb(230,230,230) solid;
    padding-top: 0px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
    color: #555;
    text-align: left;
  }

  #adEditTitle {
    position: absolute;
    margin-left: 0px;
    width: 100%;
    border: 0px red solid;
  }
}

</style>

<div id="adEditStatus" class="mdl-card mdl-shadow--2dp"></div>

<div id="adEditTitle" class="mdl-card mdl-shadow--2dp"><div id="adEditTitleText"></div></div>

<table id="editTable" border="0" style="width:100%;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="editValue" style="display:none;"><input id="adId"></td>
  </tr>
  <tr class="bgColored">
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Title","Tajuk")?></td>
    <td class="editValue"><input id="adTitle" class="inputValue" autocomplete="off"></td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Note","Nota")?></td>
    <td class="editValue"><textarea id="adDesc" rows="3"  class="textAreaValue"></textarea></td>
  </tr>
  <tr class="bgColored">
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Category","Kategori")?></td>
    <td class="editValue">
      <select id="servTypeEdit" class="selectValue"></select>
    </td>
  </tr>
  <tr>
    <td class="editTitle">
    <?=lang($_SESSION["currLang"],"Area","Kawasan")?>
      <button id="areaButton" onclick="addArea();" class="smallButton" style="float:right;height:23px;">+</button>
    </td>
    <td class="editValue">
      <!--input id="areaCnt"></input-->
      <div id="loc1">
        <select id="state1" onchange="loadAreaEdit(this,1)" class="selectValue"></select>
        <select id="area1" class="selectValue"><option value=""><?=lang($_SESSION["currLang"],"Select City","Pilih Bandar")?></option></select>
      </div>
      <div id="areaList"></div>
    </td>
  </tr>
  <tr class="bgColored">
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Pictures","Gambar")?></td>
    <td class="editValue">
      <form id="imgForm" method="post" action="../process/uploadImage.php" enctype="multipart/form-data">
        <div class="float">
          <input class="drop imgValue" type="file" id="file1" value="" title="Click to upload images..">
          <img id="img1" class="drop2" style="border:0px red solid">
        </div>
        <div class="float">
          <input class="drop imgValue" type="file" id="file2" value="" title="Click to upload images..">
          <img id="img2" class="drop2" style="border:0px red solid">
        </div>
        <div class="float">
          <input class="drop imgValue" type="file" id="file3" value="" title="Click to upload images..">
          <img id="img3" class="drop2" style="border:0px red solid">
        </div>
        <div class="float">
          <input class="drop imgValue" type="file" id="file4" value="" title="Click to upload images..">
          <img id="img4" class="drop2" style="border:0px red solid">
        </div>
        <div class="float">
          <input class="drop imgValue" type="file" id="file5" value="" title="Click to upload images..">
          <img id="img5" class="drop2" style="border:0px red solid">
        </div>
        <!--input type="button" id="upload" value="upload" onclick="uploadFiles()" /-->
      </form>
    </td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Quantity","Bilangan")?></td>
    <td class="editValue"><input id="quantity" class="inputValue" placeholder="<?=lang($_SESSION["currLang"],"Quantity","Bilangan")?>"></td>
  </tr>
  <tr class="bgColored">
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Condition","Keadaan")?></td>
    <td class="editValue">
    <div class="chkValue" style="float:left;"><input type="radio" id="newCond" name="condition" value="new" checked onclick="updQuality(1)">&nbsp;<?=lang($_SESSION["currLang"],"New","Baru")?></div>
    <div class="chkValue" style="float:left;"><input type="radio" id="usedCond" name="condition" value="used" onclick="updQuality(2)">&nbsp;<?=lang($_SESSION["currLang"],"Used","Terpakai")?></div>
    </td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Quality","Kualiti")?></td>
    <td class="editValue">
    <select id="quality" class="selectValue" disabled>
      <?php
        for ($cond=10;$cond>=1;$cond--) {
          echo "<option value='".$cond."'>".$cond."/10</option>";
        }
      ?>
      </select>
    </td>
  </tr>
  <!--tr>
    <td class="editTitle">
      Services
      <button id="jobButton" onclick="addJob();" class="smallButton" style="float:right;height:23px;">+</button>
    </td>
    <td class="editValue" style="vertical-align:top;">
      <div id="serv1">
        <input id="job1" style="width:45%;" placeholder="Service">
        <input id="price1" style="width:30%;" placeholder="Price">
      </div>
      <div id="jobList"></div>
    </td>
  </tr-->
  <tr class="bgColored">
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Pickup Days","Hari Pengambilan")?></td>
    <td class="editValue">
      <div id="days">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkAllDays()" id="d0">&nbsp;<?=lang($_SESSION["currLang"],"All Day","Setiap Hari")?></div></td>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d1">&nbsp;<?=lang($_SESSION["currLang"],"Monday","Isnin")?></div></td>
          </tr>
          <tr>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d2">&nbsp;<?=lang($_SESSION["currLang"],"Tuesday","Selasa")?></div></td>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d3">&nbsp;<?=lang($_SESSION["currLang"],"Wednesday","Rabu")?></div></td>
          </tr>
          <tr>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d4">&nbsp;<?=lang($_SESSION["currLang"],"Thursday","Khamis")?></div></td>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d5">&nbsp;<?=lang($_SESSION["currLang"],"Friday","Jumaat")?></div></td>
          </tr>
          <tr>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d6">&nbsp;<?=lang($_SESSION["currLang"],"Saturday","Sabtu")?></div></td>
            <td><div class="chkValue" style="float:left;"><input type="checkbox" onclick="checkOtherDays()" id="d7">&nbsp;<?=lang($_SESSION["currLang"],"Sunday","Ahad")?></div></td>
          </tr>
      </table>
      </div>
    </td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Pickup Time","Masa Pengambilan")?></td>
    <td class="editValue">
      <select id="timeStart" class="selectValue"><option value="0"><?=lang($_SESSION["currLang"],"Start","Mula")?></option></select>
      <select id="timeEnd" class="selectValue"><option value="0"><?=lang($_SESSION["currLang"],"End","Akhir")?></option></select>
    </td>
  </tr>
</table>


<table id="editTable" border="0" style="width:100%;border:1px lightgray solid;border-radius:5px;padding:10px;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="editValue" style="display:none;"><input id="usrId" class="inputValue"></td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Email","Emel")?></td>
    <td class="editValue"><input id="usrEmail" onchange="checkUsr(this)" class="inputValue" placeholder="Email"></td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Password","Katalaluan")?></td>
    <td class="editValue">
      <input type="password" id="usrPassword" class="inputValue" placeholder="<?=lang($_SESSION["currLang"],"Password","Katalaluan")?>">
      <input type="password" id="usrPassword2" class="inputValue" placeholder="<?=lang($_SESSION["currLang"],"Repeat password","Ulang katalaluan")?>">
    </td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Name","Nama")?></td>
    <td class="editValue"><input id="usrName" class="inputValue" placeholder="<?=lang($_SESSION["currLang"],"Full name","Nama penuh")?>"></td>
  </tr>
  <tr>
    <td class="editTitle"><?=lang($_SESSION["currLang"],"Phone Number","Nombor Telefon")?></td>
    <td class="editValue"><input id="usrPhone" maxlength="11" class="inputValue" placeholder="<?=lang($_SESSION["currLang"],"Phone Number","Nombor Telefon")?>"></td>
  </tr>

  <!--tr>
    <td class="editTitle">SSM/Company</td>
    <td class="editValue">
      <input id="usrSSM" placeholder="SSM No">
      <input id="usrCompany" placeholder="Company Name">
    </td>
  </tr-->

</table>
<div style="position:relative;text-align:right;">
  <button id="cancelAd" onclick="if (confirm('<?=lang($_SESSION['currLang'],'Are you sure?','Anda pasti?')?>')) { hideAdEdit(),hideOverlay(); }" class="button"><?=lang($_SESSION["currLang"],"Cancel","Batal")?></button>
  <button id="clearAd" onclick="if (confirm('<?=lang($_SESSION['currLang'],'Are you sure?','Anda pasti?')?>')) { clearAdEdit(); }" class="button"><?=lang($_SESSION["currLang"],"Clear","Padam")?></button>
  <button id="saveAd" onclick="saveAd()" class="button"><?=lang($_SESSION["currLang"],"Save","Simpan")?></button>
  <!--button id="test" onclick="test()">Test</button-->
</div>
