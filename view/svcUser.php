<?php session_start(); ?>
<script language="javascript" src="js/svcUser.js"></script>

<style>

#loginPanel {
  overflow: hidden;
  display: table-cell;
  vertical-align: middle;
  position: relative;
  border: 0px red solid;
  width: 100%;
  height: 100%;
  top: 0px;
  margin: auto;
}

@media screen and (max-width: 850px) {
  #loginPanel {
    width: 100%;
  }

  #usrPanel {
    width: 100%;
  }

  #usrDetails {
    width:50%;
  }

  #usrFavListTitle {
    font-size: 10px;
  }

  #usrAdListTitle {
    font-size: 10px;
  }
}

#usrPanel {
  display: none;
  width: 100%;
  margin-right: 0px;
  overflow: hidden;
  position: relative;
  border: 0x red solid;
}

#loginTable {
  border: 0px rgb(200,200,200) solid;
  margin-bottom: 10px;
  width: 100%;
  padding: 10px;
  position: relative;
  top: -1px;
  z-index: 1;
}

#loginTable td.loginTitle {
  font-size: 13px;
  font-weight: 400;
  vertical-align: top;
  border-bottom: 0px rgb(230,230,230) solid;
  padding-top: 5px;
  padding-bottom: 5px;
  color: #555;
  text-align: left;
}
#loginTable td.loginValue {
  font-size: 13px;
  font-weight: 300;
  border-bottom: 0px rgb(230,230,230) solid;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 5px;
  padding-right: 5px;
  color: #555;
  text-align: center;
}

#loginImg {
  width: 80px;
  height: 80px;
  box-sizing: border-box;
  border-radius: 50% 50%;
  box-shadow: black 0px 0px 3px;
}

#log {
  font-size: 13px;
  font-weight: 400;
  float: left;
  border: 0px rgb(200,200,200) solid;
  padding-top: 5px;
  padding: 3px;
  cursor: pointer;
  display: block;
  width: 80px;
  height: 20px;
  text-align: center;
  position: relative;
  background: white;
  z-index: 2;
  top: -26px;
  left: 0px;
}

#reg {
  font-size: 13px;
  font-weight: 400;
  float: left;
  border: 0px rgb(200,200,200) solid;
  padding-top: 5px;
  padding: 3px;
  cursor: pointer;
  display: block;
  width: 80px;
  top: -26px;
  text-align: center;
  position: relative;
  z-index: 2;
  background: rgb(220,220,220);
}

.regItem {
  display: none;
  width: 100%;
}

#logButton {
  display: table;
  text-align: right;
  width: 100%;
}

#regButton {
  display: none;
  text-align: right;
  width: 100%;
}

.usrAdImg {
  width: 50px;
  height: 50px;
  box-sizing: border-box;
  border-radius: 5px;
  /*box-shadow: black 0px 0px 3px;*/
}

.usrAdRow {
  padding: 5px;
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 0px;
  cursor: pointer;
  overflow: hidden;
  height: 40px;
  border-bottom: 1px rgb(238,238,238) solid;
}

.usrAdRow2 {
  padding: 5px;
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 0px;
  cursor: pointer;
  overflow: hidden;
  height: 65px;
  border-bottom: 1px rgb(238,238,238) solid;
}

.usrAdRow:hover {
  background-color: rgb(240,240,240);
}

.usrAdRow2:hover {
  background-color: rgb(240,240,240);
}

#usrDetails {
  width: 100%;
  height: 100px;
  position: relative;
  top: 0px;
  left: 0px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(188,252,228,1) 89%);
  border: 0px rgb(200,200,200) solid;
  border: 0px red solid;
  display: table;
  z-index: 1;
  padding: 10px;
}

.loginDetails {
  width: 100%;
  height: 100px;
  position: relative;
  top: 0px;
  left: 0px;
  background-color: #29B6F6;
  border: 0px rgb(200,200,200) solid;
  border: 0px red solid;
  /*box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);*/
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(188,252,228,1) 89%);
  display: table;
  z-index: 1;
  padding: 10px;
}

#usrList {
  width: 99%;
  height: calc(100% - 170px);
  position: relative;
  overflow-y: auto;
  overflow-x: hidden;
  top: 10px;
  left: 0px;
  border: 0px red solid;
}

.usrMainImg {
  width: 70px;
  height: 70px;
  font-size:70px;
  box-sizing: border-box;
  border-radius: 5px;
  box-shadow: black 0px 0px 3px;
  position: relative;
  float: left;
  top: 10px;
  left: 0px;
  background-color: rgba(255,255,255, 0.5);
  z-index: 2;
  margin: 10px;
}

#loginUsrImg {
  border: 0px blue solid;
}

.usrMainName {
  width: 67%;
  height: 60px;
  border: 0px blue solid;
  position: absolute;
  margin-top: 30px;
  margin-left: 110px;
  overflow: hidden;
}

.usrMainLogout {
  border: 0px red solid;
  right: 12px;
  top: 70px;
  height: 35px;
  width: 35px;
  font-size: 20px;
  padding: 0px;
  outline: none;
  cursor: pointer;
  position: absolute;
  border-radius: 5px;
  display: table;
  vertical-align: middle;
  text-align: center;
  z-index: 99999999999;
  background-color: rgba(255,255,255, 0.5);
}

.activeCnt {
  border: 0px #FAFAFA solid;
  top: 45px;
  left: 80px;
  height: 35px;
  width: 60px;
  font-size: 18;
  padding: 0px;
  outline: none;
  position: absolute;
  border-radius: 5px;
  display: table;
  vertical-align: middle;
  text-align: center;
  background-color: rgba(255,255,255, 0.5);
}

