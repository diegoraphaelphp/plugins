<?php
	header("Content-Type: text/html; charset=ISO-8859-1",true);
//	include("../js/conexao.php");
	
	$_pagi_sql = "SELECT * FROM PRO_PRODUTO order by DESCRICAO";
	$query     = mysql_query($_pagi_sql);
	
	
	
	$total = mysql_fetch_array($query);
	
	
	print_r($total); exit;
	
	//Montando a paginação
	$_pagi_cuantos      = 3; //Quantidade de resgistros trazidos por paginas
	$_pagi_nav_anterior = "anterior";
	$_pagi_nav_seguiente= "seguinte";
	$_pagi_nav_primera  = "primeira";
	$_pagi_nav_ultima   = "ultima";
	$_pagi_nav_estilo   = "paginacao";//Classe do CSS para a barra de navegação
	
	//importando o arquivo que realiza o processo de paginação
	require_once("paginator.inc.php");
	
	//Criando uma tabela
	echo "<table border=\"0\" cellpadding\"3\" cellspacing=\"3\">";
	echo "<tr bgcolor=\"#DDDDDD\"><th>Cod.</th><th>CPF</th><th>Bairro</th>";
	while($total = mysql_fetch_array($query){
		$cod    = ucfirst($total[0]);
		$cpf    = ucfirst($total[1]);
		$bairro = ucfirst($total[2]);
		echo "<tr bgcolor=\"#EEEEEE\"<td>".$cod."</td><td>".$cpf."</td><td>".$bairro."</td>";
	}
	echo "</table>";
	
	//incluimos a paginação
	echo "<p>".$_pagi_navegacion."</p>";
	
?>