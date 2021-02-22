var windowsize = $(window).width();

function initSearch() {
  $(document).ready(function(){
    loadAvailServType();
    loadAvailState();
    loadAvailArea(this);
    //alert();
    //setTimeout("srcService(1)",100);

    // search
    $("#srcWord").keyup(function(e) {
      var enterKey = 13;
      if (e.which == enterKey){
        srcService(1);
      }
    });

    //$("#srcWord").attr("placeholder", lang("bm","Search for items here...","Cari barang disini..."));
  });
}

function loadServType() {
  AjaxGo2("srcServType","loadServType","","listSrcServType","process/svcList");
}

function loadAvailServType() {
  AjaxGo2("srcServType","loadAvailServType","","listSrcServType","process/svcList");
}

function listSrcServType(data,layer) {
  var dataArr=data.split("||");
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];
    if (id=="") { id="",desc="All Service Type" }
    $("#"+layer).append("<option value="+id+">"+desc+"</option>");
  }
}




function loadState() {
  AjaxGo2("srcState","loadState","","listSrcState","process/svcList");
}

function loadAvailState() {
  AjaxGo2("srcState","loadAvailState","","listSrcState","process/svcList");
}

function listSrcState(data,layer) {
  var dataArr=data.split("||");
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];
    if (id=="") { id="",desc=lang(currLang,"All State","Semua Negeri"); }
    $("#"+layer).append("<option value="+id+">"+desc+"</option>");
  }
}

function loadArea(obj) {
  AjaxGo2("srcArea","loadArea",obj.value,"listSrcArea","process/svcList");
}

function loadAvailArea(obj) {
  if (!obj.value) { obj.value = ""; }
  AjaxGo2("srcArea","loadAvailArea",obj.value,"listSrcArea","process/svcList");
}

function listSrcArea(data,layer) {
  var dataArr=data.split("||");
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];    
    var state=dataArr[i].split("^")[2];
    if (id=="") { id="",desc=lang(currLang,"All City","Semua Bandar"); }
    $("#"+layer).append("<option value="+id+">"+desc+"</option>");
  }
  if (state!="") { srcService(1); }
}























// search

//main search function
function srcService(page) {
  var word=$("#srcWord").val();
  var servType=$("#srcServType").val();
  var state=$("#srcState").val();
  var area=$("#srcArea").val();

  if(windowsize>850) { var adsPerPage="16"; } else { var adsPerPage="10"; }

  var data=word+"^"+servType+"^"+state+"^"+area+"^"+page+"^"+adsPerPage;

  if ($(".menu").hasClass("open")==true) {
    hideDrawer();
  }

  currPage=page;
  AjaxGo2("adList","srcService",data,"adList","process/svcList");
}

