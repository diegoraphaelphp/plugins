<!DOCTYPE html>
<html>
<head>
  <title>Projekt Gensfleisch</title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
  <link rel="stylesheet" href="pg.css" />
  <style type="text/css">
/* codificação utf-8 */
#frmBalanceteAnoFiltro fieldset.botoes{
    display: block;
    width: auto;
    border: 0px;
    padding: 0px;
    margin-top: 20px;
}

#frmBalanceteAnoFiltro label{
    display: block;    
}

#frmBalanceteAnoFiltro fieldset.linhas{
    display: block;
    border: 0px;
    padding: 0px;
    margin: 0px;
    width: auto;
}

#frmBalanceteAnoFiltro fieldset.colunas{
    display: inline;
    border: 0px;
    padding: 0px;
    margin: 0px;
    width: auto;
}

/*
.ui-page {
  -webkit-backface-visibility: hidden;
}
*/

h1.ui-title {
  font-size: 1em !important;
}


h3.ui-title {
  font-size: .8em !important;
  margin-top: 0px;
  margin: 4px;
}

.defaultFooter {
  text-align: center;
  padding-top: 5px;
  padding-bottom: 5px;
}

#authorsPageContent h3 {
  font-size: 1em;
}

.ui-block-a, .ui-block-b, .ui-block-c, .ui-block-d, .ui-block-e {
  text-align: center;
}

#bookPage {
  font-size: 14px;
  font-family: "Times New Roman", Times, serif;
  overflow: hidden;
}

#orientBar
{
 float: right;
 height: 100%;
 width: auto;
 padding-left: 1px;
}

.scrollIdxBox
{
  width: 10px;
  height: 150px;
  line-height: 150px;
  text-align: center;
}

.scrollIdxLabel {
  color: #626D7F;
  font-size: 10px;
  font-weight: bold;
  text-align: center;
}

.progress {
  width: 40%;
  height: 16px;
  border: none;
  display: block;
  background: url('../img/ajax-loader.gif') no-repeat center center;
}

#bottomBookNav {
 margin-bottom: 50px;
}

.fixedFooter {
  position: fixed !important;
  left: 0px !important;
  right: 0px !important;
  bottom: 0px !important;
  z-index: 999 !important;
  margin-top: 150px;
}
      
  </style>

  <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
</head>
<body>

  <!-- Page 1-->
  <div data-role="page" id="authors" data-title="Autoren">
    <div data-role="content" id="authorsPageContent">
      <div data-role="collapsible-set">
        <div data-role="collapsible" data-collapsed="true">
          <h3>A</h3>
          <ul class="authorList" id="authorListA" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>B</h3>
          <ul class="authorList" id="authorListB" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>C</h3>
          <ul class="authorList" id="authorListC" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>D</h3>
          <ul class="authorList" id="authorListD" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>E</h3>
          <ul class="authorList" id="authorListE" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>F</h3>
          <ul class="authorList" id="authorListF" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>G</h3>
          <ul class="authorList" id="authorListG" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>H</h3>
          <ul class="authorList" id="authorListH" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>I</h3>
          <ul class="authorList" id="authorListI" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>J</h3>
          <ul class="authorList" id="authorListJ" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>K</h3>
          <ul class="authorList" id="authorListK" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>L</h3>
          <ul class="authorList" id="authorListL" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>M</h3>
          <ul class="authorList" id="authorListM" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>N</h3>
          <ul class="authorList" id="authorListN" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>O</h3>
          <ul class="authorList" id="authorListO" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>P</h3>
          <ul class="authorList" id="authorListP" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>Q</h3>
          <ul class="authorList" id="authorListQ" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>R</h3>
          <ul class="authorList" id="authorListR" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>S</h3>
          <ul class="authorList" id="authorListS" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>T</h3>
          <ul class="authorList" id="authorListT" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>U</h3>
          <ul class="authorList" id="authorListU" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>V</h3>
          <ul class="authorList" id="authorListV" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>W</h3>
          <ul class="authorList" id="authorListW" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>X</h3>
          <ul class="authorList" id="authorListX" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>Y</h3>
          <ul class="authorList" id="authorListY" data-role="listview" data-inset="true"></ul>
        </div>
        <div data-role="collapsible" data-collapsed="true">
          <h3>Z</h3>
          <ul class="authorList" id="authorListZ" data-role="listview" data-inset="true"></ul>
        </div>
      </div>
    </div>
  </div>


</body>
</html>