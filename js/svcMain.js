var timer = "";
var usrSession = "";
var usrNameSession = "";
var currLang = "";
var currPage="1";

var zzCat = new Array();
var zzLoc = [[]];

if ((sessionStorage.getItem("currLang")!="")&&(sessionStorage.getItem("currLang")!=null)) {
  var param=sessionStorage.getItem("currLang");
} else {
  param="";
}
AjaxGo2("adMainStatus","loadLang",param,"postLang","process/svcMain");

$(document).ready(function(){
  indexInit();
  componentHandler.upgradeAllRegistered();
});

function loadInit() {
  //AjaxGo2("adMainStatus","loadInit","","postInit","process/svcMain");
}

function postInit(data,layer) {
  //pending 20160426
  /*var zCat=data.split("|*|")[0];
  var zArea=data.split("|*|")[1];

  //alert(zArea);


  var cnt=0;
  $.each(zArea.split("|**|"), function(i1,v1){
    $.each(zArea.split("|~|"), function(i2,v2){
      if (i2!=0) {
        //zzLoc.push({v1.split("^")[0]:[{"stateId":v1.split("^")[0],"stateName":v1.split("^")[1], "areaId":v2.split("^")[0], "areaName":v2.split("^")[1]}]});
        //zzLoc[i1].push({"areaId":v2.split("^")[0],"areaName":v2.split("^")[1]});
        zzLoc[i1].push({"x":"y"});
      }
    });
	});
  //$("#"+layer).html(data);
  alert(zzLoc[0]);*/
}

function indexInit() {
  loadAdList();   // load ad listing
  //loadAdView();   // ad popup view more details
  //loadDrawer();   // load services left drawer
  //loadAdEdit();   // add/edit ad
  //loadUsrPanel(); // load usr panel - login or usr panel
}

function postLang(data,layer) {
  //alert(sessionStorage.getItem("currLang")+"^"+currLang+"^"+data);
  if (data!="") {
    // logged in
    sessionStorage.setItem("currLang",data);
    currLang = data;
  } else {
    //alert(sessionStorage.getItem("currLang")+"^"+currLang);
    if (sessionStorage.getItem("currLang")!="") {
      // logged out with preferrence
      currLang=sessionStorage.getItem("currLang");
    } else {
      // logged out without preferrence
      currLang="en";
      sessionStorage.setItem("currLang",currLang);
    }
  }
  //alert(sessionStorage.getItem("currLang")+"^"+currLang+"^"+data);
  setLang();
}

function setLang() {
  var windowsize = $(window).width();
  
  if(windowsize>850) {
    $("#langButtonText").html(lang(currLang,"English","Bahasa Malaysia"));
    $("#srcWord").prop("placeholder",lang(currLang,"Search for items here...","Cari barang disini..."));
  } else {
    $("#langButtonText").html(lang(currLang,"EN","BM"));
    $("#srcWord").prop("placeholder",lang(currLang,"Search items...","Cari barang..."));
  }

}

function changeLang() {
  var windowsize = $(window).width();
  //alert(sessionStorage.getItem("currLang")+"^"+currLang);
  if (sessionStorage.getItem("currLang")!="") {
    if (sessionStorage.getItem("currLang")=="bm") {
      currLang="en";
      sessionStorage.setItem("currLang","en");
      if(windowsize>850) {
        $("#langButtonText").html("English");
      } else {
        $("#langButtonText").html("EN");
      }
    } else {
      currLang="bm";
      sessionStorage.setItem("currLang","bm");
      if(windowsize>850) {
        $("#langButtonText").html("Bahasa Malaysia");
      } else {
        $("#langButtonText").html("BM");
      }
    }
    if (usrSession!="") {
      AjaxGo2("adMainStatus","setLang",sessionStorage.getItem("currLang")+"^"+usrSession,"postSetLang","process/svcMain");
    } else {
      location.reload();
    }
  }
  //alert(sessionStorage.getItem("currLang")+"^"+currLang);
}

function postSetLang(data,layer) {
  //alert(data);
  location.reload();
}

function loadAdList() {
  $("#adListCont").load("view/svcList.php",function() {
    $("#srcWord").focus();
    $(document).ready(function(){
      loadAdView();
    });
  });
}