function adList(data,layer) {
  //alert(data);
  var dataArr=data.split("|~|");
  var paging=dataArr[0];
  var record=dataArr[1];
  var sql=dataArr[2];
  //alert(sql);
  //$("#adListStatus").html(sql);
  //var row="<table class='mdl-data-table mdl-shadow--2dp' border='0' style='width:100%;'>";
  //var row="<table class='rowTbl' cellspacing='0' cellpadding='0' border='1' style='width:calc(100% + 1px);'>";

  var cell="",cntx=0,lastRow=0;
  //var colPerRow=4;
  if(windowsize>850) { var colPerRow="4"; } else { var colPerRow="2"; }
  var width=parseInt(100/colPerRow);

  var $filter = "<div class='menu mdl-js-button mdl-js-ripple-effect' onclick='toggleDrawer()'><span class='material-icons-outlined icon'>filter_alt</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filter</div>";
  $('#'+layer).append($filter);

  if ((record!="")&&(record!==undefined)) {
    cell="<div style='width:100%;border:0px red solid;'><table border='0' width='100%' class='rowTbl'>";

    var rec=record.split("|*|");
    for (i in rec) {
      cntx=parseInt(i)+1;
      if(i%colPerRow==0) {
        cell = cell+"<tr>";
        lastRow=1;
      }

      var itm=rec[i].split("|^|");
      var adId=itm[0];
      var adTitle=itm[1].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
      var adDesc=itm[2].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
      var imgName=itm[3];
      var usrName=itm[4];
      var usrPhone=itm[5];
      var jobList=itm[6];
      var bookmark=itm[7];
      var usrChkSSM=itm[8];

      // old
      //var row=genRow(adId,adTitle,adDesc,imgName,usrName,usrPhone);
      //$('#'+layer).append(row);

      // card
      //var row="<div class='demo-card-wide mdl-card mdl-shadow--2dp'><div class='mdl-card__title'><h2 class='mdl-card__title-text'>Welcome</h2></div>"
      //row=row+"<div class='mdl-card__supporting-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>"
      //row=row+"<div class='mdl-card__actions mdl-card--border'><a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Get Started</a></div>"
      //row=row+"<div class='mdl-card__menu'><button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'><i class='material-icons'>share</i></button></div></div><br>"

      cell=cell+"<td class='cellTbl' style='border-bottom:1px rgb(238,238,238) solid;width:"+width+"%;'>"+genCell(adId,adTitle,adDesc,imgName,usrName,usrPhone,jobList,bookmark,usrChkSSM)+"</td>";
      //genCell(adId,adTitle,adDesc,imgName,usrName,usrPhone,jobList,bookmark,usrChkSSM)

      if((cntx%colPerRow==0)&&(cntx!=1)) {
        cell = cell+"</tr>";
      }
      lastRow=lastRow+1;
      //alert(adId+"^"+adTitle+"^"+adDesc+"^"+imgName+"^"+usrName+"^"+usrPhone);
    }

    for (var x=0;x<colPerRow-(lastRow-1);x++) {
      cell=cell+"<td class='' style='width:"+width+"%;'></td>";
    }

    cell=cell+"</table></div>";
  } else {
    cell="<div class='cellTbl' style='border: 1px rgb(220,220,220) solid;height:100px;background:#ffffff;display:flex;width:calc(100% - 2px);'><div style='border:0px red solid; height:20px;margin:auto;'>"+lang(currLang,"No ads found","Tiada iklan dijumpai")+"</div></div>";
  }
    
  $cell=$(cell);
  $('#'+layer).append($cell);

  if(windowsize>850) {
  } else {
    // for mobile
    var maxAdWidth=(windowsize/colPerRow)-40;
    $(".line4").css("max-width",maxAdWidth+"px");

    //$("div.line4").css("maxWidth","10px");
  }

  center_relocate();
  
  if(windowsize>850) {
    var maxPage=5;
  } else {
    var maxPage=3;
  }

  srcPaging(paging,"1",maxPage);
  srcPaging(paging,"2",maxPage);

  $("#adMainCont").scrollTop(0);
}

function maxLen(text,no) {
  return text.substring(0,no);
}

