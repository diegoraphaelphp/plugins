<?php
/*
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ficheroExcel.xls");
header("Pragma: no-cache");
header("Expires: 0");
*/

print_r($_POST);

echo $_POST['datos_a_enviar'];
?>