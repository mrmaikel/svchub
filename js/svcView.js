

function initView() {
  //getAdDetails(1);
}

function getAdDetails(adId) {
  if (adId!="") {
    AjaxGo2("adViewStatus","getAdDetails",adId,"populateAdDetails","process/svcView");
  }
}

function populateAdDetails(data,layer) {
  //$adId."||".$title."||".$desc."||".$usrorName."||".$usrorPhone."||".$servCat."||".$imgList;
  var dataArr=data.split("||");
  var adId=dataArr[0];
  var title=dataArr[1].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
  var desc=dataArr[2].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
  var usrName=dataArr[3];
  var usrPhone=dataArr[4];
  var servCat=dataArr[5];
  var imgList=dataArr[6];
  var areaList=dataArr[7];
  var jobList=dataArr[8];
  var days=dataArr[9];
  var timeStart=dataArr[10];
  var timeEnd=dataArr[11];
  var usrId=dataArr[12];
  var book=dataArr[13];
  var usrSSM=dataArr[14];
  var usrCompany=dataArr[15];
  var usrChkSSM=dataArr[16];
  var quantity=dataArr[17];
  var condition=dataArr[18];
  var quality=dataArr[19];

  // images
  if (imgList!="") {
    $("#imgList").html("");
    var imgListArr=imgList.split("^");
    for (i in imgListArr) {
      //class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--teal-400'
       //style='width:50px;height:50px;padding:0.8px;margin:8px;'
      //$("#imgList").css("border","1px red solid");
      $img=$("<img id='img' src='adData/"+adId+"/thumbs/"+imgListArr[i]+"' onclick='goToMain("+adId+",\""+imgListArr[i]+"\")'>");
      $("#imgList").append($img);
      if (i==0) {
        goToMain(adId,imgListArr[i]);
      }
    }
  } else {
    goToMain(adId,"");
  }

  $areaTbl=$("<div></div>");
  $areaTbl=$("<table id='areaTbl' style='font-size:13px;font-weight:300;width:100%;' cellspacing='0' cellpadding='0' border='0'><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;padding-left:10px;' colspan='2'>"+lang(currLang,"State","Negeri")+"</td><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;'>"+lang(currLang,"City","Bandar")+"</td></table>");
  var areaListArr=areaList.split("^");
  for (j in areaListArr) {
    $areaTbl.append("<tr><td style='vertical-align:top;padding:2px;padding-left:10px;'>"+areaListArr[j].split(">")[0]+"</td><td style='vertical-align:top;padding:2px;'>&nbsp;&nbsp;&nbsp;></td><td style='padding:2px;'>"+areaListArr[j].split(">")[1]+"</td></tr>");
  }

  $jobTbl=$("<div></div>");
  var jobListArr=jobList.split("^");
  if (jobListArr!="") {
    $jobTbl=$("<table id='jobTbl' style='font-size:13px;font-weight:300;width:100%;' cellspacing='0' cellpadding='0' border='0'><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;padding-left:10px;'>Services</td><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;'>Price</td></table>");
    for (k in jobListArr) {
      $jobTbl.append("<tr><td style='padding:2px;padding-left:10px;'>"+jobListArr[k].split(">")[0].replace(new RegExp("//","g"),"/")+"</td><td style='width:30%;padding:2px;'>"+jobListArr[k].split(">")[1].replace(new RegExp("//","g"),"/")+"</td></tr>");
    }
  }

  // prep days and time
  //var daysTimeCont=days+" - "+timeStart+" - "+timeEnd;
  
  if ((timeStart!="0")&&(timeEnd!="0")&&(timeStart!="null")&&(timeEnd!="null")) {
    var genTime=timeStart+lang(currLang," to "," hingga ")+timeEnd; } else { var genTime="";
  }

  if (days!="") {
    var daysTimeCont=genDays(days);
    if ((daysTimeCont!="")&&(genTime!="")) {
      daysTimeCont=daysTimeCont+lang(currLang," from "," dari ")+genTime;
    }
  } else {
    //lang(currLang," from "," dari ")
    daysTimeCont=genTime;
  }
  
  
  // bookmark
  if (book!="") {
    //var bookImg="bookmarkcheck.png";
    var bookFunc="removeFromBookmark("+adId+","+usrSession+")";
    var bookImg="<span class='material-icons' onclick='"+bookFunc+"' style='font-size:35px;cursor:pointer;color:#f44336;'>bookmark</span>";
  } else {
    //var bookImg="bookmarkplus.png";
    var bookFunc="addToBookmark("+adId+")";
    var bookImg="<span class='material-icons' onclick='"+bookFunc+"' style='font-size:35px;cursor:pointer;'>bookmark_add</span>";
  }
  //var bookmark="<img src='img/"+bookImg+"' onclick='"+bookFunc+"' style='width:35px;cursor:pointer;'>";
  var bookmark=bookImg;

  $("#adMainTitle").html(titleCase(title));
  $("#usrNameCont").html(titleCase(usrName));
  $("#usrPhoneCont").html(usrPhone);
  $("#servTypeCont").html(servCat);
  $("#areaCont").html($areaTbl);
  $("#jobCont").html($jobTbl);
  $("#adBookmark").html(bookmark);
  $("#daysTimeCont").html(daysTimeCont);
  $("#descCont").html(desc);
  var chkSSM="";
  if (usrChkSSM=="1") { chkSSM="<img id='ssm' src='img/shield.png' width='16px' style='cursor:pointer;outline:none;'><div class='mdl-tooltip' for='ssm'>Registered with SSM</div>"; }
  $("#companyDet").html(chkSSM+" "+usrCompany);

  $("#quantityCont").html(quantity);
  if (condition=="used") { condition = lang(currLang,"Used","Terpakai"); } else { condition = lang(currLang,"New","Baru"); }
  $("#conditionCont").html(condition);
  $("#qualityCont").html(quality+"/10");

  $("#usrNameCont2").html(titleCase(usrName));
  $("#usrPhoneCont2").html(usrPhone);
  $("#servTypeCont2").html(servCat);
  $("#areaCont2").html($areaTbl.clone());
  $("#jobCont2").html($jobTbl.clone());
  $("#daysTimeCont2").html(daysTimeCont);
  $("#descCont2").html(desc);
  //$("#companyDet2").html(chkSSM+" "+usrCompany);


  componentHandler.upgradeAllRegistered();
  //$("#"+layer).html(data);
}