function genCell(adId,adTitle,adDesc,imgName,usrName,usrPhone,jobList,bookmark,usrChkSSM) {
  var line="";
    if (imgName!="") {
      //var imgUrl="adData/"+adId+"/thumbs/"+imgName;
      var imgUrl="adData/"+adId+"/"+imgName;
  } else {
    var imgUrl="img/blankimg.png";
  }
    adDesc=adDesc.replace(new RegExp("<br>","g")," ");
    adDesc=adDesc.replace(new RegExp(",","g"),", ");
    adDesc=adDesc.replace(new RegExp("  ","g")," ");

    //$row=$("<div class='row' id='row_"+adId+"'></div>");
    //  $tblDesc=$("<div class='adListTblCont'><table cellspacing='0' cellpadding='0' border='0' class='adListTbl'><tr><td rowspan='2' width='100px'><div class='imgDiv'><img class='imgThumb' src='"+imgUrl+"'></div></td><td class='adListTitleTD' onclick='showAdViewCont("+adId+");'><div class='adListTitle'>"+adTitle+"</div></td><td rowspan='2' style='width:120px;'><div class='adListSide'>"+usrName+" ("+usrPhone+")</div></td></tr><tr><td class='adListDescTD' onclick='showAdViewCont("+adId+");'><div class='adListDesc'>"+adDesc+"</div></td></tr></table></div>");

    //$row.append($tblDesc);

    //var divEdit="<button onclick='showAdEdit("+adId+")'>Edit</button>";
    if (bookmark!="") { var book="<span class='material-icons' style='font-size:30px;color:#f44336;'>bookmark</span>"; } else { var book=""; }
    if (usrChkSSM=="1") { var ssm="<img src='img/shield.png' style='width:25px;'>"; } else { var ssm=""; }


    line=line+"<div class='col1' style='border:0px red solid;' onclick='showAdView("+adId+");'>";
      line=line+"<img width='100%' height='100%' src='"+imgUrl+"'>";
      line=line+"<div class='line2' id='favList"+adId+"'>"+book+"</div>";
    line=line+"</div>";
    
    //line=line+"<div class='col2' style='border:1px blue solid;' onclick='showAdView("+adId+");'>";
    //line=line+"<div id='ssmList"+adId+"' style='position:relative;float:right;right:-5px;top:0px;border:1px yellow solid;'>"+ssm+"</div></div>";
    if(windowsize>850) { var txtLen = 24; } else { var txtLen = 20; }
    line=line+"<div class='line1' onclick='showAdView("+adId+");'>";
      line=line+"<div class='line3' onclick='showAdView("+adId+");'>"+maxLen(titleCase(usrName),txtLen)+"<br>"+usrPhone+"</div>";
    line=line+"</div>";

    line=line+"<div class='line4' onclick='showAdView("+adId+");'>"+titleCase(adTitle)+"</div>";

    //line=line+"<div class='' onclick='showAdView("+adId+");'><div style='border:0px blue solid;position:relative;display:block;overflow:hidden;min-width:10px;'>"+adDesc+"</div></div>";
    //line=line+"<div id='col2' onclick='showAdView("+adId+");'><img src='img/star48b.png' width='30px'><img src='img/star48b.png' width='30px'><img src='img/star48b.png' width='30px'></div>";
    //line=line+"<div id='col3' onclick='showAdView("+adId+");'><img src='img/star48b.png' width='10px'><img src='img/star48b.png' width='10px'><img src='img/star48b.png' width='10px'></div>";

    // edit line
    //line=line+"<tr><td>"+divEdit+"</td></tr>"

    /*line="<tr onclick='showAdView("+adId+");'>";
    line=line+"<td rowspan='3' style='width:100px;padding:10px;'><img src='"+imgUrl+"' style='width:80px; height:80px; padding:0px;box-sizing: border-box;border-radius: 50% 50%;box-shadow: black 0px 0px 3px;'></td>";
    line=line+"<td id='line1'>"+adTitle+"</td>";
    line=line+"<td rowspan='3' id='col2'><img src='img/star48b.png' width='30px'><img src='img/star48b.png' width='30px'><img src='img/star48b.png' width='30px'></td></tr>";
    line=line+"<tr onclick='showAdView("+adId+");'><td id='line2'><div style='border:1px blue solid;position:relative;display:block;overflow:hidden;min-width:10px;'>"+jobList+"</div></td></tr>";
    line=line+"<tr onclick='showAdView("+adId+");'><td id='line3'>"+usrName+" ("+usrPhone+")</td></tr>";*/

    return line;
}

