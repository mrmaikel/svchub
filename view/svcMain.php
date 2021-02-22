<?php include("../process/svcProcess.php"); ?>
<script language="javascript" src="js/svcMain.js"></script>

<!--
colour
#4FC3F7 - original blue
-->

<style>
.mdl-layout__drawer-button {
  /*background: url("../img/setting48b.png");
  background-size: 20px 20px;
  background-repeat: no-repeat;*/
}
@media screen and (max-width: 850px) {
  .mdl-layout__drawer-button {
    /*background: url("../img/setting48b.png");
    background-size: 30px 30px;
    background-repeat: no-repeat;*/
  }
}

#topBar {
  border: 0px red solid;
  position: absolute;
  width: 100%;
  left: 0px;
  height: 120px;
  margin-top: 0px;
  /*webkit-filter: opacity(0.5);
  filter: opacity(0.5);*/
  z-index: 98;
  /*background-color: #03A9F4;*/
  z-index: 8;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(188,252,228,1) 89%);
  
  /*blue white
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(183,229,250,1) 89%);
  */

  /*background: rgb(0,133,193);
  background: linear-gradient(180deg, rgba(0,133,193,1) 0%, rgba(73,255,204,1) 100%);*/
}

#adMainCont {
  width: 100%;
  margin-top: 120px;
  background-color: #F0F0F0;
  border: 0px red solid;
}

#viewCloseButton {
  position: absolute;
  display: block;
  top: 40px;
  margin-left: -9px;
  z-index: 100;
}

@media screen and (max-width: 850px) {
  #viewCloseButton {
    position: absolute;
    display: block;
    margin-top: 20px;
    margin-left: -8px;
    z-index: 100;
  }
}




#ribbon {
  width: 100px;
  height: 65px;
  margin: 0px auto 0;
  position: absolute;
  overflow: hidden;
  border: 0px red solid;
  left: 50px;
  z-index: 30;

}

#ribbon .inset {
  width: 200px;
  height: 55px;
  position: absolute;
  top: -50px;
  left: -50px;
  z-index: 5;

  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;

  background: rgba(0,0,0,0.3);

  box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.3);
  -moz-box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.3);
  -webkit-box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.3);
}

#ribbon .container {
  position: relative;
  width: 100px;
  height: 80px;
  overflow: hidden;
  margin: 0 auto;
  border-left: 1px solid #631a15;
  border-right: 1px solid #631a15;
  border: 0px blue solid;
}

#ribbon .base {
  height: 43px;
  width: 100px;
  background: #E65100;
  /*background: rgb(199,59,60);
  background: -webkit-linear-gradient(top,  rgba(199,59,60,1) 0%,rgba(184,32,31,1) 100%);
  background: linear-gradient(top,  rgba(199,59,60,1) 0%,rgba(184,32,31,1) 100%);
  background: -moz-linear-gradient(top,  rgba(199,59,60,1) 0%, rgba(184,32,31,1) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(199,59,60,1)), color-stop(100%,rgba(184,32,31,1)));
  background: -o-linear-gradient(top,  rgba(199,59,60,1) 0%,rgba(184,32,31,1) 100%);
  background: -ms-linear-gradient(top,  rgba(199,59,60,1) 0%,rgba(184,32,31,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c73b3c', endColorstr='#b8201f',GradientType=0 );*/

  position: relative;
  z-index: 2;
}

#ribbon .base:after {
  content: '';
  position: absolute;
  top: 0;
  width: 86px;
  left: 6px;
  height: 62px;
  border-left: 1px dashed #631a15;
  border-right: 1px dashed #631a15;
}

#ribbon .base:before {
  content: '';
  position: absolute;
  top: 0;
  width: 86px;
  left: 7px;
  height: 62px;
  border-left: 1px dashed #da5050;
  border-right: 1px dashed #da5050;
}

#ribbon .left_corner {
  width: 100px;
  height: 100px;
  /*background: #b8201f;*/
  background: #E65100;
  position: absolute;
  bottom: 20px;
  left: -50px;
  z-index: 1;

  box-shadow: 5px -35px 5px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: 0px -35px 5px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: 0px -35px 5px 2px rgba(0,0,0,0.3);

  -webkit-transform: rotate(65deg);
  -moz-transform: rotate(65deg);
  -ms-transform: rotate(65deg);
  -o-transform: rotate(65deg);
  transform: rotate(65deg);
}