function loadAdView() {
  $("#adViewCont").load("view/svcView.php",function() {
    setTimeout("srcService(1)",500);
    loadDrawer();
    loadAdEdit();
  });
}

function loadDrawer() {
  AjaxGo2("drawer","loadDrawer","","popDrawer","process/svcMain");
}

function loadAdEdit() {
  $("#adEditCont").load("view/svcEdit.php",function() {
    loadUsrPanel();
  });
}

function loadUsrPanel() {
  $("#usrPanelCont").load("view/svcUser.php",function() {

  });
}

function popDrawer(data,layer) {
  $("#"+layer).append("<div class='srcRow' style='font-weight:600;'>"+lang(currLang,"Category","Kategori")+"</div>");
  $("#"+layer).append("<div class='drawerRow' style='background-color:rgb(230,230,230);' onclick='highlightDrawerRow(this,\"\")'>All</div>");
  var dataArr=data.split("||");
  for (i=0;i<(dataArr.length-1);i++) {
    var id=dataArr[i].split("^")[0];
    if (currLang=="en") { var desc=dataArr[i].split("^")[1]; }
    if (currLang=="bm") { var desc=dataArr[i].split("^")[2]; }
    $("#"+layer).append("<div class='drawerRow' onclick='highlightDrawerRow(this,"+id+")'>"+desc+"</div>");
  }
}

function highlightDrawerRow(obj,id) {
  $(".drawerRow").css("background-color","#ffffff")

  $(".drawerRow").mouseover(function() {
    if($(this).css("background-color")!=="rgb(230, 230, 230)") {
      $(this).css("background-color","rgb(240, 240, 240)");
    }
  }).mouseout(function() {
    if($(this).css("background-color")!=="rgb(230, 230, 230)") {
      $(this).css("background-color","#ffffff");
    }
  });

  $(obj).css("background-color","rgb(230, 230, 230)");

  $("#srcServType").val(id);
  srcService(1);
  if ($(".menu").hasClass("open")==true) {
    hideDrawer();
  }
}

function toggleDrawer() {
  //alert(parseInt($("#drawerCont").css("margin-left")));

  if (($(".menu").hasClass("open")===false)&&(parseInt($("#drawerCont").css("margin-left"))<0)) {
    showDrawer();
  }

  if (($(".menu").hasClass("open")===true)&&(parseInt($("#drawerCont").css("margin-left"))>=0)) {
    $("#adOverlayContent").click(function(e) {
      hideDrawer();
    });
    hideDrawer();
  }
}

function showDrawer() {
  $("#drawerCont").css("width","90%");
  $("#drawerCont").css("position","fixed");
  $("#drawerCont").css("top","40px");
  $("#drawerCont").css("left","0px");
  var winHeight=$(window).height();
  $("#drawerCont").css("height",winHeight-46);  // overall window height minus topbar
  $("#drawer").css("height",winHeight-195);     // overall window height minus search critera
  showOverlayContent();
  $(".menu").addClass("open");

  $("#drawerCont").animate({"margin-left":"0%"},"fast",function(){

  });

  $("#adOverlayContent").click(function(e) {
    hideDrawer();
  });
}

function hideDrawer() {
  $(".menu").removeClass("open");
  //var drawerMargin=$("#drawerCont").css("left");
  //if (parseInt(drawerMargin)==0) {
    $("#drawerCont").animate({"margin-left": '-100%'},"fast",function(){
      hideOverlayContent();
      $("#drawerCont").css("width","70%");
      $("#drawerCont").css("position","relative");
      $("#drawerCont").css("top","40px");
      $("#drawerCont").css("left","0px");
    });
  //}
}

function showAdView(adId,next) {
  if (next!="") {
    hideUsrPanel();
  }

  $("#adViewScroll").unbind("click");
  showOverlay();
  $("#adViewScroll").scrollTop(0);
  //$("#adViewScroll").css("display","block");
  $("#adViewScroll").fadeIn("fast");
  $("#adViewScroll").css("overflow-y","auto");
  $("#adViewScroll").css("overflow-x","hidden");

  center_relocate();

  //$('#adEditCont').animate({"margin-right": '0%'},'fast');

  // handles click
  $("#adViewCont").click(function(e) {
    e.stopPropagation();
  });
  $("#adViewScroll").click(function(e) {
    hideAdView();
    hideOverlay(next);
  });

  getAdDetails(adId);

  //center_relocate();
}