function srcPaging(paging,pos,maxPage) {
  // paging = paging data from db
  // pos = which div to display ie: paging1, paging2
  // maxPage = how many numbers to show before showing dots ...
  var pagingArr=paging.split("|^|");
  var recNo=pagingArr[0];
  var pageCnt=pagingArr[1];
  var limit=pagingArr[2];
  var offset=pagingArr[3];
  var pageNo=parseInt(pagingArr[4]);
  $arrows=$("<span></span>");

  //alert(recNo+"^"+pageCnt+"^"+limit+"^"+offset+"^"+pageNo);

  

  var start=parseInt(pageNo-(Math.floor(maxPage/2)));
  var end=pageNo+(Math.floor(maxPage/2));

  if (start<=1){ start=1; }
  else {
    if (pageNo>=maxPage){
      if (pageNo>=(pageCnt-(Math.floor(maxPage/2)-1))){
        start=pageCnt-(maxPage-1);
      }
    //} else {
    //  start=pageCnt-(pageCnt-1);
    }
  }

  //$("#srcWord").attr("placeholder",pageNo+"^"+pageCnt+"^"+start+"^"+end+">>>"+Math.floor(maxPage/2));

  //end
  if ((pageCnt>=maxPage)&&(end<=maxPage)) { end=maxPage; }
  else {
    if ((pageCnt<=maxPage)&&(end<=maxPage)) { end=pageCnt; }
  }
  if (parseInt(end)>=parseInt(pageCnt)) { end=pageCnt; }


  $("#paging"+pos).empty();

  if (parseInt(recNo)!=0) {

    var recStart=(parseInt(offset)+1);
    if (recStart>recNo) { recStart=recNo; }
    var recEnd=(parseInt(limit)*pageNo);
    if (recEnd>recNo) { recEnd=recNo; }

    // previous
    var prev=(parseInt(pageNo)-1);
    if (prev>=1) { var prevFunc="srcService(1);",disable="style='color:#555;'"; } else { var prevFunc="",disable="style='color:#9E9E9E;'"; }
    var doubleLeft="<span class='material-icons-outlined arrowIcon' "+disable+">first_page</span>";
    $pg=$("<span onclick='"+prevFunc+"' class='pgArrow'>"+doubleLeft+"</span>");
    $arrows.append($pg);

    if (prev>=1) { var prevFunc="srcService("+prev+");",disable="style='color:#555;'"; } else { var prevFunc="",disable="style='color:#9E9E9E;'"; }
    var left="<span class='material-icons-outlined arrowIcon' "+disable+">chevron_left</span>";
    $pg=$("<span onclick='"+prevFunc+"' class='pgArrow'>"+left+"</span>");
    $arrows.append($pg);

    //alert(pageNo+"<"+pageCnt);
    //if ((pageNo>(maxPage-1))&&((pageNo<pageCnt+1)&&(pageCnt>maxPage))) {
    if (pageNo>(Math.floor(maxPage/2)+1)) {
    $pg=$("<div class='pgDot'>...</div>");
      $arrows.append($pg);
    } else {
      $pg=$("<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>");
      $arrows.append($pg);
    }

      // pages
      for (var i=start-1;i<end;i++) {
        var page=i+1;
        if (page==pageNo) { var num="<div class='pgSel'>"+page+"</div>"; } else { var num="<div class='pg'>"+page+"</div>"; }
        $pg=$("<div onclick='srcService("+(page)+");' class='pgCont'>"+num+"</div>");
        $arrows.append($pg);
      }

    //if ((pageCnt>maxPage)&&(pageNo<pageCnt-(maxPage-2))) {
      if (pageNo<pageCnt-(Math.floor(maxPage/2))) {
      $pg=$("<div class='pgDot'>...</div>");
      $arrows.append($pg);
    } else {
      $pg=$("<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>");
      $arrows.append($pg);
    }

    // next
    var next=(parseInt(pageNo)+1);
    if (next<=page) { var nextFunc="srcService("+next+");",disable="style='color:#555;'"; } else { var nextFunc="",disable="style='color:#9E9E9E;'"; }
    
    var right="<span class='material-icons-outlined arrowIcon' "+disable+">chevron_right</span>";
    $pg=$("<span onclick='"+nextFunc+"' class='pgArrow'>"+right+"</span>");
    $arrows.append($pg);

    if (next<=page) { var nextFunc="srcService("+pageCnt+");",disable="style='color:#555;'"; } else { var nextFunc="",disable="style='color:#9E9E9E;'"; }
    
    var doubleRight="<span class='material-icons-outlined arrowIcon' "+disable+">last_page</span>";
    $pg=$("<span onclick='"+nextFunc+"' class='pgArrow'>"+doubleRight+"</span>");
    $arrows.append($pg);

    // rec x to y of z

    if (recNo==1) { recNo=recNo+" "+lang(currLang,"ad","iklan"); }
    else { recNo=recNo+" "+lang(currLang,"ads","iklan"); }
    //$pg=$("<span> Showing "+recStart+" to "+recEnd+" out of "+recNo+" found</span>");
    //$pg=$("<span>"+recNo+" "+lang(currLang,"found","dijumpai")+"</span>");
    $pg=$("<span class='pgText'>"+recNo+"&nbsp;&nbsp;</span>");
    $("#paging"+pos).append($pg);
    
  } else {
    //$pg=$("<span>"+lang(currLang,"0 ad","tiada iklan")+"</span>");
    //$("#paging").append($pg);
  }
  
  $("#paging"+pos).append($arrows);
}