#ribbon .right_corner {
  width: 100px;
  height: 100px;
  /*background: #b8201f;*/
  background: #E65100;
  position: absolute;
  bottom: 20px;
  right: -50px;
  z-index: 1;

  box-shadow: -35px 0px 5px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: -35px 0px 5px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: -35px 0px 5px 2px rgba(0,0,0,0.3);

  -webkit-transform: rotate(25deg);
  -moz-transform: rotate(25deg);
  -ms-transform: rotate(25deg);
  -o-transform: rotate(25deg);
  transform: rotate(25deg);
}


























#topLogo {
  position: absolute;
  top: 5px;
  left: 50px;
  z-index: 30;
  border: 0px red solid;
}

#topLogoImg {
  width: 100px;
  z-index: 3;
}

#topTextTop {
  position: absolute;
  border: 0px red solid;
  left: 100px;
  width: 350px;
  z-index: 30;
  letter-spacing: 0.5px;
  word-spacing: -10px;
  /*font: normal normal bold 45px/1 "open-sans", Helvetica, sans-serif;*/
  height: 43px;
  top: 10px;
  z-index: 7;
  overflow: hidden;
}

#topText {
  position: absolute;
  border: 0px red solid;
  top: 18px;
  left: 115px;
  z-index: 30;
  letter-spacing: 0.5px;
  word-spacing: 10px;
  font: normal normal bold 50px/1 "open-sans", Helvetica, sans-serif;
  z-index: 9;
}

#topTextImg {
  display: block;
  width: 300px;
  padding-left: 50px;
  z-index: 2;
}
#topTextImg2 {
  display: none;
}

.usrText {
  border:0px red solid;
  padding-left:10px;
  overflow:hidden;
  position:relative;
  left:0px;
  top:0px;
  display:inline-block;
  width:80%;
  height:20px;
  line-height:20px;
  text-align:center;
  float:left;
}

.usrLogo {
  width: 25px;
  position: relative;
  top: -12px;
  border: 0px red solid;
  padding: 0px;
  margin: 0px;
}

#usrButton {
  font-size: 13px;
  font-weight: 500;
  vertical-align: middle;
  position: absolute;
  top: 0px;
  right: 0px;
  width: 250px;
  height: 30px;
  line-height: 60px;
  text-align: right;
  cursor: pointer;
  border-left: 1px rgba(158,158,158, 0.20) solid;
  border-bottom: 1px rgba(158,158,158, 0.20) solid;
  z-index: 6;
  outline: none;
}

#usrButtonText {
  padding: 5px;
  padding-top: 5px;
  overflow: hidden;
  border: 0px red solid;
  height: 20px;
  vertical-align: middle;
  font-weight: 600;
  font-size: 12px;
}

#usrButton:hover {
  background-color: rgba(158,158,158, 0.20);
}

#addButton {
  position: absolute;
  top: 0px;
  right: 380px;
  width: 60px;
  height: 30px;
  line-height: 40px;
  border: 0px red solid;
  display: table;
  cursor: pointer;
  border-left: 1px rgba(158,158,158, 0.20) solid;
  border-bottom: 1px rgba(158,158,158, 0.20) solid;
  z-index: 6;
  outline: none;
}

#addButton:hover {
  background-color: rgba(158,158,158, 0.20);
}

#langButton {
  position: absolute;
  top: 0px;
  right: 250px;
  width: 130px;
  height: 30px;
  border: 0px red solid;
  display: table;
  text-align: center;
  font-weight: 600;
  font-size: 12px;
  cursor: pointer;
  border-left: 1px rgba(158,158,158, 0.20) solid;
  border-bottom: 1px rgba(158,158,158, 0.20) solid;
  z-index: 6;
  outline: none;
}

#langButtonText {
  display: table-cell;
  vertical-align: middle;
}

