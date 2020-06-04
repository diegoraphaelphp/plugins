<?php
	/* CONEXÃO FIREBIRD */
	$res = ibase_pconnect("C:\AppServ\www\scriptsigater\Banco\DB_SIGATER.FDB", "SYSDBA", "masterkey"); // or die("<br>".ibase_errmsg());		
	if ($res == false){
		
	    echo "
		<table width=\"630px\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align='center'>
			<tr>
				<td align=\"center\" style='background-color:#FF4040;color:#FFFFFF;font-family:Verdana, Arial, sans-serif;font-size:13px;font-weight:bold;'>ATEN&Ccedil;&Atilde;O!</td>
			</tr>
			<tr>
				<td align=\"center\" style='background-color:#FFE0E0; border-color:#406080;border-style:solid;border-width:1px;color:#000000;font-family:Tahoma, Arial, sans-serif;font-size:13px;'><b>Problema na Conexão com o Firebird.</td>
			</tr>
		</table><br><br>";
		exit;
	}
?>