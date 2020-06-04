<?php
//	print_r($_REQUEST);	
	$db_user = "root";
	$db_pass = "raphaelrd";
	$db      = "pam";
	mysql_connect('localhost',$db_user,$db_pass);
	mysql_select_db($db);
	$uname = mysql_real_escape_string($_POST['uname']);
	$pword = mysql_real_escape_string(md5($_POST['pword']));
	$sql      = "SELECT * FROM tb_usuarios WHERE USU_Login = '$uname' "; //AND USU_Senha = MD5('$pword')";	
	$query    = mysql_query($sql);
	$num_rows = mysql_num_rows($query);
	if ($num_rows == '1'){
		setcookie("logged_in", $uname, time()+3600);
		echo '1';
	}else{
		echo '0';
	}
?>