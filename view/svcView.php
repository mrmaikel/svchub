<?php include("../process/svcProcess.php"); ?>
<script language="javascript" src="js/svcView.js"></script>

<script language="javascript">

  $(document).ready(function(){
    initView();
  });

</script>

<style>


#adView {
  border: 1px lightgray solid;
  width: 100%;
  margin: auto;
  cursor: default;
  padding: 20px;
  background-color: white;
  overflow: hidden;
  min-width: 100%;
  max-width: 100%;
  display: block;
  text-align:left;
  vertical-align: top;
  border-radius: 5px;
}
#imgCont {
  position: relative;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: top;
  zoom: 1;
  *display: inline;
  width: 55%;
  min-width: 55%;
  max-width: 100%;
  border: 0px red solid;
  margin-bottom: 20px;
  overflow: hidden;
  text-align: center;
  margin: auto;
}
#adDescCont {
  float: right;
  position: relative;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: top;
  zoom: 1;
  *display: inline;
  width: 43%;
  min-width: 43%;
  max-width: 43%;
  border: 0px red solid;
  margin-bottom: 20px;
}
#adCommCont {
  position: relative;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: top;
  zoom: 1;
  *display: inline;
  width: 49%;
  min-width: 49%;
  max-width: 100%;
  border: 0px red solid;
  margin-bottom: 20px;
}

@media screen and (max-width: 850px) {
  #adView {
    width: 100%;
  }
  #imgCont {
    width: 100%;
  }
  #adDescCont {
    width: 100%;
    max-width: 100%;
  }
  #adCommCont{
    width: 100%;
  }
}

#imgList {
  display: block;
  border: 0px green solid;
  width: 97%;
  max-width: 97%;
  height: 70px;
  text-align: center;
  border-top: 1px rgb(200,200,200) solid;
  overflow: hidden;
  padding: 5px;
  padding-top: 10px;
  margin-top: 10px;
}
#img {
  cursor: pointer;
  width: 50px;
  margin: 1%;
  box-sizing: border-box;
  border-radius: 5px;
  box-shadow: black 0px 0px 2px;
}
#img:hover {
  border: 1px gray solid;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 2, 0.2), 0 3px 1px -2px rgba(0, 0, 2, 0.2), 0 1px 5px 0 rgba(0, 0, 2, 0.12);
}
#imgSel {
  border: 0px gray solid;
  border-radius: 5px;
  width: 100%;
}
#imgMainCont {
  display: inline-block;
  border: 0px red solid;
  width: 97%;
  max-width: 97%;
  height: 300px;
  min-height: 300px;
  max-height: 300px;
  overflow: hidden;
  padding: 5px;
  vertical-align: middle;
  text-align: center;
}
#imgMain {
  border: 0px blue solid;
  width: 100%;
  max-width: 100%;
  height: 100%;
  min-height: 100%;
  max-height: 100%;
  text-align: center;
  display: block;
  overflow: hidden;
}
#adMainTitle {
  font-weight: 500;
  max-height: 38px;
  width: 86%;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 50px;
  margin-right: 40px;
  border: 0px blue solid;
  overflow: hidden;
  white-space: normal;
  float: left;
}

.dispTitleHeader {
  height: 50px;
  max-height: 100px;
  max-width: 180px;
  background-color: #B2DFDB;
  border: 0px #1DE9B6 solid;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(188,252,228,1) 89%);
  white-space: wrap;
}

#adBookmark {
  border: 0px red solid;
  position: absolute;
  top: 10px;
  left: 10px;
  width: 40px;
  height: 40px;
  padding-top: 3px;
}

#adViewDesc {
  /*border: 1px #00C853 solid;*/
  border: 0px rgb(200,200,200) solid;
  border-radius: 5px;
  width: 100%;
  padding-left: 0px;
  padding-right: 0px;
  padding-top: 0px;
  padding-bottom: 0px;
  min-width: 100%;
}
#adCommDesc {
  /*border: 1px #00C853 solid;*/
  border: 1px rgb(200,200,200) solid;
  width: 100%;
  padding-left: 0%;
  padding-right: 0%;
  padding-top: 0%;
  padding-bottom: 0%;
  min-width: 100%;
}
.dispTitle {
  width: 40%;
  font-size: 13px;
  font-weight: 500;
  vertical-align: top;
  border-bottom: 1px rgb(230,230,230) solid;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 10px;
  color: #555;
}
.dispValue {
  width: 60%;
  font-size: 13px;
  font-weight: 300;
  border-bottom: 1px rgb(230,230,230) solid;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 10px;
  color: #555;
}
.dispValue2 {
  display: none;
  font-size: 13px;
  font-weight: 300;
  border-bottom: 1px rgb(230,230,230) solid;
  padding-top: 0px;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 10px;
  color: #555;
}