#langButton:hover {
  background-color: rgba(158,158,158, 0.20);
}

#addButtonText {
  display: table-cell;
  position: relative;
  vertical-align: middle;
  margin: auto;
  text-align: center;
  border: 0px red solid;
}

@media screen and (max-width: 850px) {

  #topBar {
    height: 120px;
  }

  #addButton {
    position: absolute;
    top: 0px;
    right: 110px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border: 0px red solid;
    display: table;
    cursor: pointer;
    border-left: 1px rgba(158,158,158, 0.20) solid;
    border-bottom: 1px rgba(158,158,158, 0.20) solid;
    z-index: 6;
  }

  #usrButtonxxxxx {
    font-size: 13px;
    font-weight: 500;
    vertical-align: middle;
    position: absolute;
    top: 0px;
    right: 0px;
    width: 110px;
    height: 40px;
    line-height: 40px;
    text-align: right;
    cursor: pointer;
    border-left: 1px rgba(158,158,158, 0.20) solid;
    z-index: 6;
  }

  .usrText {
    background-color: blue;
    display: none;
  }

  .usrLogo {
    width: 25px;
    font-size: 30px;
    position: relative;
    top: -4px;
    left: -5px;
    border: 0px red solid;
    padding: 0px;
    margin: 0px;
  }

  #usrButtonText {
    height: 30px;
    width: 30px;
    margin-top: 0px;
    padding: 0px;
    float: right;
    right: 0px;
    border: 0px red solid;
    display: absolute;
  }

  #topLogo {
    display: block;
    cursor: pointer;
    z-index: 9;
    border: 0px blue solid;
    height: 40px;
    width: 40px;
    left: 10px;
    top: 10px;
    overflow: hidden;
  }

  #topLogoImg {
    height: 40px;
    width: 40px;
    position: relative;
    pointer-events: none;
    border: 0px green solid;
  }

  #topTextTop {
    top: 5px;
    left: 0px;
    font: normal normal bold 30px/1 "open-sans", Helvetica, sans-serif;
    letter-spacing: 0.5px;
    word-spacing: -10px;
    width: 250px;
    height: 35px;
    border: 0px red solid;
    pointer-events: none;
  }

  #topText {
    top: 20px;
    left: 55px;
    font: normal normal bold 25px/1 "open-sans", Helvetica, sans-serif;
    border: 0px red solid;
    pointer-events: none;
  }

  #topTextImg {
    display: block;
    width: 160px;
    padding-left: 0px;
  }

  #topTextImg2 {
    display: block;
    width: 120px;
    height: 20px;
  }

  #usrButton {
    top: 15px;
    right: 5px;
    height: 30px;
    width: 30px;
    border: 1px rgba(158,158,158, 0.20) solid;
  }

  #langButton {
    top: 15px;
    right: 36px;
    width: 30px;
    max-width: 30px;
    height: 30px;    
    border: 1px rgba(158,158,158, 0.20) solid;
  }

  #addButton {
    top: 15px;
    right: 67px;
    width: 30px;
    max-width: 30px;
    height: 30px;
    border: 1px rgba(158,158,158, 0.20) solid;
  }

  .menu {
    display: block;
    top: 10px;
  }

  #ribbon {
    display: none;
  }
  #ribbon .container {
    height:90px;
  }
  #ribbon .base {
    height:52px;
  }
  #ribbon .left_corner {
    -webkit-transform: rotate(65deg);
    -moz-transform: rotate(65deg);
    -ms-transform: rotate(65deg);
    -o-transform: rotate(65deg);
    transform: rotate(65deg);
  }

  #ribbon .right_corner {
    -webkit-transform: rotate(25deg);
    -moz-transform: rotate(25deg);
    -ms-transform: rotate(25deg);
    -o-transform: rotate(25deg);
    transform: rotate(25deg);
  }
  #ribbon .base:after {
    height: 71px;
  }
  #ribbon .base:before {
    height: 71px;
  }
}

