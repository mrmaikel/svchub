<script language="javascript" src="js/svcList.js"></script>

<script language="javascript">

  $(document).ready(function(){
    initSearch();
  });

</script>

<style>

* {
  font-family: 'Open Sans', sans-serif;
  color: #555;
  margin:0 auto;
  padding:0;
  letter-spacing: 0.5px;
}

.demo-card-wide.mdl-card {
  width: 100%;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 50px;
  background: url('../assets/demos/welcome_card.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}

#adList {
  width: 100%;
  margin-top: 10px;
  border: 0px rgb(228,228,228) solid;
  border: 0px purple solid;
  min-height: 1100px;
  max-height: 1100px;
}



#paging1 {
  position: relative;
  right: 0px;
  top: 0px;
  border: 1px lightgray solid;
  font-size: 11px;
  overflow: hidden;
  width: 100%;
  height: 30px;
  margin-right: 19%;
  color: #555;
  user-select: none;
  text-align: center;
  border-radius: 5px;
  display: table;
  background-color:rgba(255,255,255, 0.5);
  vertical-align: middle;
}

#paging2 {
  position: relative;
  right: 0px;
  top: 0px;
  border: 1px lightgray solid;
  font-size: 11px;
  overflow: hidden;
  width: 100%;
  height: 30px;
  margin-right: 19%;
  color: #555;
  user-select: none;
  text-align: center;
  border-radius: 5px;
  display: table;
  background-color:rgba(255,255,255, 0.5);
  vertical-align: middle;
}

.pgDot {
  width: 17px;
  height: 20px;
  text-align: center;
  font-size: 10px;
  display: inline-block;
  position: relative;
  border: 0px red solid;
  top: 0px;
  z-index: 20;
  vertical-align: bottom;
}

.pgText {
  width: 80px;
  height: 20px;
  text-align: center;
  font-size: 10px;
  display: inline-block;
  position: relative;
  border: 0px red solid;
  top: -7px;
  z-index: 20;
  vertical-align: bottom;
}

.pgCont {
  width: 25px;
  height: 25px;
  text-align: center;
  font-size: 10px;
  display: inline-block;
  position: relative;
  border: 0px red solid;
  top: 0px;
  padding: 5px;
  z-index: 20;
  vertical-align: middle;
}

.pg {
  width: 25px;
  height: 22px;
  text-align: center;
  font-size: 11px;
  display: block;
  position: relative;
  cursor: pointer;
  background: transparent;
  font-weight: 400;
  color: #555;
  border-radius: 5px;
  border: 1px lightgray solid;
  padding-top: 2px;
}

.pgSel {
  width: 25px;
  height: 22px;
  text-align: center;
  font-size: 12px;
  display: block;
  position: relative;
  cursor: pointer;
  background: rgb(230,230,230);
  font-weight: 700;
  color: #555;
  border-radius: 5px;
  border: 1px rgb(230,230,230) solid;
  padding-top: 2px;
}

.pg:hover {
  background-color: lightgray;
}

.arrowIcon {
  font-size: 20px;
  position: relative;
  border: 0px blue solid;
  z-index: 10;
}
.pgArrow {
  width: 20px;
  height: 20px;
  text-align: center;
  font-size: 10px;
  display: inline-block;
  position: relative;
  cursor: pointer;
  background: transparent;
  color: #555;
  border: 0px green solid;
  top: 0px;
  z-index: 9;
  border-radius: 5px;
  vertical-align: middle;
  border: 1px transparent solid;
}

.pgArrow:hover {
  background-color: lightgray;
  border: 1px lightgray solid;
}







.imgDiv {
  position: relative;
  border: 0px yellow solid;
  background-color: #ffffff;
  text-align: center;
}
.imgThumb {
  position: relative;
  max-width: 100px;
  max-height: 100px;
}
.adListTblCont {
  width: 100%;
  height: 100%;
  border: 0px blue solid;
  white-space: wrap;
}
.adListTbl {
  border: 0px red solid;
  width: 100%;
  height: 100%;
  white-space: wrap;
}
.adListTitle {
  font-weight: 500;
  padding: 0px;
  white-space: wrap;
  border: 0px blue solid;
  width: 98%;
  height: 25px;
  overflow: hidden;
  padding-top: 0px;
  padding-left: 0px;
}
.adListTitleTD {
  cursor: pointer;
  height: 35px;
  padding: 5px;
  padding-top: 5px;
  padding-bottom: 0px;
  padding-left: 10px;
}
.adListDesc {
  font-size: 13px;
  -webkit-filter: opacity(0.6); /* Chrome, Safari, Opera */
  filter: opacity(0.7);
  white-space: wrap;
  display: block;
  border: 0px blue solid;
  width: 98%;
  height: 55px;
  overflow: hidden;
  padding-left: 0px;
  padding-right: 0px;
}
.adListDescTD {
  cursor: pointer;
  height: 60px;
  padding: 5px;
  padding-top: 0px;
  padding-left: 10px;
}
.adListSide {
  width: 120px;
  min-width: 120px;
  max-width: 120px;
  font-size: 12px;
}
















.row {
  background-color: #ffffff;
  position: relative;
  display: flex;
  overflow: auto;
  white-space: wrap;
  width: 100%;
  height: 100px;
  overflow: hidden;
  border-bottom:1px rgb(238,238,238) solid;
}
.rowTbl {
  margin-top: 10px;
  width: 100%;
  position: relative;
  border: 0px blue solid;
  white-space: normal;
  font-size: 13px;
  display: table;
  overflow: hidden;
  border-spacing: 15px;
  border-collapse: separate;
}
.cellTbl {
  width: 100%;
  height: 150px;
  border: 0px blue solid;
  background-color: #ffffff;
  padding: 0px;
  border-radius: 5px;
  box-sizing: border-box;
  overflow: hidden;
  cursor: pointer;
}
.cellTbl:hover {
  box-shadow: #D0D0D0 0px 0px 7px 5px;
  transform: scale(1.01);
}

