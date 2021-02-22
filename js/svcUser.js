$(document).ready(function(){
  initUsr();

  $("#loginPassword").keyup(function(e) {
    var enterKey = 13;
    if (e.which == enterKey){
      if ($("#logButton").css("display")!="none") {
        login();
      }
    }
  });
});

function initUsr() {
  if (usrSession==""){  //not logged in
    AjaxGo2("adMainStatus","chkSession","","postChkSession","process/svcUser");
  } else {
    // logged in
    chooseUsrPanel();
  }
}

function postChkSession(data,layer) {
  var dataArr = data.split("^");
  if (dataArr[0]!="") {
    usrSession=dataArr[0];  // set user id to global
    usrNameSession=dataArr[1];
    currLang=dataArr[2];
  } else {
    loadTopBar();
  }
  chooseUsrPanel();
}

function loadTopBar() {
  if ((usrSession!="")&&(usrSession!="0")) {
    //var usrName=usrNameSession.replace(/.{12}\S*\s+/g, "$&@").split(/\s+@/)[0];
    //if (usrName.length>15) { usrName=usrName.split(" ")[0]; }
    var usrName = titleCase(usrNameSession.substring(0,25));
    var txt="<div class='usrText'>"+usrName+"</div>&nbsp;<span class='material-icons-outlined usrLogo'>face</span>";
    txt=txt+"<span class='mdl-tooltip' for='usrButton'>"+lang(currLang,"My Account","Akaun Saya")+"</span>";
    $("#usrButtonText").html(txt);
  } else {
    //var txt="<div style='border:0px red solid;padding-left:10px;overflow:hidden;position:relative;left:0px;top:0px;display:inline-block;width:80%;height:20px;line-height:20px;text-align:center;float:left;'>"+lang(currLang,"Log In or Register","Log Masuk atau Daftar")+"</div>&nbsp;<span class='material-icons-outlined' style='width:25px;position:relative;top:-2px;float:right;'>face</span>";
    var txt="<div class='usrText'>"+lang(currLang,"Log In or Register","Log Masuk atau Daftar")+"</div>&nbsp;<span class='material-icons-outlined usrLogo'>face</span>";
    txt=txt+"<span class='mdl-tooltip' for='usrButton'>"+lang(currLang,"Log In or Register","Log Masuk atau Daftar")+"</span>";
    $("#usrButtonText").html(txt);
  }
  componentHandler.upgradeAllRegistered();
}

function chooseUsrPanel() {
  //alert(usrSession+"<<");
  if ((usrSession!="")&&(usrSession!="0")) {
    // check if empty data
    if ($("#loginUsrName").text()=="") {
      AjaxGo2("usrPanelStatus","popUsrPanel",usrSession+"|^|2","postLogin","process/svcUser");
    }

    $("#loginPanel").css("display","none");
    $("#usrPanel").css("display","block");
  } else {
    $("#loginPanel").css("display","block");
    $("#usrPanel").css("display","none");
    $("#loginEmail").focus();
  }
}

function logTab() {
  $("#log").css("background","white");

  $("#reg").css({
    background: "rgb(220,220,220)"
  });

  $(".regItem").css("display","none");
  $("#logButton").css("display","table");
  $("#regButton").css("display","none");

  $("#loginEmail").focus();
}

function regTab() {
  $("#reg").css("background","white");

  $("#log").css({
    background: "rgb(220,220,220)"
  });

  $(".regItem").css("display","table");
  $("#logButton").css("display","none");
  $("#regButton").css("display","table");

  $("#loginEmail").focus();
}

function login() {
  var loginEmail=$("#loginEmail").val();
  var loginPass=$("#loginPassword").val();

  if (checkEmpty(loginEmail,"Please enter 'Email'","loginEmail","loginEmail")) {
    if (checkEmpty(loginPass,"Please enter 'Password'","loginPassword","loginPassword")) {
      loadButtonOn("loginButton");
      AjaxGo2("usrPanelStatus","login",escapeHtml(loginEmail)+"|^|"+escapeHtml(loginPass),"postLogin","process/svcUser");
    }
  }
}

