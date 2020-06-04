<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>jqswfupload - jQuery and SWFUpload in one line</title>
		<link type="text/css" href="style.css" rel="stylesheet" />
		<link type="text/css" href="jquery.jqswfupload.css" rel="stylesheet" />
				<script language="JavaScript" type="text/javascript">
			var upload_uri = "";
		</script>
		<script language="JavaScript" type="text/javascript" src="libs/jquery-1.3.2.min.js"></script>

		<script language="JavaScript" type="text/javascript" src="libs/jquery-ui-1.7.1.custom.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/swfupload.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/jquery.domec-1.0.0.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/jquery.jqswfupload.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/main.js"></script>
	</head>

	<body>
		<h1>jqswfupload - jQuery and SWFUpload in one line</h1>
		<p>
			Click in the button below to select the files to upload.<br/>
			The maximum filesize is 5000 MB.
			The suported formats are:
		</p>
		<ul>
			<li>jpg, gif, png and bmp</li>

			<li>doc, pdf, txt and rtf</li>
			<li>avi, mp3 and flv</li>
		</ul>
		<div id="upload-container">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div id="upload-placeholder">
					<input type="file" name="Filedata" />
					<input type="submit" value="upload" />

				</div>
			</form>
		</div>
		<div id="debug-bar">
			<p>Arquivos carregados.</p>
		</div>
	</body>
</html>