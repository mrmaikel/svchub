function AjaxGo(layer,func,att,rc) {
	//alert(layer+"^"+func+"^"+att);
	var Ajax = new ajaxObject(layer,"function.php",rc);
	Ajax.update("func="+func+"&attr="+att);
}

function AjaxGo2(layer,func,att,rc,file,fileData) {
	//alert(layer+"^"+func+"^"+att);

	// send image through ajax
	// var imgData = new FormData();
	// $.each(files, function(key, value) {
	//	imgData.append(key, value);
	// });
	// 1. fileData = imgData
	// 2. files needs to be sent through url parameter ie:attr variable

	if (fileData) { var fileData=fileData; } else { var fileData=""; }

	var Ajax = new ajaxObject(layer,file+".php",rc,fileData);
	Ajax.update("func="+func+"&attr="+att);
}

function AjaxRun(func,att) {
	var Ajax = new ajaxObject("divTmp","function.php","");
	Ajax.update("func="+func+"&attr="+att);
}

function AjaxSQL(layer,sql) {
	var Ajax = new ajaxObject(layer,"function.php");
	Ajax.update("func=AjaxSQL&attr="+sql);
}




function ajaxObject(layer, url, rc, fileData) {
   var that = this;
   var updating = false;
   this.callback = function(ret,layer) {
		if ((rc!="")&&(typeof rc!=="undefined")) {
			eval(rc)(ret,layer);
		}
   }
	 if (fileData) { var fileData=fileData; } else { var fileData=""; }
   var LayerID = document.getElementById(layer);
   var urlCall = url;

   this.update = function(param) {

      if (updating==true) { return false; }
      updating=true;

      var AJAX = null;

      if (window.XMLHttpRequest) {
         AJAX=new XMLHttpRequest();
      } else {
         AJAX=new ActiveXObject("Microsoft.XMLHTTP");
      }

      if (AJAX==null) {
         alert("Your browser doesn't support AJAX.");
         return false
      } else {

         AJAX.onreadystatechange = function() {

         	if (AJAX.readyState==1 || AJAX.readyState=="loading") {
						var loading="";
						//var loading = "<div style='overflow:hidden;top:0px;left:0px;width:100%;height:100%;valign:center;'><table border='0' width='100%' height='100%'><tr><td><center><img src='../img/loading.gif' width='100px'></center></td></tr></table></div>";
						//var loading = "<div class='mdl-spinner mdl-js-spinner is-active'></div>";
						//var loading = "<div class='mdl-progress mdl-js-progress mdl-progress__indeterminate'></div>";
						LayerID.innerHTML = loading;
					}

			if (AJAX.readyState==2) {
				LayerID.innerHTML = "<!--span>GOT</span-->";
			}

			if (AJAX.readyState==3) {
				LayerID.innerHTML = "<!--span>REPLY</span-->";
			}

			if (AJAX.readyState==4 || AJAX.readyState=="complete") {
				rObj = AJAX.responseText;
				if (rc!="") {
					that.callback(rObj,layer);
				} else {
					LayerID.innerHTML = rObj;
					that.callback();
				}
				delete AJAX;
				updating=false;

            }
         }
         var timestamp = new Date();
         var uri=urlCall+'?'+param+'&timestamp='+(timestamp*1);
         AJAX.open("POST", uri, true);
         AJAX.send(fileData);	// previousely null.. need to pass image data (new formData)
         return true;
      }
   }
}
/*
function updURL(response, urlPath){
	alert("1>"+response);
	document.getElementById("content").innerHTML = response;
	//document.title = response.pageTitle;
	window.history.pushState(response,"title", urlPath);
}

window.onpopstate = function(e){
	alert(`location: ${document.location}, state: ${JSON.stringify(e.state)}`)
	if(e.state){
        document.getElementById("content").innerHTML = e.state.html;
        document.title = e.state.pageTitle;
    }
};*/


/*

// html onclick call javascript function
<input id="data"><button onClick="test()">test</button>
<div id="test"></div>

// javascript call ajaxscript fucntion
function test() {
	var func = "test";					// php function name in php process
	var layer = "test";					// html output div layer
	var att = "data="+$("data").value;	// data to pass to php process
	var rc = "receive";					// javascript return function name
	AjaxGo(layer,func,att,rc);			// ajax object call
}

// php process
$func = $_GET["func"];

if ($func!="") { $func(); }

function test() {
	$data = $_GET["data"];
	echo $data;
}

//javascript return
function receive(data,layer) {
	document.getElemntById(layer)=data;
}

*/
