<?php
	header("Content-Type: text/html; charset=utf-8", true);
	$con  = mysql_connect("localhost", "root", "raphaelrd");
	$con2 = mysql_select_db("sisplan", $con);
	
	if(isset($_POST['busca'])){
		      $queryString = $_POST['busca'];
			  if(strlen($queryString) > 0){
				  $sql = "SELECT AGR_ID, AGR_Nome, AGR_CPF FROM PAM_AGR_AGRICULTORES WHERE AGR_Nome LIKE '%$queryString%' OR AGR_CPF LIKE '%$queryString%' LIMIT 10";
				  $query = mysql_query($sql);
				  while ($total = mysql_fetch_array($query)){
					  echo '<li onClick="fill(\''.$total[0].'\');">'.$total[1].' ('.$total[2].')</li>';
				  }
			  }
	}else{
        	echo 'Erro no envio dos dados!';
    	}
?>