.line1 {
  /* name and fav ribbon container */
  max-height: 30px;
  padding: 0px;
  margin: 0px;
  margin-top: 0px;
  padding-top: -20px;
  border: 0px blue solid;
  cursor: pointer;
  overflow: hidden;
  display: block;
  vertical-align: top;
  align: left;
  text-align: left;
  white-space: nowrap;
  position: relative;
}
.line2 {
  /* fav ribbon */
  padding: 0px;
  margin: 0px;
  width: 30px;
  position: absolute;
  right: 0px;
  top: -4px;
  border: 0px green solid;
}
.line2xxx {
  height: 35px;
  font-weight: 300;
  font-size: 13px;
  text-align: left;
  border: 0px pink solid;
  overflow: hidden;
  white-space: normal;
  overflow: hidden;
  cursor: pointer;
  display: block;
}
.line3 {
  /* name and phone */
  height: 30px;
  max-height: 30px;
  font-weight:400;
  padding: 5px;
  padding-left: 10px;
  padding-right: 10px;
  margin: 0px;
  font-size: 10px;
  text-align: left;
  cursor: pointer;
  overflow: hidden;
  display: block;
  border: 0px blue solid;
  white-space: normal;
}
.line4 {
  /* title */
  padding-top: 10px;
  border: 0px red solid;
  max-width: 165px;
  height: 55px;
  overflow: hidden;
  left: 0px;
  font-size: 12px;
  font-weight: 500;
  white-space: normal;
  position: relative;
  white-space: pre-wrap;      /* CSS3 */   
  white-space: -moz-pre-wrap; /* Firefox */    
  white-space: -pre-wrap;     /* Opera <7 */   
  white-space: -o-pre-wrap;   /* Opera 7 */    
  word-wrap: break-word;      /* IE */
  overflow-wrap: break-word;
}
.col1 {
  /* image */
  width: 100%;
  padding: 0px;
  cursor: pointer;
  border: 1px #DCDCDC solid;
  border-style: none none solid none;
  overflow: hidden;
  border-radius: 0px 0p 5px 5px;
  display: block;
  position: relative;
}

.col2 {
  width: 15px;
  min-width: 15px;
  max-width: 15px;
  padding: 5px;
  float: right;
  top: 0px;
  cursor: pointer;
  border: 0px green solid;
  overflow: hidden;
}

#sticky-anchor {
  border: 0px red solid;
}

#back-anchor {
  border: 0px yellow solid;
  background-color: #F5F5F5;
  top: 0px;
  z-index: 5;
}

@media screen and (max-width: 850px) {
  #adList {
    width: 106%;
    padding-left: 0px;
    margin-left: -10px;
    min-height: 1600px;
    max-height: 1600px;
    border: 0px red solid;
    overflow: hidden;
  }

  .pgText {
    width: 40px;
    height: 20px;
    text-align: center;
    font-size: 10px;
    padding-left: 5px;
    padding-right: 5px;
    border: 0px red solid;
    overflow: hidden;
    white-space: nowrap;
    vertical-align: bottom;
  }
  
  .rowTbl {
    margin-top: 20px;
    width: 100%;
    left: 0px;
    padding-left: 0px;
    margin-left: 0px;
    position: relative;
    border: 0px blue solid;
    white-space: normal;
    font-size: 13px;
    display: block;
    overflow: hidden;
    border-spacing: 10px;
    border-collapse: separate;
  }

  .cellTbl {
    width: 100%;
    height: 170px;
    border: 0px blue solid;
    background-color: #ffffff;
    padding: 0px;
    border-radius: 5px;
    box-sizing: border-box;
    overflow: hidden;
    cursor: pointer;
  }

  .line1 {
    /* name and fav ribbon container */
    display: inline;
  }

  .line2 {
    /* fav ribbon */
    padding: 0px;
    margin: 0px;
    left: 80%;
    width: 30px;
    position: absolute;
    top: -4px;
    border: 0px green solid;
  }
  
  .line3 {
    /* name and phone */
    display: table-cell;
    border: 0px red solid;
    padding: 0px;
  }

  .line4 {
    /* title */
    padding-top: 10px;
    height: 55px;
    overflow: hidden;
    left: 0px;
    font-size: 12px;
    font-weight: 500;
    white-space: normal;
    position: relative;
    white-space: pre-wrap;      /* CSS3 */   
    white-space: -moz-pre-wrap; /* Firefox */    
    white-space: -pre-wrap;     /* Opera <7 */   
    white-space: -o-pre-wrap;   /* Opera 7 */    
    word-wrap: break-word;      /* IE */
    overflow-wrap: break-word;
    border: 0px red solid;
    padding-left: 10px;
    padding-right: 10px;
  }

  .col1 {
  /* image */
    width: 100%;
    padding: 0px;
    cursor: pointer;
    border: 1px #DCDCDC solid;
    border-style: none none solid none;
    overflow: hidden;
    border-radius: 0px 0p 5px 5px;
    display: block;
    position: relative;
  }
}

</style>

<div id="adListStatus"></div>

<!--div id="sticky-anchor"></div>
<div id="back-anchor"></div-->

<div id="spacer"></div>

<div id="paging1"></div>
<div id="adList"></div>
<div id="paging2"></div>
