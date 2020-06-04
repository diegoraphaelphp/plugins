<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Pretty Forms</title>
	<style type="text/css">
	body{
		font:75%/150% "Trebuchet MS", "Lucida Grande", "Bitstream Vera Sans", Arial, Helvetica, sans-serif;
		color:#666666;
		margin:60px;
	}
	</style>
	<script type="text/javascript">
	function showFormData(frm){
		message="The values of the form are: \n-------------------------------------\n";
		message+="text area = \t" + frm.textarea.value + "\n\n";
		message+="textbox = \t" + frm.textbox.value + "\n\n";
		message+="select box = \t" + frm.selectMenu[frm.selectMenu.selectedIndex].innerHTML + "\n\n";
		message+="checkboxes = \t" + frm.checkbox1.checked + ", " + frm.checkbox2.checked + ", " + frm.checkbox3.checked + "\n\n";
		if(frm.radioButtons[0].checked){
			message+="radio buttons = \t" + frm.radioButtons[0].value + "\n\n";
		}else if(frm.radioButtons[1].checked){
			message+="radio buttons = \t" + frm.radioButtons[1].value + "\n\n";
		}else if(frm.radioButtons[2].checked){
			message+="radio buttons = \t" + frm.radioButtons[2].value + "\n\n";
		}
		window.alert(message);
		return false;
	}
	
	function doSomething(){
		showText = document.getElementById("signalEvent");
		showText.innerHTML = "You triggered an event";
		setTimeout("showText.innerHTML = '&nbsp;'",1000)
	}
	
	</script>
	<script type="text/javascript" src="prettyForms.js"></script>

	<link rel="stylesheet" href="prettyForms.css" type="text/css" media="screen" />
	
</head>

<body onload="prettyForms()">

	<p>The items in <strong>bold</strong> trigger an event.<br /><br /></p>

	<form id="myForm" action=""	 onsubmit="return(showFormData(this))">
		<p>

			<label>textarea: </label><textarea name="textarea" cols="60" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
			<br class="clearAll" /><br />
		</p>
	
		<p>
			<label><strong>text box: </strong></label><input name="textbox" type="text" onfocus="doSomething()" value="Lorem ipsum" />
			<br class="clearAll" /><br />
		</p>

	
		<p>
			<label><strong>select box:</strong> </label>
			<select name="selectMenu" onchange="doSomething()">
				<option value="1">row 1 row 1 row 1 row 1</option>
				<option value="2">row 2 row 2 row 2 row 2</option>
				<option value="3" selected="selected">row 3 row 3 row 3 row 3</option>

				<option value="4">row 4 row 4 row 4 row 4</option>
			</select>
			<br class="clearAll" /><br />
		</p>
		
		<p>
			<label>checkboxes: </label>
			<input type="checkbox" name="checkbox1" /><label>check 1</label>

			<input type="checkbox" name="checkbox2" onchange="doSomething()" /><label><strong>check 2</strong></label>
			<input type="checkbox" name="checkbox3" /><label>check 3</label>
			<br class="clearAll" /><br />
		</p>
		
		<p>
			<label>radio buttons: </label>
			<input type="radio" name="radioButtons" value="1" /><label>radio 1</label>

			<input type="radio" name="radioButtons" value="2" /><label>radio 2</label>
			<input type="radio" name="radioButtons" value="3" checked="checked" onchange="doSomething()" /><label><strong>radio 3</strong></label>
			<br class="clearAll" /><br />
		</p>
		
		
		<p><input type="submit" value="check inputs" /></p>
		
	</form>
	<div id="signalEvent" style="margin:120px 0; font-weight:bold; color:#970C3B;">&nbsp;</div>
	
	
	<p><a href="http://jigsaw.w3.org/css-validator/validator?uri=http://www.agavegroup.com/agWork/prettyForms/index.html" title="CSS validation"><img src="/images/validationCSS" alt="CSS validation" onmouseover="this.src='/images/validationCSSRoll.png'" onmouseout="this.src='/images/validationCSS.png'" style="border:0;" /></a><a href="http://validator.w3.org/check/referer" title="XHTML validation"><img src="/images/validationXHTML" alt="XHTML validation" onmouseover="this.src='/images/validationXHTMLRoll.png'" onmouseout="this.src='/images/validationXHTML.png'" style="border:0;" /></a></p>

</body>
</html>
<!-- text below generated by server. PLEASE REMOVE --><!-- Counter/Statistics data collection code --><script language="JavaScript" src="http://us.js2.yimg.com/us.js.yimg.com/lib/smb/js/hosting/cp/js_source/whv2_001.js"></script><script language="javascript">geovisit();</script><noscript><img src="http://visit.webhosting.yahoo.com/visit.gif?us1259846720" alt="setstats" border="0" width="1" height="1"></noscript>