function postLogin(data,layer) {
  //alert(data+"<<");
  if (data.split("|^|")[0]!="") {
    $("#loginEmail").val("");
    $("#loginPassword").val("");
    loadButtonOff("loginButton","Login");
    popUsrPanel(data);
    currLang = data.split("|^|")[2];
  } else {
    $("#loginPassword").val("");
    $("#loginPassword").focus();
    loadButtonOff("loginButton","Login");
    displayStatus("Email and password did not match","adMainStatus");
  }
}

function register() {
  var loginName=$("#loginName").val();
  var loginEmail=$("#loginEmail").val();
  var loginPass=$("#loginPassword").val();
  var loginPass2=$("#loginPassword2").val();

  if (checkEmpty(loginEmail,"Please enter 'Email'","loginEmail","loginEmail")) {
    if (checkEmpty(loginPass,"Please enter 'Password'","loginPassword","loginPassword")) {
      if (checkEmpty(loginPass2,"Please reenter your 'Password'","loginPassword2","loginPassword2")) {
        if (checkEmpty(loginName,"Please enter 'Name'","loginName","loginName")) {
          if ((loginPass!="")&&(loginPass2!="")) {
            if (comparePass(loginPass,loginPass2,"Password does not match","loginPassword2","loginPassword2")) {
              loadButtonOn("registerButton");
              AjaxGo2("usrPanelStatus","register",escapeHtml(loginName)+"|^|"+escapeHtml(loginEmail)+"|^|"+escapeHtml(loginPass),"postReg","process/svcUser");
            }
          }
        }
      }
    }
  }
}

function postReg(data,layer) {
  var regMsg=data.split("|~|")[0];
  if ((data.split("|~|")[1]!="")&&(data.split("|~|")[1]!=undefined)) {
    $("#loginName").val("");
    $("#loginEmail").val("");
    $("#loginPassword").val("");
    $("#loginPassword2").val("");
    loadButtonOff("registerButton","Register");
    popUsrPanel(data);
  } else {
    loadButtonOff("registerButton","Register");
    if (regMsg!="") { displayStatus(data,"adMainStatus"); }
    $("#loginEmail").focus();
  }
}

