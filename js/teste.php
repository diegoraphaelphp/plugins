<?
	include("conexao.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
	$sql = "select max(matriculaAluno) as cod from alunos_cursos";
	$query = mysql_query($sql);
	$total = mysql_num_rows($query);
	for($i=0;$i<$total;$i++){//00001
		$cod = mysql_result($query,$i,cod);//2009200001
		$cod2 = "00001";
		echo $var = substr($cod,6,10) + 1;
		$_REQUEST['curso'];
	}

?>
</body>
</html>
