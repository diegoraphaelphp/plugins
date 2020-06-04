<?php
$selectors 	= '';
$events 	= '';

if (isset($_POST['selector']) && isset($_POST['event']))
{
	$selectors 	= htmlentities(implode(', ', $_POST['selector']));
	$events 	= htmlentities(implode(', ', $_POST['event']));
}
?>
<html>
	<head></head>
	<body>
		You have chosen the following:<br>
		Selector: <?php echo $selectors; ?><br>
		Event: <?php echo $events; ?><br>
	</body>
</html>