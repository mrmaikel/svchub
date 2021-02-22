<?php session_start(); ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
</head>

<link rel="stylesheet" href="css/svcMaterial.css">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/svcStyle.css">

<script language="javascript" src="js/svcJquery.js"></script>
<script language="javascript" src="js/svcAjaxscript.js"></script>
<script language="javascript" src="js/svcMaterial.js"></script>
<script language="javascript" src="js/svcMd5.js"></script>

<!--line colour :rgb(238,238,238)-->

<!--script>
  // google analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77783278-1', 'auto');
  ga('send', 'pageview');
</script-->

<script type="text/javascript">

  function redirect() {
    //window.location="view/svcMain.php";
  }

  function init() {
    $("#main").load("view/svcMain.php",function() {
    });

    //document.getElementById("main").innerHTML='<object type="text/html" data="view/svcMain.php"></object>';
  }
</script>

<body onload="init()">
  <div id="content" style="display:none;"></div>
  <div id="main" style="position:relative;width:100%;height:100%;border:0px red solid;padding:0px;margin:0px;overflow:hidden;"></div>

</body>
</html>
