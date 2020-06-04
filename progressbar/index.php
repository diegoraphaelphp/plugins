<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Progressbar - Default functionality</title>
	<link rel="stylesheet" href="jquery.ui.all.css">
	<script src="jquery-1.7.2.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.progressbar.js"></script>
	<link rel="stylesheet" href="demos.css">
	<script>
	$(function() {
		$( "#progressbar" ).progressbar({
			value: 100
		});
	});
	</script>
</head>
<body>
<div class="demo">
    <div id="progressbar"></div>
</div><!-- End demo -->
<div class="demo-description">
    <p>Default determinate progress bar.</p>
</div><!-- End demo-description -->
</body>
</html>