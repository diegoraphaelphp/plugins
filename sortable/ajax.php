<?php
	mysql_connect(localhost,'sortable_tutorial','password');
	mysql_select_db('sortable_tutorial') or die( "Unable to select database");
	
	parse_str($_POST['pages'], $pageOrder);
	foreach ($pageOrder['page'] as $key => $value) {
		mysql_query("UPDATE menu SET `order` = '$key' WHERE `id` = '$value'") or die(mysql_error());
	}
?>