function popUsrPanel(data) {
  //alert(data);
  var dataArr=data.split("|~|");
  var msg=dataArr[0];
  var loginUsrId=dataArr[1].split("|^|")[0];
  var loginUsrName=dataArr[1].split("|^|")[1];
  var lg=dataArr[1].split("|^|")[2];
  var phone=dataArr[1].split("|^|")[3];
  var adCnt=dataArr[1].split("|^|")[4];
  var bookCnt=dataArr[1].split("|^|")[5];
  
  if (msg!="") { displayStatus(msg,"adMainStatus"); }
  //alert(loginUsrId);
  usrSession=loginUsrId;
  usrNameSession=loginUsrName;

  loadTopBar();

  $("#loginPanel").css("display","none");
  $("#usrPanel").css("display","block");

  //alert(phone+"^"+adCnt+"^"+bookCnt);

  //$("#loginUsrImg")
  // user details - user name, phone, ad count, book count
  var nameCont    = "<div style='font-size:20px;font-weight:700;'>"+titleCase(loginUsrName)+"</div>";
  var phoneCont   = "<div style='font-size:13px;'>"+phone+"</div>";
  //var logoutCont  = "<span id='loginUsrLogout' class='usrMainLogout' onclick='logout()'><span class='material-icons-outlined' style='display:table-cell;vertical-align: middle;'>logout</span><span class='mdl-tooltip' for='loginUsrLogout'>"+lang(currLang,"Log out","Log keluar")+"</span></span>";
  //var adCntCont   = "<span style='font-size:12px;'>"+lang(lg,"Active ads","Iklan aktif")+": "+adCnt+"</span>&nbsp;&nbsp;&nbsp;<span style='font-size:11px;'>"+lang(lg,"Bookmark ads","Iklan kegemaran")+": "+bookCnt+"</span>";
  
  // fav counter and ad counter at user details area
  //var favCntCont  = "<span id='favCnt' class='favCnt'><span class='material-icons-outlined' style='display:table-cell;vertical-align: middle;'>book</span><span style='display:table-cell;vertical-align:middle;'>"+bookCnt+"</span><span class='mdl-tooltip' for='favCnt'>"+lang(currLang,"Bookmark ads","Iklan kegemaran")+"</span></span>";
  //var adCntCont   = "<span id='activeCnt' class='activeCnt'><span class='material-icons-outlined' style='display:table-cell;vertical-align: middle;'>card_giftcard</span><span style='display:table-cell;vertical-align:middle;'>"+adCnt+"</span><span class='mdl-tooltip' for='activeCnt'>"+lang(currLang,"Active ads","Iklan aktif")+"</span></span>";
  //$("#loginUsrName").html(nameCont+phoneCont+favCntCont+adCntCont+logoutCont);
  
  $("#loginUsrName").html(nameCont+phoneCont);

  $("#usrFavList").empty();
  var favArr=dataArr[2].split("|*|");

  //if (favArr=="") {
    $adRow=$("<div id='fav0' class='usrAdRow' style='cursor:auto;background:rgb(245,245,245);'><table width='100%' height='100%' border='0' cellspacing='0' cellpadding='0'><tr><td class='textNormal'><span style=border:1px red solid;height:24px;margin-bottom:100px;'>"+lang(lg,"Click this icon to add to favorites!","Klik pada ikon ini untuk simpan iklan kegemaran!")+"</span><span class='material-icons' style='float: right; '>bookmark_add</span></td><div>");
    $("#usrFavList").append($adRow);
  //}

  $adRow=$("<div style='border:0px red solid;height:26px;'><span class='material-icons-outlined'>book</span><span style='border:0px blue solid;height:24px;display:block;margin-left:24px;margin-top:-22px;font-weight:600;'>&nbsp;"+lang(lg,"Favorite Ads","Iklan Kegemaran")+"</span></div>");
  $("#usrFavListTitle").html($adRow);
  $("#usrFavList").css("border-top","1px rgb(200,200,200) solid");
  for (i=0;i<=favArr.length-2;i++) {
    var favDetArr=favArr[i].split("|^|");
    var loginAdId=favDetArr[0];
    var loginAdTitle=favDetArr[1].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
    var loginAdImg=favDetArr[2];

    if (loginAdImg!="") { var path="adData/"+loginAdId+"/"+loginAdImg; } else { var path="img/blankimg.png"; }
    var clickView="onclick='showAdView("+loginAdId+",\"showUsrPanel()\")'";

    $adRow=$("<div id='fav"+loginAdId+"' class='usrAdRow2'><table width='100%' height='100%' style='table-layout:fixed' border='0' cellspacing='0' cellpadding='0'><tr><td width='50px' "+clickView+"><img src='"+path+"' class='usrAdImg'></td><td class='textNormal' style='width:100%;height:100%;overflow:hidden;white-space:nowrap' "+clickView+"><div style='border:0px red solid;margin-right:5px;overflow:hidden;'>"+titleCase(loginAdTitle)+"</div></td><div>");

    $("#usrFavList").append($adRow);
  }


  $("#usrAdList").empty();
  var adArr=dataArr[3].split("|*|");
  $adRow=$("<div style='border:0px red solid;display:block;position:relative;'><span class='material-icons-outlined'>card_giftcard</span><span style='border:0px blue solid;height:24px;display:block;margin-left:24px;margin-top:-22px;font-weight:600;'>&nbsp;"+lang(lg,"My Ads","Iklan Saya")+"</span></div>");
  $("#usrAdListTitle").html($adRow);
  $("#usrAdList").css("border-top","1px rgb(200,200,200) solid");

  $adRow=$("<div id='add' class='usrAdRow' style='background:rgb(245,245,245);' onclick='showAdEdit(\"\",\"showUsrPanel()\")'><table width='100%' height='100%' border='0' cellspacing='0' cellpadding='0'><tr><td class='textNormal'>"+lang(lg,"Advertise a new item!","Masukkan iklan baru!")+"<span id='plusButton' class='material-icons-outlined' style='float: right;outline:none;' onclick='showAdEdit(\"\",\"showUsrPanel()\")'>add_circle</span><span class='mdl-tooltip' for='plusButton'>"+lang(currLang,"Advertise a new item","Tambah iklan baru")+"</span></td><div>");
  $("#usrAdList").append($adRow);

  for (i=0;i<=adArr.length-2;i++) {
    var adDetArr=adArr[i].split("|^|");
    var loginAdId=adDetArr[0];
    var loginAdTitle=adDetArr[1].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
    var loginAdStatus=adDetArr[2];
    var loginAdImg=adDetArr[3];

    if (loginAdImg!="") { var path="adData/"+loginAdId+"/"+loginAdImg; } else { var path="img/blankimg.png"; }
    
    var divEdit="<span id='edit"+loginAdId+"' class='editButton' onclick='showAdEdit("+loginAdId+",\"showUsrPanel()\")'><span class='material-icons-outlined' style='outline:none;'>mode</span><span class='mdl-tooltip' for='edit"+loginAdId+"'>"+lang(lg,"Edit Ad","Ubah Iklan")+"</span></span>";
    
    var statImg="<span id='edit"+loginAdId+"' class='material-icons-outlined' style='outline:none;color:#f44336;'>toggle_off</span>";
    var statMsg=lang(lg,"Activate Ad","Aktifkan Iklan");
    var statClick="inactive"; //what happens if click on status toggle
    if (loginAdStatus=="active") {
      statImg="<span id='edit"+loginAdId+"' class='material-icons-outlined' style='outline:none;color:#00796B;'>toggle_on</span>";
      statMsg=lang(lg,"Deactivate Ad","Nyahaktifkan Iklan");
      statClick="inactive";
    } else if (loginAdStatus=="inactive") {
      statImg="<span id='edit"+loginAdId+"' class='material-icons-outlined' style='outline:none;color:#f44336;'>toggle_off</span>";
      statMsg=lang(lg,"Activate Ad","Aktifkan Iklan");
      statClick="active";
    }
    var divActive="<span id='stat"+loginAdId+"' class='activeButton' onclick='toggleAdStatus("+loginAdId+",\""+statClick+"\")'>"+statImg+"<span class='mdl-tooltip' for='stat"+loginAdId+"'>"+statMsg+"</span></span>";
    
    var clickView="onclick='showAdView("+loginAdId+",\"showUsrPanel()\")'";

    var rowHTML="<div class='usrAdRow2'><table width='100%' height='100%' style='table-layout:fixed;' border='0' cellspacing='0' cellpadding='0'><tr>";
    rowHTML=rowHTML+"<td style='width:15%;' "+clickView+"><img src='"+path+"' class='usrAdImg'></td>";
    rowHTML=rowHTML+"<td class='textNormal' style='width:55%;overflow:hidden;' "+clickView+"><div style='border:0px red solid;margin-right:5px;overflow:hidden;'>"+titleCase(loginAdTitle)+"</div></td>";
    rowHTML=rowHTML+"<td class='textNormal' style='width:15%; text-align:center;'>"+divEdit+"</td>";
    rowHTML=rowHTML+"<td class='textNormal' style='width:15%; text-align:center;'><div id='statCont"+loginAdId+"'>"+divActive+"</div></td>";
    rowHTML=rowHTML+"</tr></table><div>";

    $adRow=$(rowHTML);

    $("#usrAdList").append($adRow);
  }

  componentHandler.upgradeAllRegistered();

  // reload adlist to load fav icon (if any) - only if logged in
  if (usrSession!="") {
    //srcService(currPage);
  }
}

