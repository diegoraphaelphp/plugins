<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoComplete - Ajax com JQuery</title>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	function lookup(GERE) {
		if(GERE.length == 0) {
			// Hide the suggestion box.
			//$('#suggestions').hide();
			$('#suggestions').hide('slow');
		} else {
			$.post("busca.php", {busca: ""+GERE+""}, function(data){
				if(data.length >0) {
					//$('#suggestions').show();
					$('#suggestions').show('slow');
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#GERE').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>

<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 200px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		width:880;
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
</head>

<body onload="document.getElementById('GERE').focus();">
    
    <form>
			Digite a GERE:
				<br />
				<input type="text" size="30" value="" id="GERE" onKeyUp="lookup(this.value);" onBlur="fill();" />
				
			<div class="suggestionsBox" id="suggestions" style="display:none;width:300px;">
				<img src="../img/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
			</div>
		</form>
    
</body>
</html>