#srcServType {
  width: 90%;
  height: 35px;
  font-size: 13px;
  letter-spacing: 1px;
  padding: 5px;
  outline: none;
  cursor: pointer;
  border-radius: 3px;
  border: 1px lightgray solid;
  margin-left: 10px;
}
#srcState {
  width: 90%;
  height: 35px;
  font-size: 13px;
  letter-spacing: 0.5px;
  padding: 5px;
  outline: none;
  cursor: pointer;
  border-radius: 3px;
  border: 1px lightgray solid;
  margin-left: 10px;
}
#srcArea {
  width: 90%;
  height: 35px;
  font-size: 13px;
  letter-spacing: 0.5px;
  padding: 5px;
  outline: none;
  cursor: pointer;
  border-radius: 3px;
  border: 1px lightgray solid;
  margin-left: 10px;
}





#srcItems {
  border: 0px #00C853 solid;
  top: 70px;
  left: 20%;
  width: 40%;
  height: 45px;
  position: absolute;
  background: rgba(0, 0, 0, 0);
  /*background-color: #4FC3F7;
  background: rgb(98,200,246);
  background: linear-gradient(180deg, rgba(98,200,246,1) 0%, rgba(133,213,250,1) 89%);*/
  border-radius: 5px;
  z-index: 20;
  border: 0px green solid;
}

#srcItems.stick {
    margin-top: 0 !important;
    position: absolute;
    margin: auto;
    border: 0px blue solid;
    background: rgba(0, 0, 0, 0);
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0), 0 px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    /*border-radius: 0 0 0.5em 0.5em;*/
}

#srcItemsCont {
  border: 0px red solid;
  margin-left: 60px;
  width: 100%;
}

#srcWord {
  border: 0px red solid;
  width: 60%;
  height: 30px;
  margin-top: 3px;
  font-size: 14px;
  letter-spacing: 1.5px;
  padding-left: 10px;
  outline: none;
  border-radius: 5px;
  float: left;
  margin-left: 10px;
}

#srcButton {
  margin-top: 0px;
  min-width: 10px;
  min-height: 10px;
  width: 35px;
  height: 35px;
  background-color:#1976D2;
  border-radius: 55px;
  margin-left: 10px;
}

#spacer {
  height: 10px;
  width: 100%;
  border: 0px red solid;
}

#adEditCont {
  border: 0px red solid;
  position: relative;
  right: 10px;
  padding: 20px;
  padding-top: 0px;
  width: 550px;
  max-width: 550px;
  margin-right: -550px;
  /*background-color: rgb(250,250,250);*/
  overflow-y: auto;
  overflow-x: hidden;
  z-index: 21;
  display: table;
  cursor: default;
  border-radius: 5px;
  border: 0px red solid;
  margin-bottom: 20px;
}

@media screen and (min-width: 1px) and (max-width:850px) {
  #srcItems {
    border: 0px red solid;
    width: 54%;
    left: 0px;
    height: 37px;
    margin-left: 15%;
    overflow: hidden;
  }
  #srcItems.stick {
    margin-top: 50 !important;
    top: 50px;
    width: 95%;
    position: fixed;
  }
  #srcItemsCont {
    width: 99%;
    height: 75px;
    margin-left: 0%;
    padding-left: 0px;
    border: 0px blue solid;
    overflow: hidden;
  }
  #srcWord {
    width: 65%;
    padding-left: 5px;
  }
  #srcButton {
    top: 3px;
    width: 30px;
    height: 30px;
    margin-right: 5px;
  }

  #srcCloseButton {
    display: block;
    position: absolute;
    margin-top: 100px;
    margin-left: 85%;
    z-index: 999999999999999999999999999999999;
    border: 0px red solid;
  }

  #adEditCont {
    width: 100%;
    padding: 0px;
    padding-top: 0px;
    padding-bottom: 10px;
    margin: 0px;
    margin-top: 10px;
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 10px;
    left: -20px;
    right: -20px;
    border: 1px red solid;
    display: table-cell;
    position: relative;
  }

  .shadowfilter {
    /*-webkit-filter: drop-shadow(12px 12px 20px rgba(255, 0, 0, 0.9));
     filter: drop-shadow(12px 12px 20px rgba(255, 0, 0, 0.9));
     border: 1px red solid;*/
  }
}



</style>