function logout() {
  AjaxGo2("adMainStatus","logout","","postLogout","process/svcUser");
}

function postLogout(data,layer) {
  usrSession=""; // clear usr session
  usrNameSession=""; // clear usr name
  hideUsrPanel(); // hide usr panel
  hideOverlay(); // hide overlay
  loadTopBar(); // reload usr name at top bar to "Login"
  chooseUsrPanel(); // reset user panel to "login/register"
  clearUsrServices(); // clear user favorite list and ad list in usr panel
  srcService(currPage); // reload ad list
  getUsrDetails(); // reset user details in adedit form
  displayStatus("Successfully logged out","adMainStatus");
  setTimeout("removeSession()",1000);
}

function removeSession() {
  var timer = "";
  var usrSession = "";
  var usrNameSession = "";
  var currLang = "en";
  var currPage="1";
  sessionStorage.setItem("currLang","en");
  location.reload();
}

function getUsrDetails() {  // for adedit form
  //alert(usrSession);
  if (usrSession!="") {
    AjaxGo2("usrPanelStatus","getUsrDetails","","popUsrDetails","process/svcUser");
  } else {
    $("#usrName").val("");
    $("#usrEmail").val("");
    $("#usrPhone").val("");
    $("#usrId").val("");
    $("#usrEmail").prop("disabled",false);
    $("#usrPassword2").prop("disabled",false);
    $("#usrPassword").unbind("keyup");
    $("#usrPassword2").css("display","inline");
    $("#usrSSM").val("");
    $("#usrCompany").val("");
    $("#usrSSM").prop("disabled",false);
    $("#usrCompany").prop("disabled",false);
  }
}