.favCnt {
  border: 0px #FAFAFA solid;
  top: 45px;
  left: 0px;
  height: 35px;
  width: 60px;
  font-size: 18;
  padding: 0px;
  outline: none;
  position: absolute;
  border-radius: 5px;
  display: table;
  vertical-align: middle;
  text-align: center;
  background-color: rgba(255,255,255, 0.5);
}

#usrPanelCloseButton {
  width: 20px;
  border: 0px red solid;
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 100;
}

@media screen and (max-width: 850px) {
  .usrMainName {
    width: 60%;
    border: 0px red solid;
    margin-top: 30px;
    margin-left: 90px;
  }

  .usrMainLogout {
    font-size: 18px;
  }

  #usrPanelCloseButton {
    
  }
}

.textTitle {
  font-size: 14px;
  font-weight: 400;
  vertical-align: top;
  padding-left: 10px;
  padding-top: 10px;
  padding-bottom: 10px;
  color: #555;
  text-align: left;
}

.textNormal {
  font-size: 13px;
  font-weight: 300;
  vertical-align: middle;
  padding-left: 10px;
  color: #555;
  text-align: left;
}

#usrAdListCont {
  display: none;
  position: absolute;
  font-size: 14px;
  font-weight: 400;
  vertical-align: top;
  color: #555;
  text-align: left;
  padding: 10px;
}

#usrAdList {
  width: 100%;
}

#usrFavListCont {
  position: absolute;
  font-size: 14px;
  font-weight: 400;
  vertical-align: top;
  color: #555;
  text-align: left;
  padding: 10px;
}
#usrFavList {
  width: 100%;
}

#usrFavListTitle {
  width: 40%;
  font-size: 15px;
  float: left;
  cursor: pointer;
  margin-top: 10px;
  margin-left: 10px;
  padding: 5px;
  padding-right: 10px;
  border-radius: 5px;
  box-shadow: black 0px 0px 3px;
  background-color: #B2DFDB;
}

#usrFavListTitle:hover {
  background-color: lightgray;
}

#usrAdListTitle {
  width: 40%;
  font-size: 15px;
  float: left;
  cursor: pointer;
  margin-top: 10px;
  margin-left: 15px;
  padding: 5px;
  padding-left: 10px;
  border-radius: 5px;
  box-shadow: black 0px 0px 3px;
  background-color: #FFFFFF;
}

#usrAdListTitle:hover {
  background-color: lightgray;
}

</style>
<!--unset($_SESSION["usrId"]);-->

<div id="usrPanelStatus" class="mdl-card mdl-shadow--2dp"></div>

<!--00ACC1-->

<div id="usrPanel">
  <div id="usrDetails">
    <div id="loginUsrImg"><span class="material-icons-outlined usrMainImg">face</span></div>
    <div id="loginUsrName" class="usrMainName"></div>
  </div>

  <div id="usrFavListTitle" onclick="showHideFavOrAd('usrFavList')"></div>
  <div id="usrAdListTitle" onclick="showHideFavOrAd('usrAdList')"></div>

  <div id="usrList">

    <div id="usrFavListCont">
      <div id="usrFavList"></div>
    </div>

    <div id="usrAdListCont">
      <!--img src="img/addblack.png" width="30px" onclick="showAdEdit('','showUsrPanel()')" style="cursor:pointer;"-->
      <div id="usrAdList"></div>
    </div>
  </div>

</div>








<!--login-->

<div id="loginPanel">
  <!--div id="loginUsrImg"><img src="img/account96b.png" class="usrMainImg"></div-->
  <div id="loginDetails" class="loginDetails">
    <div id="loginUsrName"></div>
  </div>
  <span id="log" onclick="logTab()">Login</span>
  <span id="reg" onclick="regTab()">Register</span>

  <div style="border:0px red solid;">
    <table id="loginTable" cellpadding="0" cellspacing="0" border="0" style="width:80%;" align="center">
      <!--tr><td class="loginTitle" style="width:100%;text-align:center;"><img id="loginImg" src="img/account96b.png"></td></tr-->

      <tr><td class="loginTitle">Email</td></tr>
        <tr><td class="loginValue"><input id="loginEmail" type="text" style="width:100%;padding-left:5px;" class="inputValue"></td></tr>
      <tr><td class="loginTitle">Password</td></tr>
        <tr><td class="loginValue"><input id="loginPassword" type="password" style="width:100%;padding-left:5px;" class="inputValue"></td></tr>

        <tr class="regItem"><td class="loginTitle">Repeat Password</td></tr>
        <tr class="regItem"><td class="loginValue"><input id="loginPassword2" type="password" style="width:100%;padding-left:5px;" class="inputValue"></td></tr>

      <tr class="regItem"><td class="loginTitle">Name</td></tr>
        <tr class="regItem"><td class="loginValue"><input id="loginName" type="text" style="width:100%;padding-left:5px;" class="inputValue"></td></tr>


      <tr id="logButton"><td class="loginTitle" style="text-align:right;width:100%;height:40px;vertical-align:middle;"><button id="loginButton" onclick="login()" class="button">Login</button></td></tr>
      <tr id="regButton"><td class="loginTitle" style="text-align:right;width:100%;height:40px;vertical-align:middle;"><button id="registerButton" onclick="register()" class="button">Register</button></td></tr>
    </table>
  </div>
</div>