function addToBookmark(adId) {
  if (usrSession!="") {
    AjaxGo2("adViewStatus","addToBookmark",adId+"^"+usrSession,"bookStatus","process/svcView");
  } else {
    hideAdView();
    showUsrPanel("showAdView("+adId+")");
    displayStatus("Login or register to add this service to your favorite list.","adMainStatus");
  }
}

function removeFromBookmark(adId,usrId) {
  AjaxGo2("adViewStatus","removeFromBookmark",adId+"^"+usrId,"bookStatus","process/svcView");
}

function bookStatus(data,layer) {
  //alert(data);
  // action: 1=add, 2=remove
  var dataArr=data.split("^");
  var msg=dataArr[0];
  var action=dataArr[1];
  var adId=dataArr[2];
  var usrId=dataArr[3];
  var img=dataArr[4];
  var title=dataArr[5];

  displayStatus(msg,"adMainStatus");

  if (action==1) {  // add to bookmark
    //var bookImg="bookmarkcheck.png";
    var bookFunc="removeFromBookmark("+adId+","+usrId+")";
    //var bookmark="<img src='img/"+bookImg+"' onclick='"+bookFunc+"' style='width:35px;cursor:pointer;'>";
    var bookmark="<span class='material-icons' onclick='"+bookFunc+"' style='font-size:35px;cursor:pointer;color:#f44336;'>bookmark</span>";
    $("#adBookmark").empty();
    $("#adBookmark").html(bookmark);

    // add to usr panel
    if (img!="") { var path="adData/"+adId+"/"+img; } else { var path="img/blankimg.png"; }
    var clickView="onclick='showAdView("+adId+",\"showUsrPanel()\")'";

    //$adRow=$("<div id='fav"+adId+"' class='usrAdRow'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px' "+clickView+"><img src='"+path+"' class='usrAdImg'></td><td class='textNormal' "+clickView+">"+title+"</td><td width='40px'></td><div>");
    $adRow=$("<div id='fav"+adId+"' class='usrAdRow2'><table width='100%' height='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='50px' "+clickView+"><img src='"+path+"' class='usrAdImg'></td><td class='textNormal' style='width:100%;height:100%;overflow:hidden;white-space:nowrap' "+clickView+"><div style='border:0px red solid;margin-right:5px;overflow:hidden;'>"+titleCase(title.replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/"))+"</div></td><div>");
    $("#usrFavList").append($adRow);

    // add to ad view list
    var $book=$("<span class='material-icons' style='font-size:30px;color:#f44336;'>bookmark</span>");
    $("#favList"+adId).append($book);

  } else if (action==2) { // remove from bookmark
    //var bookImg="bookmarkplus.png";
    var bookFunc="addToBookmark("+adId+")";
    //var bookmark="<img src='img/"+bookImg+"' onclick='"+bookFunc+"' style='width:35px;cursor:pointer;'>";
    var bookmark="<span class='material-icons' onclick='"+bookFunc+"' style='font-size:35px;cursor:pointer;'>bookmark_add</span>";
    $("#adBookmark").empty();
    $("#adBookmark").html(bookmark);

    // remove from usr panel
    $("#fav"+adId).remove();

    // remove from ad view list
    $("#favList"+adId).empty();
  }

  // add/remove first line in usr panel
  var favCnt=$("#usrFavList > div").length;
  //if (favCnt==0) {
  //  $adRow=$("<div id='fav0' class='usrAdRow2' style='background:rgb(245,245,245);'><table width='100%' height='100%' border='0' cellspacing='0' cellpadding='0'><tr><td class='textNormal' style='padding:0px;'>Click on <img src='img/bookmarkplus.png' width='25px'> to add to favorite services!</td><div>");
  //  $("#usrFavList").append($adRow);
  //}
  /*if (favCnt==2) {
    $("#fav0").remove();
  }*/
}

function goToMain(adId,fileName) {

  $imgMain=$("<div style='position:relative;top:150px;border:0px red solid;vertical-align:middle;display:block;text-align:center;'><img id='' src='img/loading.gif' style='width:100px;'></div>");
  $("#imgMain").html($imgMain);
  $("#imgMain").css("visibility","visible");

  //var r = "?"+Math.floor(Math.random()*1111111111);
  var r="?";
  if (fileName=="") {
    var url = "img/blankimg.png"+r;
  } else {
    var url = "adData/"+adId+"/"+fileName+r+"'";
  }

  var img = new Image();
  img.id = "imgSel";
  img.src = url;
  img.onload = function(){
    $("#imgMain").empty();
    $("#imgMain").html(img);
    $("#imgSel").css("visibility","visible").hide().fadeIn(300);
    mainImgSize();
  }
}

function mainImgSize() {
  var maxWidth = "100%"; // Max width for the image
  var maxHeight = $("#imgMain").height();    // Max height for the image
  var ratio = 0;  // Used for aspect ratio
  var topPos = 0;
  var leftPos = 0;
  var width = $("#imgSel").width();    // Current image width
  var height = $("#imgSel").height();  // Current image height
  //$("imgSel").load(function(){
  //  var height = $(this).height();
  //});

  //alert(height);

  // Check if the current width is larger than max
  if(width > maxWidth){
      ratio = maxWidth / width;   // get ratio for scaling image
      $("#imgSel").css("width", maxWidth); // Set new width
      $("#imgSel").css("height", height * ratio);  // Scale height based on ratio
      height = height * ratio;    // Reset height to match scaled image
      width = width * ratio;    // Reset width to match scaled image
  }

  // Check if current height is larger than max
  if(height > maxHeight){
      ratio = maxHeight / height; // get ratio for scaling image
      $("#imgSel").css("height", maxHeight);   // Set new height
      $("#imgSel").css("width", width * ratio);    // Scale width based on ratio
      width = width * ratio;    // Reset width to match scaled image
      height = height * ratio;    // Reset height to match scaled image
  }

  //alert($("#imgSel").height()+"^"+maxHeight);

  // top position
  if (height < maxHeight) {
    topPos = (maxHeight-height)/2;
    $("#imgSel").css("position","relative");
    $("#imgSel").css("top",topPos);
  }

  if (width < maxWidth) {
    leftPos = (maxWidth-width)/2;
    $("#imgSel").css("position","relative");
    $("#imgSel").css("left",leftPos);
  }

}

function strip(string) {
  return string.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"").replace(/\s{2,}/g," ");
}

function genDays(days) {
  var ret="",msg="";
  var daysArr=days.split(",");
  if((daysArr.indexOf("1")!==-1)&&(daysArr.indexOf("2")!==-1)&&(daysArr.indexOf("3")!==-1)&&(daysArr.indexOf("4")!==-1)&&(daysArr.indexOf("5")!==-1)) {
    msg = lang(currLang,"Monday to Friday","Isnin hingga Jumaat")
    ret = msg;
  }
  if((daysArr.indexOf("1")!==-1)&&(daysArr.indexOf("2")!==-1)&&(daysArr.indexOf("3")!==-1)&&(daysArr.indexOf("4")!==-1)&&(daysArr.indexOf("5")!==-1)&&(daysArr.indexOf("6")!==-1)) {
    msg = lang(currLang,"Monday to Saturday","Isnin hingga Sabtu")
    ret = msg;
  }
  if((daysArr.indexOf("1")!==-1)&&(daysArr.indexOf("2")!==-1)&&(daysArr.indexOf("3")!==-1)&&(daysArr.indexOf("4")!==-1)&&(daysArr.indexOf("5")!==-1)&&(daysArr.indexOf("6")!==-1)&&(daysArr.indexOf("7")!==-1)) {
    msg = lang(currLang,"Everyday","Setiap hari")
    ret = msg;
  }
  if ((ret=="")&&(days!="")) {
    for (d=0;d<=daysArr.length-1;d++) {
      if (ret=="") { ret=convertDays(daysArr[d]); } else { ret=ret+", "+convertDays(daysArr[d]); }
    }
  }
  return ret;
}

function convertDays(no) {
  if (no=="1") { return lang(currLang,"Monday","Isnin"); }
  if (no=="2") { return lang(currLang,"Tuesday","Selasa"); }
  if (no=="3") { return lang(currLang,"Wednesday","Rabu"); }
  if (no=="4") { return lang(currLang,"Thursday","Khamis"); }
  if (no=="5") { return lang(currLang,"Friday","Jumaat"); }
  if (no=="6") { return lang(currLang,"Saturday","Sabtu"); }
  if (no=="7") { return lang(currLang,"Sunday","Ahad"); }
}

















//end