function hideAdView() {
  // clear all fields
  $("#imgMain").html("");
  $("#imgList").html("");
  $("#adMainTitle").html("");
  $("#usrNameCont").html("");
  $("#usrPhoneCont").html("");
  $("#servTypeCont").html("");
  $("#areaCont").html("");
  $("#jobCont").html("");
  $("#daysTimeCont").html("");
  $("#descCont").html("");
  $("#companyDet").html("");

  $("#adViewScroll").scrollTop(0);
  //$("#adViewScroll").css("display","none");
  $("#adViewScroll").css("overflow","hidden");
  $("#adViewScroll").fadeOut("fast");
}

function showAdEdit(adId,next) {

  //var body = document.getElementsByTagName("body");
  //var bodycontent = body[0];
  //window.history.pushState(bodycontent.html, "Title", "/new-url");
  //updURL(window.document,"/addNew")

  if (next!="") {
    hideUsrPanel();
    $("#saveAd").attr("onclick","saveAd('"+next+"')");
  } else {
    $("#saveAd").attr("onclick","saveAd('')");
  }

  $("#adEditScroll").unbind("click");
  showOverlay();
  $("#adEditScroll").scrollTop(0);
  $("#adEditScroll").css("display","block");
  $("#adEditScroll").css("overflow-y","scroll");
  $("#adEditScroll").css("overflow-x","hidden");

  //$("#adEditCont").animate({width:'toggle'},400);
  $("#adEditCont").animate({"margin-right": '0px'},"fast",function(){
    $("#adTitle").focus();
  });

  // populate edit
  if (adId!="") {
    getAdEditDetails(adId);
    $("#adEditTitleText").html(lang(currLang,"Update Ad","Kemaskini Iklan"));
    $("#clearAd").css("display","none");    //clear button
    $("#saveAd").html(lang(currLang,"Update","Kemaskini"));    //save button
  } else {
    $("#adEditTitleText").html(lang(currLang,"Post A New Ad!","Masukkan Iklan Baru!"));
    $("#clearAd").css("display","inline");    //clear button
    $("#saveAd").html(lang(currLang,"Save","Simpan"));    //save button
  }
  // populate current user
  getUsrDetails();

  // handles click
  $("#adEditCont").click(function(e) {
    e.stopPropagation();
  });

  $("#adEditScroll").click(function(e) {
    //if (confirm("Are you sure?")) {
      //clearAdEdit();
      hideAdEdit();
      hideOverlay(next);
    //}
  });
}

function hideAdEdit() {
  clearAdEdit();
  $("#adEditScroll").scrollTop(0);
  $("#adEditScroll").css("overflow","hidden");
  $("#adEditCont").animate({"margin-right": '-570px'},"fast",function(){
    $("#adEditScroll").css("display","none");
  });
}

function showOverlay() {
  hideOverlayContent();
  if ($(".menu").hasClass("open")==true) {
    hideDrawer();
  }
  $("#adOverlay").css("display","block");
  $("#adOverlay").css("overflow-y","auto");
  $("#adOverlay").css("overflow-x","hidden");

  // html body temporary hide
  var html = jQuery("html");
  html.css("overflow","hidden");
}

function showOverlayContent() {
  $("#adOverlayContent").css("display","block");
  $("#adOverlayContent").css("overflow-y","auto");
  $("#adOverlayContent").css("overflow-x","hidden");
  // html body temporary hide
  var main = jQuery("#adMainCont");
  main.css("overflow","hidden");
}


function hideOverlay(next) {
  $("#adOverlay").css("display","none");
  $("#adOverlay").css("overflow","hidden");

  // hide all popup
  //hideAdView();
  //hideAdEdit();
  //hideUsrPanel();

  // html body show back
  var html = jQuery("html");
  html.css("overflow-y","auto");
  html.css("overflow-x","hidden");

  var main = jQuery("#adMainCont");
  main.css("overflow-y","auto");
  main.css("overflow-x","hidden");

  if (next!="") { eval(next); }
}

function hideOverlayContent() {
  $("#adOverlayContent").css("display","none");
  $("#adOverlayContent").css("overflow","hidden");
  // html body show back
  var main = jQuery("#adMainCont");
  main.css("overflow-y","auto");
  main.css("overflow-x","hidden");
}

