<?
require_once("js/conexao.php");

$teste = $_REQUEST['teste'];
echo $sql = "INSERT INTO tb_usuario(mailSuger) values('$teste')";
$query = mysql_query($sql);


?>