function popUsrDetails(data,layer) {  // for adedit form
  var dataArr=data.split("|^|");
  $("#usrName").val(dataArr[0]);
  $("#usrEmail").val(dataArr[1]);
  $("#usrPhone").val(dataArr[2]);
  $("#usrSSM").val(dataArr[3]);
  $("#usrCompany").val(dataArr[4]);
  $("#usrChkSSM").val(dataArr[5]);
  $("#usrId").val(usrSession);

  $("#usrEmail").attr("disabled",true);
  $("#usrPassword").keyup(function() {
    $("#usrPassword2").val($("#usrPassword").val());
  });
  $("#usrPassword2").attr("disabled",true);
  $("#usrPassword2").css("display","none");

  if (dataArr[5]=="1") {
    $("#usrSSM").prop("disabled",true);
    $("#usrCompany").prop("disabled",true);
  } else {
    $("#usrSSM").prop("disabled",false);
    $("#usrCompany").prop("disabled",false);
  }
}

function clearUsrServices() {
  $("#usrFavListTitle").empty();
  $("#usrFavList").empty();
  $("#usrFavList").css("border","0px");
  $("#usrAdListTitle").empty();
  $("#usrAdList").empty();
  $("#usrAdList").css("border","0px");
}

function toggleAdStatus(adId,statClick) {
  AjaxGo2("adMainStatus","toggleAdStatus",adId+"|^|"+statClick,"postToggleAdStatus","process/svcUser");
}

function postToggleAdStatus(data,layer) {
  var dataArr = data.split("^");
  var msg = dataArr[0];
  var isSusccess = dataArr[1];
  var adId = dataArr[2];
  var statClick = dataArr[3];
  if (isSusccess=="true") {
    displayStatus(msg,"adMainStatus");

    if (statClick=="inactive") {
      var statImg="<span id='edit"+adId+"' class='material-icons-outlined' style='outline:none;color:#f44336;'>toggle_off</span>";
      var statMsg=lang(currLang,"Activate Ad","Aktifkan Iklan");
      var newStatClick="active";
    } else if (statClick=="active") {
      var statImg="<span id='edit"+adId+"' class='material-icons-outlined' style='outline:none;color:#00796B;'>toggle_on</span>";
      var statMsg=lang(currLang,"Deactivate Ad","Nyahaktifkan Iklan");
      var newStatClick="inactive";
    }
    $("#statCont"+adId).html("<span id='stat"+adId+"' class='activeButton' onclick='toggleAdStatus("+adId+",\""+newStatClick+"\")'>"+statImg+"<span class='mdl-tooltip' for='stat"+adId+"'>"+statMsg+"</span></span>");
    componentHandler.upgradeAllRegistered();
  } else {
    displayStatus(lang(currLang,"Save failed","Gagal mengemaskini"),"adMainStatus");
  }
}

function showHideFavOrAd(obj) {
  $("#usrFavListCont").css("display","none");
  $("#usrAdListCont").css("display","none");

  $("#usrFavListTitle").css("backgroundColor","#ffffff");
  $("#usrAdListTitle").css("backgroundColor","#ffffff");

  $("#"+obj+"Cont").css("display","block");
  $("#"+obj+"Title").css("backgroundColor","#B2DFDB");

}