/*function srcPagingOri(paging) {
  var pagingArr=paging.split("|^|");
  var recNo=pagingArr[0];
  var pageCnt=pagingArr[1];
  var limit=pagingArr[2];
  var offset=pagingArr[3];
  var pageNo=pagingArr[4];
  $arrows=$("<span></span>");

  //alert(recNo+"^"+pageCnt+"^"+limit+"^"+offset+"^"+pageNo);

  $("#paging").empty();

  if (parseInt(recNo)!=0) {

    var recStart=(parseInt(offset)+1);
    if (recStart>recNo) { recStart=recNo; }
    var recEnd=(parseInt(limit)*pageNo);
    if (recEnd>recNo) { recEnd=recNo; }

    // previous
    var prev=(parseInt(pageNo)-1);
    if (prev>=1) { var prevFunc="srcService(1);"; } else { var prevFunc=""; }
    $pg=$("<span onclick='"+prevFunc+"'><div class='pg'><img src='img/doubleleft.png' style='width:20px;'></div></span>");
    $arrows.append($pg);

    if (prev>=1) { var prevFunc="srcService("+prev+");"; } else { var prevFunc=""; }
    $pg=$("<span onclick='"+prevFunc+"'><div class='pg'><img src='img/left.png' style='width:20px;'></div></span>");
    $arrows.append($pg);

      // pages
      for (var i=0;i<=pageCnt-1;i++) {
        var page=i+1;
        if (page==pageNo) { var num="<div class='pgSel'>"+page+"</div>"; } else { var num="<div class='pg'>"+page+"</div>"; }
        $pg=$("<span onclick='srcService("+(page)+");'>"+num+"</span>");
        $arrows.append($pg);
      }

    // next
    var next=(parseInt(pageNo)+1);
    if (next<=page) { var nextFunc="srcService("+next+");"; } else { var nextFunc=""; }
    $pg=$("<span onclick='"+nextFunc+"'><div class='pg'><img src='img/right.png' style='width:20px;'></div></span>");
    $arrows.append($pg);

    if (next<=page) { var nextFunc="srcService("+page+");"; } else { var nextFunc=""; }
    $pg=$("<span onclick='"+nextFunc+"'><div class='pg'><img src='img/doubleright.png' style='width:20px;'></div></span>");
    $arrows.append($pg);

    // rec x to y of z

    if (recNo==1) { recNo=recNo+" service"; }
    else { recNo=recNo+" services"; }
    //$pg=$("<span> Showing "+recStart+" to "+recEnd+" out of "+recNo+" found</span>");
    $pg=$("<span>"+recNo+" found </span>");
    $("#paging").append($pg);
  } else {
    $pg=$("<span>0 services found</span>");
    $("#paging").append($pg);
  }

  $("#paging").append($arrows);

}*/























//end