function displayStatus(msg,layer) {
  if (layer=="") { layer="adMainStatus"; }

  if (timer!="") {
    $("#timer_"+timer).animate({"margin-top":'5px'},"fast",function(){});
  }

  var d = new Date();
  timer = d.getTime();

  //$("#"+layer).prepend($("<div id='timer_"+timer+"' class='statusBox'>"+msg+"</div>").hide().fadeIn("300"));
  $("#"+layer).prepend($("<span id='timer_"+timer+"' class='statusBox'>"+msg+"</span>").animate({"margin-top":'5px'},"fast",function(){}));
  setTimeout("$('#timer_"+timer+"').fadeOut('300')",3000);
  //setTimeout("$('#timer_"+timer+"').animate({'margin-left':'-400px'},'fast',function(){})",3000);
}

function displayStatusOri(msg,layer) {
  if (layer=="") { layer="adMainStatus"; }

  if (timer) {
    clearTimeout(timer);
    timer = null;
  }
    $("#"+layer).append("<div>"+msg+"</div>");
    $("#"+layer).fadeIn("300");

    timer = setTimeout(function() {
      $("#"+layer).fadeOut("300");
      $("#"+layer).html("").fadeOut("500")
    },3000);
}

function showUsrPanel(next) {
  $("#usrPanelScroll").unbind("click");
  showOverlay();
  $("#usrPanelScroll").scrollTop(0);
  $("#usrPanelScroll").css("display","block");
  $("#usrPanelScroll").css("overflow-y","hidden");
  $("#usrPanelScroll").css("overflow-x","hidden");

  $("#usrPanelCont").animate({"margin-right": '0px'},"fast",function(){
    chooseUsrPanel();
  });
  $("#usrPanelCloseButton").animate({"margin-right": '0px'},"fast",function(){});

  // handles click
  $("#usrPanelCont").click(function(e) {
    e.stopPropagation();
  });

  $("#usrPanelScroll").click(function(e) {
      hideUsrPanel();
      hideOverlay(next);
  });
}

function hideUsrPanel() {
  $("#usrPanelScroll").css("overflow","hidden");
  $("#usrPanelScroll").scrollTop(0);
  $("#usrPanelCont").css("overflow","hidden");
  $("#usrPanelCont").animate({"margin-right": '-570px'},"fast",function(){
    $("#usrPanelScroll").css("display","none");
  });
  $("#usrPanelCloseButton").animate({"margin-right": '-570px'},"fast",function(){});
}

// loading

function loadButtonOn(button) {
  $("#"+button).html("<div style='position:relative;display:inline-block;width:100%;border:0px red solid;overflow:hidden;'><img src='img/loading.gif'></div>");
  $("#"+button).prop("disabled",true);
}

function loadButtonOff(button,value) {
  $("#"+button).html(value);
  $("#"+button).prop("disabled",false);
}

function titleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
























// sticky

function sticky_relocate() {
    //var window_top = $("#adMainCont").scrollTop();
    //var window_top = $(".mdl-layout__header").height();
    //var div_top = $("#srcItems").offset().top;
    //var div_top=30;
    //$("#adMainStatus").html(window_top+"^"+div_top);
    //$("#adMainStatus").css("display","block");
    //if (window_top > div_top) {
        //$('#srcItems').addClass("stick");
        //$('#srcItems').css("top","40px");
        //$('#srcItems').css("position","fixed");

        //$('#srcItems').css("width",$("#adListCont").css("width"));
        //$('#sticky-anchor').height($('#srcItems').outerHeight());
    //} else {
    //    $('#srcItems').removeClass('stick');
    //    $('#sticky-anchor').height(0);
    //}

    //var div_top = $('#sticky-anchor').offset().top+
    //var div_top = $("#srcItems").offset().top-(parseInt($(".mdl-layout__header").css("height"))-40);
    /*var window_top = $("#adMainCont").scrollTop();
    var div_top = parseInt($(".mdl-layout__header").css("height"));
    //$("#adMainStatus").html($('#srcItems').css("top")+"^"+div_top);
    //$("#adMainStatus").css("display","block");
    //$('#srcItems').css("top",20+div_top);
    
    $('#srcItems').addClass('stick');
    //$('#srcItems').css("width",$("#adListCont").css("width"));
    
    $('#srcItems').css("top","70px");
    $('#srcItems').stop().animate({top: "8px"},50);
    //$('#sticky-anchor').height($('#srcItems').outerHeight());

    //$('#back-anchor').height(60+div_top);
    //$('#back-anchor').height(80);
    //$('#back-anchor').css("position","fixed");
    //$('#back-anchor').css("width",parseInt($("#adListCont").css("width"))+1);

    if (window_top <= 0) {
        $('#srcItems').removeClass('stick');
        //$('#sticky-anchor').height(0);
        //$('#back-anchor').height(0);
        //$('#back-anchor').css("position","relative");
    }*/
}

