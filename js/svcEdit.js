var areaCnt="1";
var jobCnt="1";
var imgCnt = "";

function initForm() {
  loadServTypeEdit();
  loadStateEdit(1);
  loadTime();
}




// save

function saveAd(next) {
  var adId=$("#adId").val();
  var servType=$("#servTypeEdit").val();
  var adTitle=$("#adTitle").val();
  var adDesc=$("#adDesc").val();
  adDesc = adDesc.replace(/\r\n|\r|\n/g,"<br>");

  var state1=$("#state1").val();
  var area1=$("#area1").val();

  var job1=$("#job1").val();
  var price1=$("#price1").val();

  var quantity=$("#quantity").val();
  var condition=$("input[name='condition']:checked").val();
  var quality=$("#quality").val();
  
  var days="",daysArr="";
  for (var i=1;i<=7;i++) {
    if ($("#d"+i).prop("checked")==true) {
      days="1";
      if (daysArr=="") { daysArr=i; } else { daysArr=daysArr+","+i; }
    }
  }

  var timeStart=$("#timeStart").val();
  var timeEnd=$("#timeEnd").val();

  var usrId=$("#usrId").val();
  var usrEmail=$("#usrEmail").val();
  var usrPassword=$("#usrPassword").val();
  var usrPassword2=$("#usrPassword2").val();
  var usrName=$("#usrName").val();
  var usrPhone=$("#usrPhone").val();
  var usrSSM=$("#usrSSM").val();
  var usrCompany=$("#usrCompany").val();

  if (checkEmpty(adTitle,lang(currLang,"Please enter 'Title'","Sila masukkan 'Tajuk'"),"adTitle")) {
    if (checkEmpty(servType,lang(currLang,"Please select 'Category'","Sila pilih 'Ketegori'"),"servTypeEdit")) {
        if (checkEmpty(state1,lang(currLang,"Please select at least one 'State'","Sila pilih sekurang-kurangnya satu negeri"),"state1")) {
          if (checkEmpty(fileCnt,lang(currLang,"Please attach at least one image","Sila masukkan sekurang-kurangnya satu gambar"),"file1")) {
            //if (checkEmpty(area1,"Please select at least one 'Area'","area1")) {  // allow all areas
            if (checkEmpty(quantity,lang(currLang,"Please enter 'Quantity'","Sila masukkan kuantiti"),"quantity")) {
              if (checkEmpty(usrEmail,lang(currLang,"Please enter your 'Email'","Sila masukkan 'Emel'"),"usrEmail")) {
                if (checkEmpty(usrPassword,lang(currLang,"Please enter your 'Password'","Sila masukkan 'Katalaluan'"),"usrPassword")) {
                  if (checkEmpty(usrPassword2,lang(currLang,"Please reenter your 'Password'","Sila ulang 'Katalaluan'","usrPassword2"))) {
                    if ((usrPassword!="")&&(usrPassword2!="")) {
                      if (comparePass(usrPassword,usrPassword2,lang(currLang,"Password does not match","Katalaluan tidak sama"),"usrPassword2")) {
                        if (checkEmpty(usrName,lang(currLang,"Please enter your 'Name'","Sila masukkan 'Nama'"),"usrName")) {
                          if (checkEmpty(usrPhone,lang(currLang,"Please enter your 'Phone Number'","Sila masukkan 'Nombor Telefon'"),"usrPhone")) {
                            if (checkNumber(usrPhone,lang(currLang,"Phone Number must only have numbers","Nombor telefon mesti mengandungi nombor sahaja"),"usrPhone")) {
                              if (checkPhone(usrPhone,lang(currLang,"Wrong format for Phone Number","Format Nombor Telefon tidak betul"),"usrPhone")) {
                                
                                // prep area
                                var areaData="";
                                if (areaCnt!="") {
                                  for (i in areaCnt.split(",")) {
                                    var no=areaCnt.split(",")[i];
                                    var state=$("#state"+no).val();
                                    var area=$("#area"+no).val();
                                    if ((state!=0)&&(state!="0")&&(state!="")&&(area!="")) {
                                      if (areaData=="") { areaData=area+"|~|"+state; } else { areaData=areaData+"|*|"+area+"|~|"+state; }
                                    }
                                  }
                                }

                                // prep job
                                var jobData="";
                                if (jobCnt!="") {
                                  for (j in jobCnt.split(",")) {
                                    var no=jobCnt.split(",")[j];
                                    var job=$("#job"+no).val();
                                    var price=$("#price"+no).val();
                                    if ((job!="")&&(price!="")) {
                                      if (jobData=="") { jobData=job+"|~|"+price; } else { jobData=jobData+"|*|"+job+"|~|"+price; }
                                    }
                                  }
                                }

                                // prep image
                                var imgCnt="";
                                var imgData = new FormData();
                                if (files!="") {
                                  $.each(files, function(key, value) {
                                    imgData.append(key, value);
                                    if (imgCnt=="") { imgCnt=(parseInt(key)+1); } else { imgCnt=imgCnt+"|*|"+(parseInt(key)+1); }
                                  });
                                }

                                //alert(adDesc+"^"+escapeHtml(adDesc));

                                var layer="adMainStatus";
                                if (imgCnt=="") { files=""; }
                                var data=servType+"|^|"+escapeHtml(adTitle)+"|^|"+escapeHtml(adDesc)+"|^|"+usrId+"|^|"+escapeHtml(usrEmail)+"|^|"+md5(usrPassword)+"|^|"+usrName+"|^|"+usrPhone+"|^|"+adId+"|^|"+daysArr+"|^|"+timeStart+"|^|"+timeEnd+"|^|"+areaData+"|^|"+jobData+"|^|"+files+"|^|"+imgCnt+"|^|"+escapeHtml(usrSSM)+"|^|"+escapeHtml(usrCompany)+"|^|"+quantity+"|^|"+condition+"|^|"+quality+"|$|"+next;

                                //alert(imgCnt);

                                loadButtonOn("saveAd");
                                $("#clearAd").prop("disabled",true);
                                // verify user if usr already exists
                                if (usrId!="") {
                                  AjaxGo2(layer,"chkPass",data+"|@|"+usrId+"|@|"+md5(usrPassword),"postChkPass","process/svcEdit",imgData);
                                } else {
                                  AjaxGo2(layer,"saveAd",data,"saveAdCont","process/svcEdit",imgData);
                                }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
        //}
      }
    }
  }
}

function postChkPass(data,layer) {
  var dataArr=data.split("|@|");
  var pass=dataArr[0];
  var param=escapeHtml(dataArr[1]);

  if (pass==1) {
    // prep image
    var imgCnt="";
    var imgData = new FormData();
    if (files!="") {
      $.each(files, function(key, value) {
        imgData.append(key, value);
        if (imgCnt=="") { imgCnt=(parseInt(key)+1); } else { imgCnt=imgCnt+"|*|"+(parseInt(key)+1); }
      });
    }
    loadButtonOn("saveAd");
    $("#clearAd").prop("disabled",true);
    AjaxGo2(layer,"saveAd",param,"saveAdCont","process/svcEdit",imgData);
  } else if (pass==0) {
    loadButtonOff("saveAd","Save");
    $("#clearAd").prop("disabled",false);
    displayStatus("Password entered is wrong","adMainStatus");
    document.getElementById("usrPassword").focus();
  } else {
    //10485760
    loadButtonOff("saveAd","Save");
    $("#clearAd").prop("disabled",false);
    displayStatus("Image exceeded maximum file size","adMainStatus");
  }
}

function saveAdCont(adContData,adContLayer) {
  var adId=adContData.split("^")[0];
  var msg=adContData.split("^")[1];
  var next=adContData.split("^")[2];
  //alert(adContData);
  if ((msg=="Saved")||(msg=="Updated")) {
    displayStatus(msg,adContLayer);
    hideAdEdit();
    hideOverlay(next);
    clearAdEdit();
    // to update usr panel and top bar if logged in
    if (usrSession!="") {
      AjaxGo2("usrPanelStatus","popUsrPanel",usrSession+"|^|2","postLogin","process/svcUser");
    } else {
      // reload adlist to add the new entered ad
      srcService(currPage);
    }
  } else {
    displayStatus(msg,"adMainStatus");
  }
  loadButtonOff("saveAd","Save");
  $("#clearAd").prop("disabled",false);

  //if ((($('#file1').val()!="")||($('#file2').val()!="")||($('#file3').val()!=""))&&((adId!="")&&(adId!="0"))) {
  //  uploadFiles(adId,adContLayer);
  //}
}

function clearAdEdit() {
  $("#adId").val("");
  $("#servTypeEdit").val("");
  $("#adTitle").val("");
  $("#adDesc").val("");
  $("#img1").attr("src","");
  $("#img2").attr("src","");
  $("#img3").attr("src","");
  $("#img4").attr("src","");
  $("#img5").attr("src","");
  $("#quantity").val("");
  $("#newCond").attr("checked","checked");
  $("#quality").val("10");
  $("#file1").val("");
  $("#file2").val("");
  $("#file3").val("");
  $("#file4").val("");
  $("#file5").val("");
  $("#state1").val(0);
  $("#area1").empty();
  $("#area1").val("");
  $("#area1").val("");
  // tofix
  $('#area1').append($("<option></option>").attr("value","").text(lang(currLang,"Select City","Pilih Bandar")));

  $("#job1").val("");
  $("#price1").val("");
  $("#timeStart").val(0);
  $("#timeEnd").val(0);
  $("#usrId").val("");
  if (usrSession=="") {
    $("#usrEmail").val("");
  }
  $("#usrPassword").val("");
  $("#usrPassword2").val("");
  //$("#usrName").val("");
  //$("#usrPhone").val("");
  $("#usrSSM").val("");
  $("#usrCompany").val("");
  $("#usrSSM").prop("disabled",false);
  $("#usrCompany").prop("disabled",false);

  var lastArea=areaCnt.split(",")[areaCnt.split(",").length-1];
  var lastJob=jobCnt.split(",")[jobCnt.split(",").length-1];
  for (var x=2;x<=lastArea;x++) {
    removeArea(x);
  }
  for (var x=2;x<=lastJob;x++) {
    removeJob(x);
  }

  // reset
  areaCnt="1";
  jobCnt="1";
  imgData="";
  imgCnt="";
  files = {};

  for (var i=0;i<=7;i++) {
    $("#d"+i).prop("checked",false);
  }

  $("#saveAd").prop("disabled",false);
  $("#clearAd").prop("disabled",false);
}




function getAdEditDetails(adId) {
  AjaxGo2("adMainStatus","getAdEditDetails",adId,"populateAdEdit","process/svcEdit");
}

function populateAdEdit(data,layer) {
  //alert(data);
  //$adId."||".$title."||".preg_replace('~/+~', '/', $desc)."||".$usrorId."||".$usrorName."||".$usrorPhone."||".$usrorEmail."||".$servCatId."||".$imgList."||".$areaList."||".$jobList."||".$days."||".$timeStart."||".$timeEnd;
  var dataArr=data.split("||");
  var adId=dataArr[0];
  var title=dataArr[1].replace(new RegExp("//","g"),"/").replace(new RegExp("//","g"),"/");
  var desc=dataArr[2];
  var usrId=dataArr[3];
  var usrName=dataArr[4];
  var usrPhone=dataArr[5];
  var usrEmail=dataArr[6];
  var servCat=dataArr[7];
  var imgList=dataArr[8];
  var areaList=dataArr[9];
  var jobList=dataArr[10];
  var days=dataArr[11];
  var timeStart=dataArr[12];
  var timeEnd=dataArr[13];
  var usrSSM=dataArr[14];
  var usrCompany=dataArr[15];
  var usrChkSSM=dataArr[16];
  var quantity=dataArr[17];
  var condition=dataArr[18];
  var quality=dataArr[19];

  $("#adId").val(adId);
  $("#servTypeEdit").val(servCat);
  $("#adTitle").val(title);
  desc=desc.replace(new RegExp("<br>","g"),"\n");
  $("#adDesc").val(desc);
  $("#timeStart").val(timeStart);
  $("#timeEnd").val(timeEnd);

  // days
  var daysArr=days.split(",");
  for (var i=0;i<=daysArr.length-1;i++) {
    $("#d"+daysArr[i]).prop("checked",true);
  }
  if (daysArr.length==7) {
      $("#d0").prop("checked",true);
  }

  addEditArea(areaList);
  addEditJob(jobList);
  addEditImage(imgList,adId);

  $("#quantity").val(quantity);
  if (condition=="") { condition="new"; }
  if (condition=="used") {
    $("#newCond").removeAttr("checked");
    $("#usedCond").prop("checked","checked");
    $("#quality").prop("disabled",false);
  } else {
    $("#usedCond").removeAttr("checked");
    $("#newCond").prop("checked","checked");
    $("#quality").prop("disabled",true);
  }
  if (quality=="") { quality="10"; }
  $("#quality").val(quality);

  $("#usrId").val(usrId);
  $("#usrEmail").val(usrEmail);
  $("#usrName").val(usrName);
  $("#usrPhone").val(usrPhone);
  $("#usrSSM").val(usrSSM);
  $("#usrCompany").val(usrCompany);
  if (usrChkSSM=="1") {
    $("#usrSSM").prop("disabled",true);
    $("#usrCompany").prop("disabled",true);
  } else {
    $("#usrSSM").prop("disabled",false);
    $("#usrCompany").prop("disabled",false);
  }

  /*


  $areaTbl=$("<table style='font-size:13px;font-weight:300;width:100%;' cellspacing='0' cellpadding='0' border='0'><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;padding-left:10px;' colspan='2'>State</td><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;'>Area</td></table>");
  var areaListArr=areaList.split("^");
  for (j in areaListArr) {
    $areaTbl.append("<tr><td style='vertical-align:top;padding:2px;padding-left:10px;'>"+areaListArr[j].split(">")[0]+"</td><td style='vertical-align:top;padding:2px;'>&nbsp;&nbsp;&nbsp;></td><td style='padding:2px;'>"+areaListArr[j].split(">")[1]+"</td></tr>");
  }

  $jobTbl=$("<table style='font-size:13px;font-weight:300;width:100%;' cellspacing='0' cellpadding='0' border='0'><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;padding-left:10px;'>Services</td><td style='padding:2px;border-bottom:1px rgb(230,230,230) solid;font-weight:400;'>Price</td></table>");
  var jobListArr=jobList.split("^");
  for (k in jobListArr) {
    $jobTbl.append("<tr><td style='padding:2px;padding-left:10px;'>"+jobListArr[k].split(">")[0]+"</td><td style='width:30%;padding:2px;'>"+jobListArr[k].split(">")[1]+"</td></tr>");
  }

  var daysTimeCont=days+" - "+timeStart+" - "+timeEnd;*/


  //$("#"+layer).html(data);
}

function addEditArea(areaList) {
  var areaListArr=areaList.split("^");

  for (i in areaListArr) {
    var state=areaListArr[i].split(">")[0];
    var area=areaListArr[i].split(">")[1];
    var newCnt=parseInt(i)+1;
    if (i!=0) {
      areaCnt=areaCnt+","+newCnt;
      var newSelect="<div id='loc"+newCnt+"'style='padding-top:1px;'><select id='state"+newCnt+"' onchange='loadAreaEdit(this,"+newCnt+");' style='width:30%;'></select>&nbsp;<select id='area"+newCnt+"' style='width:50%;'><option value='0'>Select Area</option></select>&nbsp;<button id='areaButton"+newCnt+"'>-</button></div>";
      $("#areaList").append(newSelect);
      $("#areaButton"+newCnt).attr("onclick","removeArea("+newCnt+")");
    }
    loadStateEdit(newCnt,state);
    loadAreaEdit("",newCnt,state,area);
  }
}

function addEditJob(jobList) {
  var jobListArr=jobList.split("^");

  for (i in jobListArr) {
    var job=jobListArr[i].split(">")[0].replace(new RegExp("//","g"),"/");
    var price=jobListArr[i].split(">")[1].replace(new RegExp("//","g"),"/");
    var newCnt=parseInt(i)+1;
    if (i==0) {
      $("#job1").val(job);
      $("#price1").val(price);
    } else {
      jobCnt=jobCnt+","+newCnt;
      var newServ="<div id='serv"+newCnt+"' style='padding-top:2px;'><input id='job"+newCnt+"' value='"+job+"' style='width:50%;' placeholder='Service'>&nbsp;<input id='price"+newCnt+"' value='"+price+"' style='width:30%;' placeholder='Price'>&nbsp;<button id='jobButton"+newCnt+"'>-</button></div>";
      $("#jobList").append(newServ);
      $("#jobButton"+newCnt).attr("onclick","removeJob("+newCnt+")");
    }
  }
}

function addEditImage(imgList,adId) {
  var imgListArr=imgList.split("^");
  for (i in imgListArr) {
    fileCnt=1;
    var name=imgListArr[i].split(">")[0];
    var pos=imgListArr[i].split(">")[1];
    var thumbPath="adData/"+adId+"/thumbs/"+name;
    $("#img"+pos).attr("src",thumbPath);
  }
}





// service type

function loadServTypeEdit() {
  AjaxGo2("servTypeEdit","loadServType","","listServTypeEdit","process/svcEdit");
}

function listServTypeEdit(data,layer) {
  var dataArr=data.split("||");
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];
    if (id=="") { id="",desc=lang(currLang,"Select Category","Pilih Kategori"); }
    $("#"+layer).append("<option value="+id+">"+desc+"</option>");
  }
}







// area

function loadStateEdit(no,selected) {
  AjaxGo2("state"+no,"loadState",selected,"listStateEdit","process/svcEdit");
}

function listStateEdit(data,layer) {
  var dataArr=data.split("|~|")[0].split("||");
  var selected=data.split("|~|")[1];
  //alert(selected+"^"+layer);
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];
    if (id=="") { id="0",desc=lang(currLang,"Select State","Pilih Negeri"); }
    if ((selected!="")&&(selected!=undefined)) { if (selected==id) { var sel="selected"; } else { var sel=""; } }
    $("#"+layer).append("<option value="+id+" "+sel+">"+desc+"</option>");
  }
}

function loadAreaEdit(obj,no,stateVal,areaVal) {
  //alert(obj+"^"+no+"^"+stateVal+"^"+areaVal);
  if ((stateVal!="")&&(stateVal!=undefined)) { var objVal=stateVal; } else { objVal=obj.value; }
  AjaxGo2("area"+no,"loadArea",objVal+"^"+areaVal,"listArea","process/svcEdit");
}

function listArea(data,layer) {
  var dataArr=data.split("|~|")[0].split("||");
  var selected=data.split("|~|")[1];
  //alert(selected+"^"+layer);
  for (i in dataArr) {
    var id=dataArr[i].split("^")[0];
    var desc=dataArr[i].split("^")[1];
    if (id=="") { id="0",desc=lang(currLang,"All Area","Semua Kawasan") }
    if ((selected!="")&&(selected!=undefined)) { if (selected==id) { var sel="selected"; } else { var sel=""; } }
    $("#"+layer).append("<option value="+id+" "+sel+">"+desc+"</option>");
  }
}

function addArea() {
  var areaCntArr=areaCnt.split(",");
  var last="";
  for (i in areaCntArr) {
    last=areaCntArr[i];
  }
  if (areaCntArr.length<=4) {
    $("#areaButton"+last).html("-");
    $("#areaButton"+last).unbind("onclick");
    $("#areaButton"+last).attr("onclick","removeArea("+last+");");
  }

  if (($("#loc"+newCnt).length!=1)&&(areaCntArr.length<=4)) {
    var newCnt=parseInt(last)+1;
    areaCnt=areaCnt+","+newCnt;
    //$("#areaCnt").val(areaCnt);

    var newSelect="<div id='loc"+newCnt+"' style='padding-top:1px;'><select id='state"+newCnt+"' class='selectValue' onchange='loadAreaEdit(this,"+newCnt+");' style='width:37%;'></select>&nbsp;&nbsp;&nbsp;<select id='area"+newCnt+"' class='selectValue' style='width:45%;'><option value='0'>"+lang(currLang,"Select City","Pilih Bandar")+"</option></select>&nbsp;&nbsp;<button id='areaButton"+newCnt+"' class='smallButton' style='height:23px;'>-</button></div>";
    $("#areaList").append(newSelect);
    $("#areaButton"+newCnt).attr("onclick","removeArea("+newCnt+")");
    loadStateEdit(newCnt);
  }
}

function removeArea(no) {
  if ($("#loc"+no)) {
    $("#loc"+no).remove();
    areaCnt=areaCnt.replace(","+no,"");
  }
}

// days

function checkAllDays() {
  if ($("#d0").prop("checked")==true) {
    for (var i=1;i<=7;i++) {
      $("#d"+i).prop("checked",true);
    }
  } else {
    for (var i=1;i<=7;i++) {
      $("#d"+i).prop("checked",false);
    }
  }
}

function checkOtherDays() {
  var chk="1";
  for (var i=1;i<=7;i++) {
    if ($("#d"+i).prop("checked")==false) { chk="0"; }
  }
  if (chk=="1") { $("#d0").prop("checked",true); } else { $("#d0").prop("checked",false); }
}



// time

function loadTime() {
  var def="";
  for (var i=1;i<=12;i++) {
    var time=i+".00 a.m.";
    $("#timeStart").append("<option value='"+time+"'>"+time+"</option>");
    $("#timeEnd").append("<option value='"+time+"'>"+time+"</option>");
  }
  for (var i=1;i<=12;i++) {
    var time=i+".00 p.m.";
    $("#timeStart").append("<option value='"+time+"'>"+time+"</option>");
    $("#timeEnd").append("<option value='"+time+"'>"+time+"</option>");
  }
}



// services

function addJob() {
  var jobCntArr=jobCnt.split(",");
  var last="";
  for (i in jobCntArr) {
    last=jobCntArr[i];
  }
  if (jobCntArr.length<=9) {
    $("#jobButton"+last).html("-");
    $("#jobButton"+last).unbind("onclick");
    $("#jobButton"+last).attr("onclick","removeJob("+last+");");
  }

  if (($("#serv"+newCnt).length!=1)&&(jobCntArr.length<=9)) {
    var newCnt=parseInt(last)+1;
    jobCnt=jobCnt+","+newCnt;

    var newServ="<div id='serv"+newCnt+"' style='padding-top:2px;'><input id='job"+newCnt+"' style='width:45%;' placeholder='Service'>&nbsp;<input id='price"+newCnt+"' style='width:30%;' placeholder='Price'>&nbsp;<button id='jobButton"+newCnt+"' class='smallButton' style='height:23px;'>-</button></div>";
    $("#jobList").append(newServ);
    $("#jobButton"+newCnt).attr("onclick","removeJob("+newCnt+")");
  }
  //$("#adMainStatus").html(jobCnt);
}

function removeJob(no) {
  if ($("#serv"+no)) {
    $("#serv"+no).remove();
    jobCnt=jobCnt.replace(","+no,"");
  }
}








// usr

function checkUsr(obj) {
  AjaxGo2("adMainStatus","checkUsr",obj.value,"populateUsr","process/svcEdit");
}

function populateUsr(data,value) {
  if (data!="") {
    var dataArr=data.split("^");
    $("#usrId").val(dataArr[0]);
    $("#usrName").val(dataArr[1]);
    //$("#usrPassword").val(dataArr[2]);
    $("#usrPhone").val(dataArr[3]);

    //$("#usrName").attr("disabled","disabled");
    //$("#usrEmail").attr("disabled","disabled");
  } else {
    $("#usrId").val("");
    $("#usrName").val("");
    $("#usrPassword").val("");
    $("#usrPassword2").val("");
    $("#usrPhone").val("");
  }
}

















//image

var files = {};
var fileCnt = "";

$(document).ready(function(){
  $('#file1').on("change", function(){ readURL(this,"1"); });
  $('#file2').on("change", function(){ readURL(this,"2"); });
  $('#file3').on("change", function(){ readURL(this,"3"); });
  $('#file4').on("change", function(){ readURL(this,"4"); });
  $('#file5').on("change", function(){ readURL(this,"5"); });
});

function readURL(input,no) {

  if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
      alert("The file API isn't supported on this browser yet.");
      return;
  } else {
    if (!input.files) {
      alert("This browser doesn't seem to support the 'files' property of file inputs.");
    } else if (!input.files[0]) {
      alert("No file selected");
    } else {
        var file = input.files[0];
        var size = file.size;
        var type = file.type;
        if ((type!="image/jpeg")&&(type!="image/png")) {
          alert("File is not supported image file (jpeg/png).");
          return;
        }
        if (size>2000000) { // file bigger than 2MB
          alert("Please select file less than 2MB.");
          return;
          //alert("File " + file.name + " is " + file.size + " bytes in size");
        }
    }
  }


  if (input.files && input.files[0]) {
    //files[no-1]=input.files;
    files[no-1]=input.files[0];

    var reader = new FileReader();
    reader.onload = function (e) {
      $('#img'+no).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    fileCnt = 1;
  }
}





// not in use
function uploadFiles(adId,layer) {
  //alert("upload files:"+adId+"^"+layer);
  $("#imgForm").submit(function(e) { e.stopPropagation(); });
  $("#imgForm").submit(function(e) { e.preventDefault(); });

  if (adId!="") {
    var data = new FormData();
    $.each(files, function(key, value) {
      data.append(key, value);
    });

    $.ajax({
        url: 'process/svcUpload.php?files=files&adId='+adId,
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR) {
          JSON.stringify(data);
          //var name="",imgId="";
          if(typeof data.files !== 'undefined') {
              //$form = $(event.target);
              //var formData = $form.serialize();
              //$.each(data.files, function(key, value) {
                  //formData = formData + '^' + value;
                  //name=value.split("/")[3];
                  //$.each(data.stkImgId, function(key2, value2) {
                    //if (key==key2) {
                    //  imgId=value2;
                    //}
                  //});
              //});
              //alert("Saved");
          } else {
              // Handle errors here
              alert(data.error);
              console.log('ERRORS: ' + data.error);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(">>>"+textStatus+"^"+errorThrown);
          // Handle errors here
          console.log('ERRORS: ' + textStatus);
          // STOP LOADING SPINNER
        }
    });
    $("#file").val("");
  }
}

function checkEmpty(val,msg,field) {
  if ((val=="")||(val==0)) {
    //alert(msg);
    displayStatus(msg,"adMainStatus");
    if (field) {
      $("#"+field).focus();
    }
    return false;
  } else {
    return true;
  }
}

function checkNumber(val,msg,field) {
  if (!$.isNumeric(val)) {
    //alert(msg);
    displayStatus(msg,"adMainStatus");
    if (field) {
      document.getElementById(field).focus();
    }
    return false;
  } else {
    return true;
  }
}

function checkPhone(val,msg,field) {
  if (val.length<10) {
    displayStatus(msg,"adMainStatus");
    if (field) {
      document.getElementById(field).focus();
    }
    return false;
  } else {
    return true;
  }
}

function comparePass(val,val2,msg,field) {
  if (val!=val2) {
    //alert(msg);
    displayStatus(msg,"adMainStatus");
    if (field) {
      document.getElementById(field).focus();
    }
    return false;
  } else {
    return true;
  }
}

var entityMap = {
  "&": "%26",
  '"': "%22",
  "'": "%27",
  "#": "%23",
  "/": "//"
  //&#47;
  // ori / - &#x2F;
  //"<": "&lt;",
  //">": "&gt;",
};

  function escapeHtml(string) {
    return String(string).replace(/[&"'#\/]/g, function (s) {
    //return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });
  }

function updQuality(cond) {
  if (cond==1) {
    $("#quality").val("10");
    $("#quality").attr("disabled","disabled");
  } else {
    $("#quality").removeAttr("disabled");
  }
}

function test() {

  alert($("#file1").val()+"^"+$("#file2").val()+"^"+$("#file3").val());

}


/*if (checkEmpty(servType,"Please select 'Service Type'")) {
  if (checkEmpty(adTitle,"Please enter 'Title'")) {
    if (checkEmpty(adDesc,"Please enter 'Description'")) {
      if (checkEmpty(state1,"Please select at least one 'State'")) {
        if (checkEmpty(area1,"Please select at least one 'Area'")) {
          if (checkEmpty(job1,"Please enter at least one 'Services Offered'")) {
            if (checkEmpty(price1,"Please enter at least one 'Price'")) {
              if (checkEmpty(days,"Please select at least one 'Business Days'")) {
                if (checkEmpty(timeStart,"Please select 'Start Time'")) {
                  if (checkEmpty(timeEnd,"Please select 'End Time'")) {
                    if (checkEmpty(usrEmail,"Please enter your 'Email'")) {
                      if (checkEmpty(usrPassword,"Please enter your 'Password'")) {
                        if (checkEmpty(usrPassword2,"Please reenter your 'Password'")) {
                          if ((usrPassword!="")||(usrPassword2!="")) {
                            validatePass="0";
                            if (comparePass(usrPassword,usrPassword2,"Password does not match")) {
                              if (checkEmpty(usrName,"Please enter your 'Name'")) {
                                if (checkEmpty(usrPhone,"Please enter your 'Phone Number'")) {
                                  if (checkNumber(usrPhone,"'Phone Number' must only have numbers")) {
                                    if (checkPhone(usrPhone,"Wrong format for 'Phone Number'")) {

                                      // prep area
                                      var areaData="";
                                      for (i in areaCnt.split(",")) {
                                        var no=areaCnt.split(",")[i];
                                        var state=$("#state"+no).val();
                                        var area=$("#area"+no).val();
                                        if ((state!=0)&&(state!="0")&&(state!="")&&(area!=0)&&(area!="0")&&(area!="")) {
                                          if (areaData=="") { areaData=area+"|~|"+state; } else { areaData=areaData+"|*|"+area+"|~|"+state; }
                                        }
                                      }

                                      // prep job
                                      var jobData="";
                                      for (j in jobCnt.split(",")) {
                                        var no=jobCnt.split(",")[j];
                                        var job=$("#job"+no).val();
                                        var price=$("#price"+no).val();
                                        if ((job!="")&&(price!="")) {
                                          if (jobData=="") { jobData=job+"|~|"+price; } else { jobData=jobData+"|*|"+job+"|~|"+price; }
                                        }
                                      }

                                      // prep image
                                      var imgData = new FormData();
                                      $.each(files, function(key, value) {
                                        imgData.append(key, value);
                                        if (imgCnt=="") { imgCnt=(parseInt(key)+1); } else { imgCnt=imgCnt+"|*|"+(parseInt(key)+1); }
                                      });

                                      var imgChk = "";
                                      for (var k=1;k<=5;k++) {
                                        if ($("#img"+k).attr("src")!="") { imgChk="1"; }
                                      }

                                      if (checkEmpty(imgChk,"Please insert at least one 'Picture'")) {
                                        var data=servType+"|^|"+escapeHtml(adTitle)+"|^|"+escapeHtml(adDesc)+"|^|"+usrId+"|^|"+escapeHtml(usrEmail)+"|^|"+usrPassword+"|^|"+usrName+"|^|"+usrPhone+"|^|"+adId+"|^|"+daysArr+"|^|"+timeStart+"|^|"+timeEnd+"|^|"+areaData+"|^|"+jobData+"|^|"+files+"|^|"+imgCnt;
                                        var layer="adMainStatus";

                                        AjaxGo2(layer,"saveAd",data,"saveAdCont","process/svcEdit",imgData);
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}*/
