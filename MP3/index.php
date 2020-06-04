<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery.js" type="text/javascript"></script>
<script language="javascript" src="jmp3/jmp3.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// default options
		$(".mp3").jmp3();
		// custom options
		$("#mysong").jmp3({
			backcolor: "000000",
			forecolor: "00ff00",
			width: 200,
			showdownload: "true"
		});
	});
	
	$(document).ready(function(){
			//jMP3 init
			$("#sound").jmp3();
			$("#sounddl").jmp3({
				showfilename: "false",
				backcolor: "000000",
				forecolor: "00ff00",
				width: 150,
				showdownload: "true"
			});
			$("#external").jmp3({
				filepath: "http://www.thelostplanet.net/WeirdAl/",
				backcolor: "ffd700",
				forecolor: "8B4513",
				width: 300,
				showdownload: "false"
			});
			$("#broken").jmp3();  // it's a bah-roken
		});
</script>
</head>

<body>
<div id="music"> 
		<p>Listen to this sound:<br /><span id="sound" class="mp3">sound.mp3</span></p> 
		<br clear="all" /> 
</div>
</body>
</html>