<script type="text/javascript">

  $('#adMainCont').on('scroll', function () {
    var scrollTop = $('#adMainCont').scrollTop();
    if (scrollTop > 40) {
      //alert();
      $('#topBar').stop().animate({height: "60px"},100);
      $('#srcItems').stop().animate({top: "13px"},100);
      $('#adMainCont').stop().animate({marginTop: "60px"},100);
      
      var windowsize = $(window).width();
      if(windowsize>850) {
        $('#topLogoImg').stop().animate({width: "50px"},100);
        $('#topTextImg').stop().animate({
          width: "200px",
          marginLeft: "-50px"
        },100);
      } else {
        $('#topTextImg').stop().animate({
          marginTop: "-100px"
        },100);
      }
      //$('#drawerCont').css("marginTop","20px");

      //$('#topLogoImg').stop().animate({transform: "rotate(45deg)"},100);

      /*$('#topLogoImg').animate(
      { deg: 90 }, {
          duration: 1000,
          step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)' });
          }
        }
      );*/

    } else {
      $('#topBar').stop().animate({height: "120px"},50);
      $('#srcItems').stop().animate({top: "70px"},50);
      $('#adMainCont').stop().animate({marginTop: "120px"},50);
      
      var windowsize = $(window).width();
      if(windowsize>850) {
        $('#topLogoImg').stop().animate({width: "100px"},100);
        $('#topTextImg').stop().animate({
          width: "300px",
          marginLeft: "0px"
        },100);
      } else {
        $('#topTextImg').stop().animate({
          marginTop: "0px"
        },100);
      }
      //$('#drawerCont').css("marginTop","80px");
    }
  });
</script>

  <!--div id="ribbon">
    <div class="inset"></div>

    <div class="container">
      <div class="base"></div>
      <div class="left_corner"></div>
      <div class="right_corner"></div>
    </div>
  </div-->

  <!--div id="ribbonSmall" style="border:0px blue solid;cursor:pointer;" onclick="toggleDrawer()">
    <img src="img/menu.png" style="cursor:pointer;">
  </div-->

  <!--
    original hamburger menu - moved to svcList in paging
    div class="menu mdl-js-button mdl-js-ripple-effect" onclick="toggleDrawer()">
    <div class="icon"><span class="material-icons-outlined">filter_alt</span></div>
  </div-->

  <div id="topLogo"><img id="topLogoImg" src="img/logo.png"></div>
  <div id="topText">
    <img id="topTextImg" src="img/logotitle.png">
    <!--img id="topTextImg2" src="img/servishub.png"-->
  </div>
  <!--div id="topTextTop" class="long-shadow-top">Servis Hub</div-->
  <!--div id="topText" class="long-shadow">Servis Hub</div-->




<div id="adOverlay" onclick="hideOverlay()"></div>
<div id="adMainStatus"></div>

<div id="adViewScroll">
  <button id="viewCloseButton" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored" style="background-color:#1976D2;">
    <p class="material-icons"><span class="material-icons-outlined">close</span></p>
  </button>

  <div id="adViewCont" class="mdl-card mdl-shadow--2dp"></div>
</div>

<div id="adEditScroll">
  <div id="adEditCont" class="mdl-card mdl-shadow--2dp"></div>
</div>

<div id="usrPanelScroll">
  <button id="usrPanelCloseButton" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored" style="background-color:rgba(255,255,255, 0.5);">
    <p class="material-icons"><span class="material-icons-outlined" onclick="hideUsrPanel(),hideOverlay()">chevron_right</span></p>
  </button>
  <span id="loginUsrLogout" class="usrMainLogout" onclick="logout()"><span class="material-icons-outlined" style="display:table-cell;vertical-align: middle;">logout</span><span class="mdl-tooltip" for="loginUsrLogout"><?=lang($_SESSION["currLang"],"Log out","Log keluar")?>"</span></span>
  <div id="usrPanelCont" class="mdl-card mdl-shadow--2dp"></div>
</div>