#areaTbl {
  width: 100%;
}
#jobTbl {
  width: 100%;
}

@media screen and (max-width: 850px) {
  #imgMainCont {
    height: 200px;
    min-height: 200px;
    max-height: 200px;
  }

  .dispTitle {
    width: 100%;
    border-bottom: 0px rgb(230,230,230) solid;
  }
  .dispTitleMain {
    width: 100%;
  }
  .dispValue {
    display: none;
  }
  .dispValueMain {
    display: none;
  }
  .dispValue2 {
    display: block;
    border-bottom: 1px rgb(230,230,230) solid;
  }
  #areaTbl {
    width: 100%;
  }
  #jobTbl {
    width: 100%;
  }
}

</style>

<div id="adViewStatus" style="position:absolute;top:100px;"></div>

<div id="adView" class="mdl-card mdl-shadow--2dp">
  <!--div id="imgCont">a</div>
  <div id="adDescCont" style="height:100px;">b</div>
  <div id="adCommCont">c</div>
  <div style="clear: both;"></div-->

  <div id="imgCont">
    <div id="imgMainCont"><div id="imgMain"></div></div>
    <div id="imgList"></div>
  </div>

  <div id="adDescCont">
    <div id="adViewDesc">
      <table cellspacing="0" cellpadding="0" border="0" style="width:100%;overflow:hidden;border:1px rgb(200,200,200) solid;border-radius:5px;">
        <!--tr><td class="dispTitleMain"></td><td class="dispValueMain"></td></tr-->
        <tr><td colspan="2" class="dispTitleHeader">
          <div id="adMainTitle"></div>
          <div id="adBookmark"></div>
        </td></tr>
        <!--tr><td class="dispTitle">Company</td><td class="dispValue"><span id="companyDet"></span></td></tr>
          <tr class="dispValue2"><td><span id="companyDet2"></span></td></tr-->
        <tr><td class="dispTitle" style="width:50px;"><?=lang($_SESSION["currLang"],"Name","Nama")?></td><td class="dispValue"><span id="usrNameCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="usrNameCont2"></span></td></tr>
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Phone Number","Nombor Telefon")?></td><td class="dispValue"><span id="usrPhoneCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="usrPhoneCont2"></span></td></tr>
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Category","Kategori")?></td><td class="dispValue"><span id="servTypeCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="servTypeCont2"></span></td></tr>
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Area","Kawasan")?></td><td class="dispValue"><span id="areaCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="areaCont2"></span></td></tr>

        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Quantity","Kuantiti")?></td><td class="dispValue"><span id="quantityCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="quantityCont2"></span></td></tr>
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Condition","Keadaan")?></td><td class="dispValue"><span id="conditionCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="conditionCont2"></span></td></tr>
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Quality","Kualiti")?></td><td class="dispValue"><span id="qualityCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="qualityCont2"></span></td></tr>


        <!--tr><td class="dispTitle">Services Offered</td><td class="dispValue"><span id="jobCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="jobCont2"></span></td></tr-->
        <tr><td class="dispTitle"><?=lang($_SESSION["currLang"],"Pickup Time","Masa Pengambilan")?></td><td class="dispValue"><span id="daysTimeCont"></span></td></tr>
          <tr class="dispValue2"><td><span id="daysTimeCont2"></span></td></tr>
        <tr><td colspan="2" class="dispTitle"><?=lang($_SESSION["currLang"],"Notes","Nota")?></td></tr>
        <tr><td colspan="2" class="dispValue" style="height:100px;vertical-align:top;"><span id="descCont"></span></td></tr>
          <tr class="dispValue2" style="height:100px;vertical-align:top;"><td><span id="descCont2"></span></td></tr>
        <tr>
          <td colspan="2" style="text-align:right; padding:10px;">
            <button onclick="hideOverlay(),hideAdView()" class="button"><?=lang($_SESSION["currLang"],"Close","Tutup")?></button>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <!--div id="adCommCont">
    <div id="adCommDesc">
      <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
        <tr><td colspan="2" style="background-color:#4FC3F7;border:0px #1DE9B6 solid;"><div style="font-weight:500;height:20px;padding-top:10px;padding-bottom:10px;padding-left: 10px;">Comment and Review</div></td></tr>
        <tr><td width="30%" class="dispTitle"></td><td class="dispValue"><span id="usrNameCont"></span></td></tr>
      </table>
    </div>
  </div-->

  <div style="clear: both;"></div>

</div>