function center_relocate() {
  var winWidth=$(window).width();
  var winHeight=$(window).height();
  var adView=$("#adView").width();
  var imgCont=$("#imgCont").width();
  var adDescCont=$("#adDescCont").width();
  var adCommCont=$("#adCommCont").width();
  var imgMainHeight=$("#imgMain").height();
  var imgHeight=$("#imgSel").height();
  var adListWidth=$("#adList").width();

  if (winWidth>="850") {
    $("#imgCont").width((adView/2)-20);
    $("#adDescCont").width((adView/2)-20);
    $("#adCommCont").width((adView/2)-20);
    $("#adDescCont").css("float","right");

    $("#viewCloseButton").css("left",adView+((winWidth-adView)/2)-10);

    // adList content width size -error
    //$(".line1").css("width",adListWidth-200);
    //$(".line2").css("width",adListWidth-200);
    //$(".line3").css("width",adListWidth-200);

    //$("#adMainStatus").css("display","block");
    //$("#adMainStatus").html($("#line1").css("width"));

  } else {
    $("#imgCont").width(adView);
    $("#adDescCont").width(adView);
    $("#adCommCont").width(adView);
    $("#adDescCont").css("float","left");

    $("#viewCloseButton").css("left",adView+10);
    $("#viewCloseButton").css("top",30);

    // adList content width size
    $(".line1").css("width",adListWidth-140);
    $(".line2").css("width",adListWidth-140);
    $(".line3").css("width",adListWidth-140);
  }
  // adjust main image size
  //mainImgSize();

  //adjust usr panel height based on top bar (mdl-layout__header)
  //if ($(".mdl-layout__header").height()==40) { var remove="20"; }
  //if ($(".mdl-layout__header").height()==50) { var remove="30"; }
  $("#usrPanelCont").height(winHeight);

}

function mainImgSize() {
  var maxWidth = "100%"; // Max width for the image
  var maxHeight = $("#imgMain").height();    // Max height for the image
  var ratio = 0;  // Used for aspect ratio
  var topPos = 0;
  var leftPos = 0;
  var width = $("#imgMain img").width();    // Current image width
  var height = $("#imgMain img").height();  // Current image height

  // Check if the current width is larger than the max
  if(width > maxWidth){
      ratio = maxWidth / width;   // get ratio for scaling image
      $("#imgMain img").css("width", maxWidth); // Set new width
      $("#imgMain img").css("height", height * ratio);  // Scale height based on ratio
      height = height * ratio;    // Reset height to match scaled image
      width = width * ratio;    // Reset width to match scaled image
  }

  // Check if current height is larger than max
  if(height > maxHeight){
      ratio = maxHeight / height; // get ratio for scaling image
      $("#imgMain img").css("height", maxHeight);   // Set new height
      $("#imgMain img").css("width", width * ratio);    // Scale width based on ratio
      width = width * ratio;    // Reset width to match scaled image
      height = height * ratio;    // Reset height to match scaled image
  }

  //alert(height+"^"+maxHeight);

  // top position
  if (height < maxHeight) {
    topPos = (maxHeight-height)/2;
    $("#imgMain img").css("position","relative");
    $("#imgMain img").css("top",topPos);
  }

  if (width < maxWidth) {
    leftPos = (maxWidth-width)/2;
    $("#imgMain img").css("position","relative");
    $("#imgMain img").css("left",leftPos);
  }

}

function lang(lang,textEN,textBM) {
  if (lang=="en") {
    return textEN;
  } else {
    return textBM;
  }
}

$(document).ready(function(){
    $("#adMainCont").scroll(sticky_relocate);
    //sticky_relocate();

    $(window).resize(center_relocate);
    center_relocate();
});