<!-- The drawer is always open in large screens. The header is always shown,
  even in small screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
  <!--header class="mdl-layout__header">
  <div class="mdl-layout__header-row"-->
  <header class="">
    <div id="topBar" class="">
      <!--div class="mdl-layout-spacer"></div-->

      <!--button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="position:relative;left:0px;top:4px;height:40px;" onclick="showAdEdit('')">Add New</button-->
      <!--button id="usrButton" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="position:relative;left:0px;top:4px;height:40px;" onclick="showUsrPanel('')">Login</button-->

      <div id="langButton" class="mdl-js-button mdl-js-ripple-effect" onclick="changeLang()">
        <div id="langButtonText" onclick="changeLang()"></div>
        <span class="mdl-tooltip" for="langButton"><?=lang($_SESSION["currLang"],"Change Language","Tukar Bahasa")?></span>
      </div>
      <div id="addButton" class="mdl-js-button mdl-js-ripple-effect" onclick="showAdEdit('')">
        <div id="addButtonText"><span class='material-icons-outlined' style='width:25px;position:relative;top:px;text-align:center;'>add_circle</span></div>
        <span class="mdl-tooltip" for="addButton"><?=lang($_SESSION["currLang"],"Advertise new item","Tambah iklan baru")?></span>
      </div>
      <div id="usrButton" class="mdl-js-button mdl-js-ripple-effect" onclick="showUsrPanel('')">
        <div id="usrButtonText"></div>
      </div>


      <!--div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
        </div>
      </div-->
    </div>

    <div id="srcItems">
      <div id="srcItemsCont">
        <input id="srcWord" type="text" autocomplete="off"></input>
        <button id="srcButton" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored srcButton" onclick="srcService(1)">
          <p class="material-icons"><span class="material-icons-outlined" style="font-size:24px;color:#EEEEEE;">search</span></p>
        </button>
        <!--input id="srcWord" type="text"></input>
        <select id="srcServType"></select>
        <select id="srcState" onchange="loadAvailArea(this)"></select>
        <select id="srcArea" ><option value="">All Area</option></select-->
      </div>
    </div>
  </header>

  <main class="mdl-layout__content" id="adMainCont">
    <div class="page-content">

      <div id="adOverlayContent" onclick="hideOverlayContent()"></div>
      <!-- content-->

      <!--button onclick="showAdViewCont()" style="position:absolute;">xxx</button-->

      <!--div id="adBarCont">
        <span style="font-size:9px;padding:5px;">servicefinder v 1.1</span>
        <button style="right:2px;position:absolute;top:2px;" onclick="showAdEdit('')">Add New</button>
      </div-->
      <!--input id='test'-->
      <!--button style="right:20px;position:absolute;top:100px;" onclick="displayStatus('abc','adMainStatus')">test</button-->



      <div id="drawerCont" style="background-color:#F0F0F0;">
        <div class="srcRow" style="background-color:#F0F0F0;height:50px;">
          
        </div>

        <button id="srcCloseButton" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored" style="background-color:rgba(255,255,255, 0.5);display:none;">
          <span class="material-icons-outlined" onclick="toggleDrawer()">chevron_left</span>
        </button>

        <div class="srcRow" style="background-color:#F0F0F0;"><select id="srcState" onchange="loadAvailArea(this)"></select></div>
        <div class="srcRow" style="background-color:#F0F0F0;"><select id="srcArea" onchange="srcService(1)"><option value=""></option></select></div>

        <div class="srcRow" style="display:none;background-color:#F0F0F0;"><select id="srcServType"></select></div>
        
        <div class="srcRow" style="background-color:#F0F0F0;"></div>
        <div id="drawer" style="background-color:#F0F0F0;"></div>
      </div>
      
      <div id="adListCont"></div>

    </div>

    <!-- Add spacer to push Footer down when not enough content -->
            <div class="mdl-layout-spacer"></div>

      <footer class="mdl-mini-footer" style="width:100%;">
        <div class="mdl-mini-footer--middle-section">
          <div class="mdl-logo">FreeMarket <?=date("Y")?></div>
          <ul class="mdl-mini-footer--link-list">
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy & Terms</a></li>
            <li><a href="#">v1.09</a></li>
          </ul>
        </div>
      </footer>
  </main>
</div>
